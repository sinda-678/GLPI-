<?php

/**
 * Live timeline endpoint.
 *
 * Standalone on purpose: it adds the "new messages appear without reloading"
 * behaviour without touching any core PHP file, so it survives GLPI updates
 * and can be dropped into any GLPI 11.x instance.
 *
 * Ticket-scoped actions (need parenttype + items_id):
 *   ?action=count         -> {"count": N, "signature": "..."}  cheap polling
 *   ?action=entries       -> rendered timeline entries (HTML)
 *   ?action=approval      -> {"html": "..."} solution approval block, or ""
 *   ?action=mark_read     -> {"success": true}                POST, unread counter
 *
 * Global action (no ticket needed):
 *   ?action=notifications -> {"messages": [...], "tickets": [...], "events": [...]}
 *                            recent replies on my tickets, tickets that just
 *                            landed in the queue (technicians only), and
 *                            solution/closure events on tickets I may see
 */

use Glpi\Application\View\TemplateRenderer;
use Glpi\RichText\UserMention;
use Glpi\Timeline\NewTickets;
use Glpi\Timeline\SolutionEvents;

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
if (!in_array($action, ['count', 'entries', 'mark_read', 'notifications', 'approval'], true)) {
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

        // Window shared with the solution events, so the two feeds never
        // disagree on what still counts as recent news.
        $window_hours = class_exists(SolutionEvents::class) ? SolutionEvents::WINDOW_HOURS : 24;
        $recent_since = DBmysql::quoteValue(
            date('Y-m-d H:i:s', strtotime("-{$window_hours} hours"))
        );

        // A ticket that closes must not take its last messages down with it.
        // The comment written when a solution is approved is posted at the
        // very instant the ticket becomes closed, so a plain "hide closed
        // tickets" filter swallows precisely the message announcing the
        // closure. Recently closed tickets therefore stay in scope, and leave
        // it on their own once the window has passed — which preserves the
        // original intent: never dig up the history of a long-closed ticket.
        $closed = array_map('intval', Ticket::getClosedStatusArray());
        $closed_clause = $closed !== []
            ? ' AND (t.`status` NOT IN (' . implode(',', $closed) . ')'
                . ' OR (t.`closedate` IS NOT NULL AND t.`closedate` > ' . $recent_since . '))'
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

    // The ticket moved on: a solution was proposed, approved, refused, or the
    // ticket was closed. Third list, third watermark, because these are state
    // CHANGES rather than new rows and cannot be tracked by a growing id —
    // see SolutionEvents for why.
    $events = [];
    try {
        if (class_exists(SolutionEvents::class)) {
            $events = SolutionEvents::getRecent();
        }
    } catch (Throwable $e) {
        $events = [];
    }

    echo json_encode([
        'messages' => $messages,
        'tickets'  => $tickets,
        'events'   => $events,
    ]);
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

if ($action === 'approval') {
    header('Content-Type: application/json; charset=UTF-8');

    // The approval block is rendered by the server rather than assembled in
    // the browser, and for the same reason the timeline entries are: it
    // carries a CSRF token and a rich text editor, and both have to come out
    // of the exact code path a regular page load uses, or they are subtly
    // wrong in ways that only show up when the user clicks Approve.
    //
    // An empty string is a legitimate answer, not a failure: it means the form
    // has no reason to be on screen — the ticket is not solved any more, it is
    // already closed, or this user is not the one who may approve it. The
    // template decides that on its own, exactly as it does on a page load.
    $html = '';

    ob_start();
    try {
        TemplateRenderer::getInstance()->display(
            'components/itilobject/timeline/approbation_form.html.twig',
            ['item' => $parent]
        );
        $html = (string) ob_get_clean();
    } catch (Throwable $e) {
        ob_end_clean();
        // Same rule as everywhere else here: the page that asked must survive.
    }

    echo json_encode(['html' => $html]);
    return;
}

$timeline = $parent->getTimelineItems(['check_view_rights' => true]);

if ($action === 'count') {
    header('Content-Type: application/json; charset=UTF-8');

    // `count` alone cannot see the whole picture. Approving a solution adds
    // nothing to the timeline — it updates the existing solution row and moves
    // the ticket to closed — so a browser watching only the number of entries
    // keeps showing an approval form for a ticket that no longer needs one,
    // until the user reloads. The signature moves on either event.
    //
    // `count` is still returned: it is what tells the browser whether it has
    // to fetch the entries again, or only the approval block.
    echo json_encode([
        'count'     => count($timeline),
        'signature' => implode('|', [
            count($timeline),
            (string) ($parent->fields['status'] ?? ''),
            (string) ($parent->fields['date_mod'] ?? ''),
        ]),
    ]);
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
