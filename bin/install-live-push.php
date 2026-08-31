<?php

/**
 * Installer for Web Push ("notify me even when GLPI is closed").
 *
 * Adds the third and last layer of the live notification feature:
 *
 *   live_timeline   messages appear inside the ticket being read
 *   live_notifier   toasts and browser notifications on any GLPI page,
 *                   including a hidden tab or a minimised window
 *   live_push       the browser is told even with no GLPI page open  <- this
 *
 * What it changes:
 *   - creates the subscriptions table
 *   - generates a VAPID keypair, stored in glpi_configs
 *   - appends one include line to templates/layout/parts/page_footer.html.twig
 *
 * Everything else it needs (ajax/livepush.php, public/js/sw-push.js and
 * templates/layout/parts/live_push.html.twig) is a new file and overwrites
 * nothing.
 *
 * Requirements, all of them checked below:
 *   - ext-openssl and ext-curl
 *   - the instance served over HTTPS; browsers refuse to register a service
 *     worker on http://, so push cannot work at all without it
 *   - bin/live-push-send.php called by the SYSTEM scheduler, not by GLPI's
 *     internal cron, which only runs when somebody loads a page
 *
 * Usage:
 *     php bin/install-live-push.php
 *     php bin/install-live-push.php --uninstall
 *     php bin/install-live-push.php --check
 */

use Glpi\Timeline\PushSubscriptions;
use Glpi\Timeline\WebPush;

if (PHP_SAPI !== 'cli') {
    exit("This script must be run from the command line.\n");
}

$root       = dirname(__DIR__);
$footer     = $root . '/templates/layout/parts/page_footer.html.twig';
$push_tpl   = $root . '/templates/layout/parts/live_push.html.twig';
$worker     = $root . '/public/js/sw-push.js';
$endpoint   = $root . '/ajax/livepush.php';

$INCLUDE_PUSH = "{{ include('layout/parts/live_push.html.twig') }}";

$mode = 'install';
foreach ($argv as $arg) {
    if ($arg === '--uninstall') {
        $mode = 'uninstall';
    } elseif ($arg === '--check') {
        $mode = 'check';
    }
}

/** Report a fatal problem and stop without having touched anything. */
function fail(string $message): void
{
    fwrite(STDERR, "ERROR: {$message}\n");
    exit(1);
}

/** Keep whatever line ending the file already uses. */
function eol(string $content): string
{
    return str_contains($content, "\r\n") ? "\r\n" : "\n";
}

require_once $root . '/vendor/autoload.php';
include_once $root . '/config/config_db.php';

if (!class_exists('DB')) {
    fail('config/config_db.php not found or incomplete: is GLPI installed?');
}

/** @var DBmysql $DB */
$DB = new DB();
if (!$DB->connected) {
    fail('could not connect to the database using config/config_db.php.');
}

if (!is_file($footer)) {
    fail("not found: {$footer}\nIs this script inside a GLPI root directory?");
}

$footer_content = file_get_contents($footer);
$installed      = str_contains($footer_content, $INCLUDE_PUSH);

$table   = PushSubscriptions::TABLE;
$context = WebPush::CONFIG_CONTEXT;

// ---------------------------------------------------------------------------
// Check
// ---------------------------------------------------------------------------

if ($mode === 'check') {
    $keys = Config::getConfigurationValues($context, ['vapid_public', 'vapid_private']);

    echo "GLPI root      : {$root}\n";
    echo "Footer include : " . ($installed ? 'INSTALLED' : 'not installed') . "\n";
    echo "Endpoint       : " . (is_file($endpoint) ? 'present' : 'MISSING (ajax/livepush.php)') . "\n";
    echo "Worker         : " . (is_file($worker) ? 'present' : 'MISSING (public/js/sw-push.js)') . "\n";
    echo "Page template  : " . (is_file($push_tpl) ? 'present' : 'MISSING (live_push.html.twig)') . "\n";
    echo "Table          : " . ($DB->tableExists($table) ? 'present' : 'MISSING') . "\n";
    echo "VAPID keypair  : " . (!empty($keys['vapid_public']) && !empty($keys['vapid_private']) ? 'present' : 'MISSING') . "\n";
    echo "PHP support    : " . (WebPush::isSupported() ? 'openssl + curl present' : 'MISSING openssl or curl') . "\n";
    echo "Subscriptions  : " . ($DB->tableExists($table) ? PushSubscriptions::count() . ' browser(s)' : 'n/a') . "\n";
    exit(0);
}

// ---------------------------------------------------------------------------
// Uninstall
// ---------------------------------------------------------------------------

if ($mode === 'uninstall') {
    if ($installed) {
        $nl      = eol($footer_content);
        $cleaned = str_replace(
            [$INCLUDE_PUSH . $nl, $INCLUDE_PUSH],
            '',
            $footer_content
        );
        file_put_contents($footer, $cleaned);
        echo "  removed the include from page_footer.html.twig\n";
    } else {
        echo "  page_footer.html.twig had no include, left untouched\n";
    }

    if ($DB->tableExists($table)) {
        $DB->doQuery("DROP TABLE `{$table}`");
        echo "  dropped table `{$table}`\n";
    }

    $DB->doQuery('DELETE FROM `glpi_configs` WHERE `context` = ' . $DB->quoteValue($context));
    echo "  removed the VAPID keypair and the send watermark\n";

    echo "\nBrowsers already subscribed will keep their (now unused) subscription\n";
    echo "until the push service expires it. Nothing is sent to them any more.\n";
    echo "\nRemember to remove bin/live-push-send.php from the system scheduler.\n";
    echo "\nNow clear the cache:  php bin/console cache:clear\n";
    exit(0);
}

// ---------------------------------------------------------------------------
// Install
// ---------------------------------------------------------------------------

if (!WebPush::isSupported()) {
    fail('ext-openssl and ext-curl are both required; neither can be worked around.');
}

foreach ([$endpoint => 'ajax/livepush.php', $worker => 'public/js/sw-push.js', $push_tpl => 'templates/layout/parts/live_push.html.twig'] as $file => $label) {
    if (!is_file($file)) {
        fail("missing {$label} — copy it into this GLPI root first.");
    }
}

if (!is_writable($footer)) {
    fail("not writable: {$footer}");
}

// --- Table -----------------------------------------------------------------

if ($DB->tableExists($table)) {
    echo "Table `{$table}` already exists, left as is\n";
} else {
    // Reuse the charset/collation of the rest of the schema so the new table
    // cannot drift from it.
    $charset   = DBConnection::getDefaultCharset();
    $collation = DBConnection::getDefaultCollation();
    $key_sign  = DBConnection::getDefaultPrimaryKeySignOption();

    $DB->doQuery(
        <<<SQL
        CREATE TABLE `{$table}` (
            `id` int {$key_sign} NOT NULL AUTO_INCREMENT,
            `users_id` int {$key_sign} NOT NULL DEFAULT '0',
            `endpoint` varchar(512) NOT NULL,
            `date_creation` timestamp NULL DEFAULT NULL,
            PRIMARY KEY (`id`),
            UNIQUE KEY `endpoint` (`endpoint`),
            KEY `users_id` (`users_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET = {$charset} COLLATE = {$collation} ROW_FORMAT=DYNAMIC;
        SQL
    );

    echo "Created table `{$table}`\n";
}

// --- VAPID keypair ---------------------------------------------------------

$keys = Config::getConfigurationValues($context, ['vapid_public', 'vapid_private']);

if (!empty($keys['vapid_public']) && !empty($keys['vapid_private'])) {
    echo "VAPID keypair already generated, left as is\n";
    echo "  (regenerating it would silently invalidate every existing subscription)\n";
} else {
    try {
        $generated = WebPush::generateKeys();
    } catch (Throwable $e) {
        fail($e->getMessage());
    }

    foreach (['vapid_public' => $generated['public'], 'vapid_private' => $generated['private']] as $name => $value) {
        $DB->updateOrInsert(
            'glpi_configs',
            ['value' => $value],
            ['context' => $context, 'name' => $name]
        );
    }

    echo "Generated a VAPID keypair\n";
}

// --- Footer ----------------------------------------------------------------

if ($installed) {
    echo "page_footer.html.twig already includes the registration, left as is\n";
} else {
    $nl       = eol($footer_content);
    $body_end = strripos($footer_content, '</body>');

    if ($body_end === false) {
        fail('could not find </body> in page_footer.html.twig; refusing to guess.');
    }

    file_put_contents(
        $footer,
        substr($footer_content, 0, $body_end)
        . $INCLUDE_PUSH . $nl
        . substr($footer_content, $body_end)
    );

    echo "Patched page_footer.html.twig (push registration included)\n";
}

// ---------------------------------------------------------------------------

$url_base = (string) (Config::getConfigurationValues('core', ['url_base'])['url_base'] ?? '');

echo "\nDone.\n";
echo "\nNext steps:\n";
echo "  1. php bin/console cache:clear\n";
echo "  2. Add this to the SYSTEM scheduler, every minute:\n";
echo "       php {$root}/bin/live-push-send.php\n";
echo "     GLPI's own cron is not enough: it only runs when someone loads a\n";
echo "     page, which is exactly when push is not needed.\n";
echo "  3. Load any GLPI page, click once, and allow notifications.\n";
echo "  4. php bin/live-push-send.php --status  should show 1 browser.\n";
echo "  5. Close every GLPI tab, have someone reply to one of your tickets,\n";
echo "     and wait for the scheduler to fire.\n";

if (!str_starts_with($url_base, 'https://')) {
    echo "\nWARNING: url_base is \"{$url_base}\".\n";
    echo "         Browsers refuse to register a service worker outside a secure\n";
    echo "         context, so push will never start on an http:// instance.\n";
    echo "         Everything else in the feature keeps working regardless.\n";
}

echo "\nTo revert:  php bin/install-live-push.php --uninstall\n";
