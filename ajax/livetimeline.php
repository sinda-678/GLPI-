<?php

/**
 * Live timeline endpoint.
 *
 * Standalone on purpose: it adds the "new messages appear without reloading"
 * behaviour without touching any core PHP file, so it survives GLPI updates
 * and can be dropped into any GLPI 11.x instance.
 *
 * Ticket-scoped actions (need parenttype + items_id):
 *   ?action=count         -> {"count": N}                     cheap polling
 *   ?action=entries       -> rendered timeline entries (HTML)
 *   ?action=mark_read     -> {"success": true}                POST, unread counter
 *
 * Global action (no ticket needed):
 *   ?action=notifications -> {"messages": [...], "tickets": [...]}
 *                            recent replies on my tickets, and tickets that
 *                            just landed in the queue (technicians only)
 */

use Glpi\Application\View\TemplateRenderer;
use Glpi\RichText\UserMention;
use Glpi\Timeline\NewTickets;

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
if (!in_array($action, ['count', 'entries', 'mark_read', 'notifications'], true)) {
    $fail(400);
}

// ---------------------------------------------------------------------------
// Global action: recent replies across every ticket the user takes part in.
// ---------------------------------------------------------------------------

if ($action === 'notifications') {
    /** @var DBmysql $DB */
    global $DB;

    Html::header_nocache();
    header('Content-Type: application/json; charset=UTF-8');

    $users_id = (int) Session::getLoginUserID();
    $messages = [];

    // Entities are mandatory: without them the query would span the whole
    // instance, so an empty list means "nothing to report" rather than "all".
    $entities = array_map('intval', $_SESSION['glpiactiveentities'] ?? []);

    if ($entities !== []) {
        $entities_in = implode(',', $entities);

        // Same scoping as the new-ticket feed: a technician allowed to read
        // every ticket hears about every reply, actor or not. Replying does
        // not make anyone an actor in GLPI, so requiring it left technicians
        // deaf on the very tickets they were working.
        $visibility = \Glpi\Timeline\UnreadMessages::visibilityClause('t');

        // Private followups stay invisible to users who may not read them.
        $private = Session::haveRight('followup', ITILFollowup::SEEPRIVATE)
            ? ''
            : ' AND f.`is_private` = 0';

        $closed = array_map('intval', Ticket::getClosedStatusArray());
        $closed_clause = $closed !== []
            ? ' AND t.`status` NOT IN (' . implode(',', $closed) . ')'
            : '';

        $query = "
            SELECT f.`id`       AS id,
                   f.`items_id` AS tickets_id,
                   t.`name`     AS ticket
            FROM `glpi_itilfollowups` AS f
            INNER JOIN `glpi_tickets` AS t
                    ON t.`id` = f.`items_id`
                   AND t.`is_deleted` = 0
            WHERE f.`itemtype` = 'Ticket'
              AND f.`users_id` <> {$users_id}
              {$private}
              AND t.`entities_id` IN ({$entities_in})
              {$closed_clause}
              {$visibility}
            ORDER BY f.`id` DESC
            LIMIT 10
        ";

        try {
            $result = $DB->doQuery($query);
            while ($result instanceof mysqli_result && ($row = $result->fetch_assoc())) {
                $messages[] = [
                    'id'         => (int) $row['id'],
                    'tickets_id' => (int) $row['tickets_id'],
                    // Deliberately no author name: entities may anonymise
                    // support agents, and the ticket title is context enough.
                    'ticket'     => (string) $row['ticket'],
                ];
            }
        } catch (Throwable $e) {
            // A notification that fails must never break the page that asked
            // for it: every GLPI page calls this.
            $messages = [];
        }
    }

    // Tickets that just arrived. Separate list, separate look in the browser:
    // "somebody replied to you" and "work is waiting" are not the same news.
    $tickets = [];
    try {
        if (class_exists(NewTickets::class)) {
            $tickets = NewTickets::getRecent();
        }
    } catch (Throwable $e) {
        $tickets = [];
    }

    echo json_encode(['messages' => $messages, 'tickets' => $tickets]);
    return;
}

// ---------------------------------------------------------------------------
// Ticket-scoped actions.
// ---------------------------------------------------------------------------

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
