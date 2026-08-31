<?php

/**
 * Web Push subscription endpoint.
 *
 * Standalone on purpose, like ajax/livetimeline.php next to it: it adds the
 * "notify me even when GLPI is closed" half without touching any core PHP
 * file, so it survives GLPI updates.
 *
 *   ?action=key         -> {"key": "<VAPID public key>"}  GET
 *   ?action=subscribe   -> {"success": true}              POST, endpoint
 *   ?action=unsubscribe -> {"success": true}              POST, endpoint
 *
 * The browser hands over an endpoint plus two encryption secrets; only the
 * endpoint is kept. See Glpi\Timeline\WebPush for why there is nothing to
 * encrypt.
 */

use Glpi\Timeline\PushSubscriptions;
use Glpi\Timeline\WebPush;

/**
 * Stop with a plain HTTP status. Avoids depending on the exception classes,
 * whose namespaces have moved between GLPI versions.
 */
$fail = static function (int $code): void {
    http_response_code($code);
    exit;
};

if (Session::getLoginUserID() === false) {
    $fail(403);
}

$action = $_REQUEST['action'] ?? null;
if (!in_array($action, ['key', 'subscribe', 'unsubscribe'], true)) {
    $fail(400);
}

Html::header_nocache();
header('Content-Type: application/json; charset=UTF-8');

if (!class_exists(WebPush::class) || !class_exists(PushSubscriptions::class)) {
    // Half-installed instance: say "no key" rather than break the page.
    echo json_encode(['key' => '']);
    return;
}

if ($action === 'key') {
    // An empty key is a valid answer meaning "push is not set up here": the
    // browser then simply never subscribes, and the polling notifier — which
    // covers every case except a closed application — carries on alone.
    echo json_encode([
        'key' => WebPush::isSupported() ? WebPush::getPublicKey() : '',
    ]);
    return;
}

// ---------------------------------------------------------------------------
// Subscription changes.
// ---------------------------------------------------------------------------

$endpoint = (string) ($_POST['endpoint'] ?? '');

// Never trust the client: this string later becomes a URL the SERVER itself
// posts to. Two things are checked, and both matter.
//
// It has to be https, compared case-insensitively because parse_url does not
// normalise the scheme — a browser only ever produces lowercase, but silently
// refusing a valid endpoint would turn push off for that browser with no trace.
//
// And it must not point back inside the network. Otherwise any logged-in user
// could register an endpoint of their choosing and use the sender as a blind
// probe of hosts they cannot reach themselves. Nothing comes back to them —
// the sender reads no response body — but an internal host being reachable at
// all is more than they should learn.
$parts  = parse_url($endpoint);
$scheme = strtolower((string) ($parts['scheme'] ?? ''));
// IPv6 hosts arrive bracketed; FILTER_VALIDATE_IP does not want the brackets.
$host   = trim((string) ($parts['host'] ?? ''), '[]');

$is_internal = $host === ''
    || strcasecmp($host, 'localhost') === 0
    || (
        filter_var($host, FILTER_VALIDATE_IP) !== false
        && filter_var(
            $host,
            FILTER_VALIDATE_IP,
            FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE
        ) === false
    );

if (
    $endpoint === ''
    || strlen($endpoint) > 512
    || $scheme !== 'https'
    || $is_internal
) {
    $fail(400);
}

if ($action === 'unsubscribe') {
    PushSubscriptions::forget($endpoint);
    echo json_encode(['success' => true]);
    return;
}

$stored = PushSubscriptions::store((int) Session::getLoginUserID(), $endpoint);

echo json_encode(['success' => $stored]);
