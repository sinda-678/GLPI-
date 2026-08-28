<?php

/**
 * ---------------------------------------------------------------------
 *
 * GLPI - Gestionnaire Libre de Parc Informatique
 *
 * http://glpi-project.org
 *
 * @copyright 2015-2025 Teclib' and contributors.
 * @licence   https://www.gnu.org/licenses/gpl-3.0.html
 *
 * ---------------------------------------------------------------------
 *
 * LICENSE
 *
 * This file is part of GLPI.
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 *
 * ---------------------------------------------------------------------
 */

namespace Glpi\Timeline;

use CommonITILObject;
use Config;
use DBmysql;
use ITILFollowup;
use mysqli_result;
use Session;
use Throwable;
use Ticket;

/**
 * Per-user read state of ITIL object timelines.
 *
 * GLPI has no native notion of read/unread. This class stores, for each
 * (user, ITIL object) pair, the last time the user actually looked at the
 * timeline. Anything posted by somebody else after that date counts as
 * unread, which is what feeds the counter displayed in the page header.
 *
 * The whole feature degrades to "nothing unread" when the backing table is
 * missing, so an instance that has not run the installer keeps working.
 */
final class UnreadMessages
{
    /**
     * Backing table. Not a CommonDBTM object on purpose: this is internal
     * bookkeeping, it has no form, no search option and no history.
     */
    public const TABLE = 'glpi_itilobject_userreads';

    /**
     * Maximum number of ITIL objects detailed in a summary.
     */
    public const SUMMARY_LIMIT = 20;

    /**
     * Configuration context holding the feature baseline.
     */
    public const CONFIG_CONTEXT = 'unread_messages';

    /**
     * Date from which messages start being counted, for a user who has never
     * opened a given ticket. It is set once, when the table is installed, so
     * that nobody is greeted by a counter listing years of history.
     */
    public static function getBaselineDate(): string
    {
        $values = Config::getConfigurationValues(self::CONFIG_CONTEXT, ['baseline_date']);

        return $values['baseline_date'] ?? '1970-01-01 00:00:00';
    }

    /**
     * SQL restricting tickets to those the current user may be told about.
     *
     * Someone allowed to read every ticket gets no restriction at all: the
     * caller already filters on the active entities, which is the real
     * boundary for them. That matters because replying to a ticket does not
     * make anyone an actor of it in GLPI — a technician working a ticket he
     * was never formally assigned to would otherwise never hear about the
     * answers he is waiting for.
     *
     * For everyone else the actor tables stay the boundary, and they cover
     * every way a ticket can be visible to them: requester, observer and
     * assignee all live in glpi_tickets_users, groups in glpi_groups_tickets.
     *
     * @param string $alias alias of glpi_tickets in the calling query
     * @return string an ' AND (...)' fragment, or '' when unrestricted
     */
    public static function visibilityClause(string $alias = 't'): string
    {
        if (Session::haveRight(Ticket::$rightname, Ticket::READALL)) {
            return '';
        }

        $users_id = (int) Session::getLoginUserID();

        $clauses = ["`{$alias}`.`id` IN (SELECT `tickets_id` FROM `glpi_tickets_users` WHERE `users_id` = {$users_id})"];

        $groups = array_map('intval', $_SESSION['glpigroups'] ?? []);
        if ($groups !== []) {
            $groups_in = implode(',', $groups);
            $clauses[] = "`{$alias}`.`id` IN (SELECT `tickets_id` FROM `glpi_groups_tickets` WHERE `groups_id` IN ({$groups_in}))";
        }

        return ' AND (' . implode(' OR ', $clauses) . ')';
    }

    /**
     * Whether the read-state table has been installed.
     */
    public static function isAvailable(): bool
    {
        /** @var DBmysql|null $DB */
        global $DB;

        return $DB instanceof DBmysql && $DB->tableExists(self::TABLE);
    }

    /**
     * Record that $users_id has seen everything posted on $item so far.
     */
    public static function markAsRead(CommonITILObject $item, ?int $users_id = null): bool
    {
        /** @var DBmysql $DB */
        global $DB;

        $users_id ??= Session::getLoginUserID();

        if (!$users_id || $item->isNewItem() || !self::isAvailable()) {
            return false;
        }

        $where = [
            'itemtype' => $item->getType(),
            'items_id' => (int) $item->getID(),
            'users_id' => (int) $users_id,
        ];

        try {
            return (bool) $DB->updateOrInsert(
                self::TABLE,
                ['last_read_date' => $_SESSION['glpi_currenttime'] ?? date('Y-m-d H:i:s')],
                $where
            );
        } catch (Throwable $e) {
            // Losing a read state only means the counter stays up: never
            // let it break the request that triggered it.
            trigger_error('Unread messages update failed: ' . $e->getMessage(), E_USER_WARNING);

            return false;
        }
    }

    /**
     * Unread messages of the current user, grouped by ticket.
     *
     * Only tickets the user is an actor of are considered, which is both the
     * useful scope (a user cares about "his" tickets) and the cheap one: it
     * avoids walking the whole ticket table.
     *
     * @return array{total:int, items:array<int, array{items_id:int, itemtype:string, name:string, count:int, first_unread_anchor:string, last_date:string}>}
     */
    public static function getSummary(?int $users_id = null): array
    {
        /** @var DBmysql $DB */
        global $DB;

        $empty = ['total' => 0, 'items' => []];

        $users_id = (int) ($users_id ?? Session::getLoginUserID());
        if (!$users_id || !self::isAvailable()) {
            return $empty;
        }

        $entities = array_map('intval', $_SESSION['glpiactiveentities'] ?? []);
        if ($entities === []) {
            return $empty;
        }
        $entities_in = implode(',', $entities);

        $visibility = self::visibilityClause('t');

        // Private followups are only counted for users allowed to read them.
        $private_clause = Session::haveRight('followup', ITILFollowup::SEEPRIVATE)
            ? ''
            : ' AND f.`is_private` = 0';

        // Hiding closed tickets outright used to hide the very thing the user
        // needed to see: the solution and the comment that close a ticket land
        // at the instant its status becomes closed. A recently closed ticket
        // therefore stays in scope, and leaves it on its own once the window
        // has passed — so the counter still never digs up old history.
        $closed = array_map('intval', Ticket::getClosedStatusArray());
        $recent_since = DBmysql::quoteValue(
            date('Y-m-d H:i:s', strtotime('-' . SolutionEvents::WINDOW_HOURS . ' hours'))
        );
        $closed_clause = $closed !== []
            ? ' AND (t.`status` NOT IN (' . implode(',', $closed) . ')'
                . ' OR (t.`closedate` IS NOT NULL AND t.`closedate` > ' . $recent_since . '))'
            : '';

        $table    = self::TABLE;
        $limit    = self::SUMMARY_LIMIT;
        $baseline = DBmysql::quoteValue(self::getBaselineDate());

        // Shared by the total and the detailed list, so the badge and the
        // dropdown can never disagree.
        // Followups and solutions are one and the same thing to a reader: both
        // are entries appearing on a ticket they have not looked at since.
        // Counting only followups is what left "a solution was proposed" out
        // of the badge entirely.
        $from_where = <<<SQL
            FROM `glpi_tickets` AS t
            INNER JOIN (
                SELECT `id`, `items_id`, `users_id`, `date_creation`,
                       `is_private`, 'ITILFollowup' AS entry_type
                FROM `glpi_itilfollowups`
                WHERE `itemtype` = 'Ticket'

                UNION ALL

                SELECT `id`, `items_id`, `users_id`, `date_creation`,
                       0 AS `is_private`, 'ITILSolution' AS entry_type
                FROM `glpi_itilsolutions`
                WHERE `itemtype` = 'Ticket'
            ) AS f
                    ON f.`items_id` = t.`id`
                   AND f.`users_id` <> {$users_id}
                   {$private_clause}
            LEFT JOIN `{$table}` AS r
                   ON r.`itemtype` = 'Ticket'
                  AND r.`items_id` = t.`id`
                  AND r.`users_id` = {$users_id}
            WHERE t.`is_deleted` = 0
              AND t.`entities_id` IN ({$entities_in})
              {$closed_clause}
              {$visibility}
              AND f.`date_creation` > COALESCE(r.`last_read_date`, {$baseline})
        SQL;

        // The counter must reflect every unread message, not only those of the
        // tickets listed in the dropdown, hence a dedicated total.
        $total_query = "SELECT COUNT(*) AS total {$from_where}";

        // first_unread_anchor is the oldest unread entry, in the form the
        // timeline gives it an id: "ITILFollowup_12", "ITILSolution_4". A bare
        // id no longer identifies an entry now that two tables feed the list —
        // they number their rows independently — so the type travels with it.
        $list_query = <<<SQL
            SELECT t.`id`                  AS items_id,
                   t.`name`                AS name,
                   COUNT(*)                AS unread_count,
                   SUBSTRING_INDEX(
                       GROUP_CONCAT(CONCAT(f.`entry_type`, '_', f.`id`)
                                    ORDER BY f.`date_creation` ASC, f.`id` ASC),
                       ',', 1
                   )                       AS first_unread_anchor,
                   MAX(f.`date_creation`)  AS last_date
            {$from_where}
            GROUP BY t.`id`, t.`name`
            ORDER BY last_date DESC
            LIMIT {$limit}
        SQL;

        try {
            $total_result = $DB->doQuery($total_query);
            $total_row    = $total_result instanceof mysqli_result ? $total_result->fetch_assoc() : null;
            $total        = (int) ($total_row['total'] ?? 0);

            if ($total === 0) {
                return $empty;
            }

            $items  = [];
            $result = $DB->doQuery($list_query);

            while ($result instanceof mysqli_result && ($row = $result->fetch_assoc())) {
                $items[] = [
                    'itemtype'  => 'Ticket',
                    'items_id'  => (int) $row['items_id'],
                    'name'      => (string) $row['name'],
                    'count'     => (int) $row['unread_count'],
                    // Lets the dropdown link straight to where reading
                    // stopped, instead of dropping the user at the top.
                    'first_unread_anchor' => (string) $row['first_unread_anchor'],
                    'last_date' => (string) $row['last_date'],
                ];
            }
        } catch (Throwable $e) {
            // The counter is a convenience: a broken query must never take the
            // page header down with it.
            trigger_error(
                'Unread messages summary failed: ' . $e->getMessage(),
                E_USER_WARNING
            );

            return $empty;
        }

        return ['total' => $total, 'items' => $items];
    }
}
