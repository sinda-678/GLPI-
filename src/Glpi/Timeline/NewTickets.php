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
use DBmysql;
use mysqli_result;
use Session;
use Throwable;
use Ticket;

/**
 * Tickets that just arrived, from the point of view of a technician.
 *
 * Companion of {@see UnreadMessages}: that one answers "somebody replied on a
 * ticket of mine", this one answers "a ticket just landed in the queue". The
 * two are deliberately kept apart, because they are read differently — a reply
 * concerns a conversation the user is already part of, a new ticket concerns
 * work nobody has taken yet.
 *
 * Only the back-office interface is served: an end user has no queue to watch.
 *
 * Like its sibling, the whole thing degrades to "nothing to report" rather than
 * ever breaking the page that asked for it.
 */
final class NewTickets
{
    /**
     * Maximum number of tickets announced by the global notifier.
     */
    public const RECENT_LIMIT = 10;

    /**
     * Maximum number of tickets read from the database before the rights of
     * the current user are applied. Bounds the cost of the per-item check
     * below, at the price of possibly missing an old ticket for a user who
     * may see almost nothing.
     */
    public const CANDIDATE_LIMIT = 40;

    /**
     * Maximum number of tickets detailed in a summary.
     */
    public const SUMMARY_LIMIT = 20;

    /**
     * Whether the current user is someone this feature is meant for.
     *
     * The helpdesk interface is excluded on purpose: a self-service user must
     * not be told that other people opened tickets.
     */
    public static function isEligible(): bool
    {
        return Session::getLoginUserID() !== false
            && Session::getCurrentInterface() === 'central'
            && Session::haveRight(Ticket::$rightname, READ);
    }

    /**
     * Recently created tickets the current user may see, newest first.
     *
     * Feeds the global notifier, which decides on its own which of them are
     * actually new to this browser.
     *
     * @return array<int, array{id:int, name:string}>
     */
    public static function getRecent(): array
    {
        $rows = self::fetch(self::buildQuery(false), self::RECENT_LIMIT);

        return array_map(
            static fn(array $row): array => [
                'id'   => (int) $row['id'],
                'name' => (string) $row['name'],
            ],
            $rows
        );
    }

    /**
     * Untriaged tickets the current user has never opened.
     *
     * Kept to the incoming status on purpose: this is the queue, not a history.
     * It empties itself, since a ticket leaves the list as soon as somebody
     * takes it (the status changes) or the user opens it (a read row is
     * written by the timeline).
     *
     * @return array{total:int, items:array<int, array{itemtype:string, items_id:int, name:string, count:int, last_date:string}>}
     */
    public static function getSummary(): array
    {
        $query = self::buildQuery(true);
        $rows  = self::fetch($query, self::SUMMARY_LIMIT);

        $items = array_map(
            static fn(array $row): array => [
                'itemtype'  => 'Ticket',
                'items_id'  => (int) $row['id'],
                'name'      => (string) $row['name'],
                // One ticket is one thing to look at: the count exists only so
                // the dropdown can render both sections with the same markup.
                'count'     => 1,
                'last_date' => (string) $row['date_creation'],
            ],
            $rows
        );

        return ['total' => self::countQueue($query, count($items)), 'items' => $items];
    }

    /**
     * How many tickets the badge should announce.
     *
     * The dropdown only lists SUMMARY_LIMIT of them, but the badge has to
     * reflect the whole queue, exactly as the unread messages counter does.
     *
     * A real count is only run for users whose rights the query expresses in
     * full; for anyone else the rows are rights-checked one by one and the
     * listed ones are all there is to go on. That fallback can only understate
     * a restricted user sitting on more than SUMMARY_LIMIT unopened tickets
     * they are an actor of, which is not a situation worth a query per row.
     */
    private static function countQueue(string $query, int $listed): int
    {
        /** @var DBmysql $DB */
        global $DB;

        if ($query === '' || $listed < self::SUMMARY_LIMIT) {
            return $listed;   // nothing was cut off: the list is the count
        }

        if (!Session::haveRight(Ticket::$rightname, Ticket::READALL)) {
            return $listed;
        }

        try {
            $result = $DB->doQuery('SELECT COUNT(*) AS total FROM (' . $query . ') AS q');
            $row    = $result instanceof mysqli_result ? $result->fetch_assoc() : null;

            return (int) ($row['total'] ?? $listed);
        } catch (Throwable $e) {
            return $listed;
        }
    }

    /**
     * Build the candidate query.
     *
     * @param bool $queue_only Restrict to untriaged, never-opened tickets.
     */
    private static function buildQuery(bool $queue_only): string
    {
        $users_id = (int) Session::getLoginUserID();

        // Entities are mandatory: without them the query would span the whole
        // instance, so an empty list means "nothing to report" rather than
        // "everything".
        $entities = array_map('intval', $_SESSION['glpiactiveentities'] ?? []);
        if ($entities === []) {
            return '';
        }
        $entities_in = implode(',', $entities);

        $baseline     = DBmysql::quoteValue(UnreadMessages::getBaselineDate());
        $actor_clause = UnreadMessages::visibilityClause('t');

        $queue_clause = '';
        if ($queue_only) {
            $queue_clause = ' AND t.`status` = ' . CommonITILObject::INCOMING;

            // A ticket already opened by this user is no longer news. The read
            // table may be missing on an instance that never ran the
            // installer, in which case the filter is simply skipped.
            if (UnreadMessages::isAvailable()) {
                $table = UnreadMessages::TABLE;
                $queue_clause .= <<<SQL

                      AND NOT EXISTS (
                          SELECT 1 FROM `{$table}` AS r
                           WHERE r.`itemtype` = 'Ticket'
                             AND r.`items_id` = t.`id`
                             AND r.`users_id` = {$users_id}
                      )
                SQL;
            }
        }

        return <<<SQL
            SELECT t.`id`            AS id,
                   t.`name`          AS name,
                   t.`date_creation` AS date_creation
            FROM `glpi_tickets` AS t
            WHERE t.`is_deleted` = 0
              AND t.`entities_id` IN ({$entities_in})
              AND t.`date_creation` > {$baseline}
              AND t.`users_id_recipient` <> {$users_id}
              {$queue_clause}
              {$actor_clause}
            ORDER BY t.`id` DESC
        SQL;
    }


    /**
     * Run a candidate query and keep only what the current user may read.
     *
     * The rights are applied per item rather than in SQL. GLPI decides who
     * sees a ticket through a mix of profile rights, actor tables, groups and
     * entity recursion; restating that in a join is how tickets end up leaking
     * between profiles. Ticket::canViewItem() is the authority, so it is the
     * one asked.
     *
     * @return array<int, array<string, mixed>>
     */
    private static function fetch(string $query, int $limit): array
    {
        /** @var DBmysql $DB */
        global $DB;

        if ($query === '' || !self::isEligible()) {
            return [];
        }

        // The common case: a technician allowed to see every ticket of the
        // entities they are in, which the query already filters on. Loading
        // each ticket to be told "yes" would cost one query per row.
        $sees_everything = Session::haveRight(Ticket::$rightname, Ticket::READALL);

        $query .= ' LIMIT ' . ($sees_everything ? $limit : self::CANDIDATE_LIMIT);

        $kept = [];

        try {
            $result = $DB->doQuery($query);

            while ($result instanceof mysqli_result && ($row = $result->fetch_assoc())) {
                if (!$sees_everything) {
                    $ticket = new Ticket();
                    if (!$ticket->getFromDB((int) $row['id']) || !$ticket->canViewItem()) {
                        continue;
                    }
                }

                $kept[] = $row;

                if (count($kept) >= $limit) {
                    break;
                }
            }
        } catch (Throwable $e) {
            // A notification that fails must never break the page that asked
            // for it: every GLPI page asks for this one.
            trigger_error('New tickets lookup failed: ' . $e->getMessage(), E_USER_WARNING);

            return [];
        }

        return $kept;
    }
}
