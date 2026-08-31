<?php

/**
 * Sends the Web Push doorbells.
 *
 * Meant for the system scheduler, every minute or two:
 *
 *     * * * * * php /path/to/glpi/bin/live-push-send.php >/dev/null 2>&1
 *
 * A system scheduler, not GLPI's internal cron: the internal one only runs
 * when somebody loads a page, and the whole point of this script is to reach
 * people at times when nobody is loading anything.
 *
 * What it does, once per run:
 *   - finds the followups and solution events recorded since the last run;
 *   - works out which users take part in those tickets;
 *   - rings every browser those users have registered.
 *
 * What it deliberately does NOT do is decide what the notification says. The
 * push carries no body at all; the service worker asks GLPI, as the user, and
 * GLPI answers with what that user is allowed to see. So a mistake here can
 * cost a needless buzz — never a disclosure.
 *
 * Usage:
 *     php bin/live-push-send.php
 *     php bin/live-push-send.php --dry-run
 *     php bin/live-push-send.php --status
 */

use Glpi\Timeline\PushSubscriptions;
use Glpi\Timeline\WebPush;

if (PHP_SAPI !== 'cli') {
    exit("This script must be run from the command line.\n");
}

$root = dirname(__DIR__);
require_once $root . '/vendor/autoload.php';
include_once $root . '/config/config_db.php';

if (!class_exists('DB')) {
    exit("config/config_db.php not found or incomplete: is GLPI installed?\n");
}

/** @var DBmysql $DB */
$DB = new DB();
if (!$DB->connected) {
    exit("Could not connect to the database using config/config_db.php.\n");
}

// The VAPID token has to name a contact, and url_base is the honest one. Read
// straight from the config table: getConfigurationValues() needs nothing but
// $DB, so this script needs no GLPI bootstrap. Merged rather than assigned,
// so that a bootstrap adding one later is not thrown away.
/** @var array $CFG_GLPI */
if (!isset($CFG_GLPI) || !is_array($CFG_GLPI)) {
    $CFG_GLPI = [];
}
$CFG_GLPI['url_base'] = (string) (
    Config::getConfigurationValues('core', ['url_base'])['url_base'] ?? ''
);

$dry_run = in_array('--dry-run', $argv, true);
$status  = in_array('--status', $argv, true);

$context = WebPush::CONFIG_CONTEXT;

/** Read the watermark, or null when this has never run. */
$state = Config::getConfigurationValues($context, ['last_followup_id', 'last_event_ts']);

if ($status) {
    echo "Push sender status\n";
    echo "  VAPID key      : " . (WebPush::getPublicKey() !== '' ? 'present' : 'MISSING (run bin/install-live-push.php)') . "\n";
    echo "  PHP support    : " . (WebPush::isSupported() ? 'openssl + curl present' : 'MISSING openssl or curl') . "\n";
    echo "  Subscriptions  : " . (PushSubscriptions::isAvailable() ? PushSubscriptions::count() . ' browser(s)' : 'table MISSING') . "\n";
    echo "  Last followup  : " . ($state['last_followup_id'] ?? '(never run)') . "\n";
    echo "  Last event     : " . ($state['last_event_ts'] ?? '(never run)') . "\n";
    exit(0);
}

if (!WebPush::isSupported()) {
    exit("ext-openssl and ext-curl are both required to send a push.\n");
}
if (WebPush::getPublicKey() === '') {
    exit("No VAPID key: run bin/install-live-push.php first.\n");
}
if (!PushSubscriptions::isAvailable()) {
    exit("Table " . PushSubscriptions::TABLE . " is missing: run bin/install-live-push.php first.\n");
}

/** Remember where this run got to. */
$remember = static function (string $name, string $value) use ($DB, $context, $dry_run): void {
    if ($dry_run) {
        return;
    }

    $DB->updateOrInsert(
        'glpi_configs',
        ['value' => $value],
        ['context' => $context, 'name' => $name]
    );
};

// ---------------------------------------------------------------------------
// First run: adopt the present without announcing the past.
// ---------------------------------------------------------------------------

if (!isset($state['last_followup_id'], $state['last_event_ts'])) {
    $result = $DB->doQuery('SELECT COALESCE(MAX(`id`), 0) AS max_id FROM `glpi_itilfollowups`');
    $row    = $result instanceof mysqli_result ? $result->fetch_assoc() : null;

    $remember('last_followup_id', (string) (int) ($row['max_id'] ?? 0));
    $remember('last_event_ts', date('Y-m-d H:i:s'));

    exit("First run: watermark set to the present. Nothing sent.\n");
}

$last_followup = (int) $state['last_followup_id'];
$last_event    = (string) $state['last_event_ts'];
$since         = $DB->quoteValue($last_event);

// How many rows one run may look at. Bounds the damage of a bulk import; the
// next run simply picks up where this one stopped.
$batch = 500;

// ---------------------------------------------------------------------------
// What happened since last time.
//
// tickets[id] = list of users who CAUSED the activity, and must not be told
// about their own doing.
// ---------------------------------------------------------------------------

$tickets     = [];
$max_followup = $last_followup;
$max_event    = $last_event;

$add = static function (int $tickets_id, int $author) use (&$tickets): void {
    if ($tickets_id <= 0) {
        return;
    }

    if (!isset($tickets[$tickets_id])) {
        $tickets[$tickets_id] = [];
    }

    if ($author > 0) {
        $tickets[$tickets_id][$author] = $author;
    }
};

// Private followups are never a reason to ring anyone: deciding who may read
// one needs a profile, and this script has no session to read it from.
$result = $DB->doQuery(
    "SELECT f.`id`, f.`items_id`, f.`users_id`
       FROM `glpi_itilfollowups` AS f
 INNER JOIN `glpi_tickets` AS t ON t.`id` = f.`items_id` AND t.`is_deleted` = 0
      WHERE f.`itemtype` = 'Ticket'
        AND f.`is_private` = 0
        AND f.`id` > {$last_followup}
   ORDER BY f.`id` ASC
      LIMIT {$batch}"
);

while ($result instanceof mysqli_result && ($row = $result->fetch_assoc())) {
    $add((int) $row['items_id'], (int) $row['users_id']);
    $max_followup = max($max_followup, (int) $row['id']);
}

// Solutions: proposed, and approved or refused. Same two moments the in-app
// feed watches, keyed on time because approving updates the row in place.
//
// Ordered by the event time rather than by id, which matters only once the
// batch fills up: the watermark then advances to the newest row actually seen,
// and ordering by id could have left older events behind it, unnotified for
// good.
$result = $DB->doQuery(
    "SELECT s.`items_id`,
            s.`users_id`,
            s.`users_id_approval`,
            s.`date_creation`,
            s.`date_approval`
       FROM `glpi_itilsolutions` AS s
 INNER JOIN `glpi_tickets` AS t ON t.`id` = s.`items_id` AND t.`is_deleted` = 0
      WHERE s.`itemtype` = 'Ticket'
        AND (s.`date_creation` > {$since} OR s.`date_approval` > {$since})
   ORDER BY GREATEST(
                COALESCE(s.`date_creation`, '1970-01-01 00:00:00'),
                COALESCE(s.`date_approval`, '1970-01-01 00:00:00')
            ) ASC
      LIMIT {$batch}"
);

while ($result instanceof mysqli_result && ($row = $result->fetch_assoc())) {
    $tickets_id = (int) $row['items_id'];

    if ((string) $row['date_creation'] > $last_event) {
        $add($tickets_id, (int) $row['users_id']);
        $max_event = max($max_event, (string) $row['date_creation']);
    }

    if ($row['date_approval'] !== null && (string) $row['date_approval'] > $last_event) {
        $add($tickets_id, (int) $row['users_id_approval']);
        $max_event = max($max_event, (string) $row['date_approval']);
    }
}

if ($tickets === []) {
    $remember('last_followup_id', (string) $max_followup);
    $remember('last_event_ts', $max_event);

    exit("Nothing new.\n");
}

// ---------------------------------------------------------------------------
// Who to ring.
// ---------------------------------------------------------------------------

$actors = PushSubscriptions::actorsOf(array_keys($tickets));
$users  = [];

foreach ($actors as $tickets_id => $ticket_actors) {
    foreach ($ticket_actors as $users_id) {
        // Never ring somebody about their own message. Done per ticket, not
        // globally: writing on ticket A is no reason to go unwarned about B.
        if (isset($tickets[$tickets_id][$users_id])) {
            continue;
        }

        $users[$users_id] = $users_id;
    }
}

$subscriptions = PushSubscriptions::endpointsFor(array_values($users));

// One doorbell per browser per run, however many tickets moved.
$endpoints = [];
foreach ($subscriptions as $subscription) {
    $endpoints[$subscription['endpoint']] = true;
}
$endpoints = array_keys($endpoints);

echo count($tickets) . " ticket(s) with activity, "
   . count($users) . " user(s) to notify, "
   . count($endpoints) . " browser(s) registered.\n";

if ($dry_run) {
    exit("Dry run: nothing sent, watermark left where it was.\n");
}

$sent = 0;
$gone = 0;

foreach ($endpoints as $endpoint) {
    $status_code = WebPush::send($endpoint);

    if ($status_code === 404 || $status_code === 410) {
        // The push service says this browser is gone for good. Anything else,
        // including a timeout, is left alone: a push service having a bad
        // minute must not cost a user their subscription.
        PushSubscriptions::forget($endpoint);
        $gone++;
        continue;
    }

    if ($status_code >= 200 && $status_code < 300) {
        $sent++;
    }
}

$remember('last_followup_id', (string) $max_followup);
$remember('last_event_ts', $max_event);

echo "Sent {$sent}, dropped {$gone} dead subscription(s).\n";
