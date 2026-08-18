<?php

/**
 * Live timeline endpoint.
 *
 * Standalone on purpose: it adds the "new messages appear without reloading"
 * behaviour without touching any core PHP file, so it survives GLPI updates
 * and can be dropped into any GLPI 11.x instance.
 *
 *   ?action=count    -> {"count": N}          cheap polling
 *   ?action=entries  -> rendered timeline entries (HTML)
 *   ?action=mark_read (POST) -> {"success": true}   optional, unread counter
 */

use Glpi\Application\View\TemplateRenderer;
use Glpi\RichText\UserMention;

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
if (!in_array($action, ['count', 'entries', 'mark_read'], true)) {
    $fail(400);
}

if (!isset($_REQUEST['parenttype'], $_REQUEST['items_id'])) {
    $fail(400);
}

$parent = getItemForItemtype($_REQUEST['parenttype']);
if (!$parent instanceof CommonITILObject) {
    $fail(400);
}

// Never trust the client: the rendering below reuses the regular templates,
// so the only thing standing between a user and someone else's ticket is this
// check.
if (!$parent->getFromDB((int) $_REQUEST['items_id']) || !$parent->canViewItem()) {
    $fail(403);
}

Html::header_nocache();

if ($action === 'mark_read') {
    header('Content-Type: application/json; charset=UTF-8');

    if (class_exists('Glpi\Timeline\UnreadMessages')) {
        \Glpi\Timeline\UnreadMessages::markAsRead($parent);
    }

    echo json_encode(['success' => true]);
    return;
}

$timeline = $parent->getTimelineItems(['check_view_rights' => true]);

if ($action === 'count') {
    header('Content-Type: application/json; charset=UTF-8');
    echo json_encode(['count' => count($timeline)]);
    return;
}

// Reuse the exact same rendering as a regular page load, so injected messages
// cannot drift from the ones already on screen.
header('Content-Type: text/html; charset=UTF-8');
TemplateRenderer::getInstance()->display(
    'components/itilobject/timeline/timeline_entries.html.twig',
    [
        'item'               => $parent,
        'timeline'           => $timeline,
        'timeline_itemtypes' => $parent->getTimelineItemtypes(),
        'mention_options'    => UserMention::getMentionOptions($parent),
    ]
);
