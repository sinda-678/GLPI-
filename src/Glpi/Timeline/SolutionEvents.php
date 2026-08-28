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

use CommonITILValidation;
use DBmysql;
use mysqli_result;
use Session;
use Throwable;

/**
 * Solution and closure events, from the point of view of one user.
 *
 * Third sibling of {@see UnreadMessages} and {@see NewTickets}. Those two
 * answer "somebody replied" and "work arrived"; this one answers "the ticket
 * moved on" — a solution was proposed, approved, refused, or the ticket was
 * closed.
 *
 * Why it cannot reuse the id watermark the other two use
 * -----------------------------------------------------
 * A reply is a new row, so "the highest id I have seen" is enough to tell new
 * from old. Approving or refusing a solution UPDATES the existing row instead:
 * its id does not move, so an id watermark would announce the proposal and
 * stay silent on the verdict. These events are therefore keyed on WHEN they
 * happened, and the caller watermarks them on that timestamp.
 *
 * Closed tickets are deliberately in scope: the closure is precisely the news
 * to deliver. The window below is what keeps that from re-opening the whole
 * history of every ticket ever closed.
 *
 * Like its siblings, the whole thing degrades to "nothing to report" rather
 * than ever breaking the page that asked for it.
 */
final class SolutionEvents
{
    /**
     * Maximum number of events announced in one round.
     */
    public const RECENT_LIMIT = 10;

    /**
     * How far back an event may be and still be worth announcing.
     *
     * This is what replaces the "not closed" filter used elsewhere: instead of
     * hiding closed tickets forever — which is what swallowed the closure
     * notification in the first place — it lets the event through and then
     * lets it expire.
     */
    public const WINDOW_HOURS = 24;

    /**
     * Recent solution and closure events the current user may hear about.
     *
     * Newest first, so the caller can watermark on the first entry.
     *
     * @return array<int, array{key:string, ts:int, kind:string, tickets_id:int, ticket:string, anchor_type:?string, anchor_id:?int}>
     */
    public static function getRecent(): array
    {
        /** @var DBmysql $DB */
        global $DB;

        $users_id = (int) Session::getLoginUserID();
        if ($users_id === 0) {
            return [];
        }

        // Entities are mandatory: without them the query would span the whole
        // instance, so an empty list means "nothing to report" rather than
        // "everything".
        $entities = array_map('intval', $_SESSION['glpiactiveentities'] ?? []);
        if ($entities === []) {
            return [];
        }
        $entities_in = implode(',', $entities);

        // Shared by the three branches: the same tickets the message feed is
        // allowed to talk about. Written once, in UnreadMessages, so the three
        // feeds can never drift apart on who may hear what.
        $visibility = UnreadMessages::visibilityClause('t');

        $since    = DBmysql::quoteValue(
            date('Y-m-d H:i:s', strtotime('-' . self::WINDOW_HOURS . ' hours'))
        );
        $accepted = (int) CommonITILValidation::ACCEPTED;
        $refused  = (int) CommonITILValidation::REFUSED;
        $limit    = self::RECENT_LIMIT;

        $scope = "t.`is_deleted` = 0 AND t.`entities_id` IN ({$entities_in}){$visibility}";

        // Three kinds of news about the same ticket, told apart by `kind` so
        // the browser can word and colour each one for itself.
        //
        // Every branch excludes the user who caused the event: being told
        // about one's own click is noise, and the page they landed on already
        // shows the result.
        $query = <<<SQL
            SELECT * FROM (
                SELECT CONCAT('sol-', s.`id`)              AS ev_key,
                       UNIX_TIMESTAMP(s.`date_creation`)   AS ts,
                       'solution'                          AS kind,
                       s.`items_id`                        AS tickets_id,
                       t.`name`                            AS ticket,
                       s.`id`                              AS anchor_id
                FROM `glpi_itilsolutions` AS s
                INNER JOIN `glpi_tickets` AS t ON t.`id` = s.`items_id`
                WHERE s.`itemtype` = 'Ticket'
                  AND s.`users_id` <> {$users_id}
                  AND s.`date_creation` > {$since}
                  AND {$scope}

                UNION ALL

                SELECT CONCAT('app-', s.`id`),
                       UNIX_TIMESTAMP(s.`date_approval`),
                       CASE s.`status` WHEN {$accepted} THEN 'approved' ELSE 'refused' END,
                       s.`items_id`,
                       t.`name`,
                       s.`id`
                FROM `glpi_itilsolutions` AS s
                INNER JOIN `glpi_tickets` AS t ON t.`id` = s.`items_id`
                WHERE s.`itemtype` = 'Ticket'
                  AND s.`status` IN ({$accepted}, {$refused})
                  AND s.`date_approval` IS NOT NULL
                  AND s.`date_approval` > {$since}
                  AND COALESCE(s.`users_id_approval`, 0) <> {$users_id}
                  AND {$scope}

                UNION ALL

                SELECT CONCAT('close-', t.`id`),
                       UNIX_TIMESTAMP(t.`closedate`),
                       'closed',
                       t.`id`,
                       t.`name`,
                       NULL
                FROM `glpi_tickets` AS t
                WHERE t.`closedate` IS NOT NULL
                  AND t.`closedate` > {$since}
                  AND COALESCE(t.`users_id_lastupdater`, 0) <> {$users_id}
                  AND {$scope}
            ) AS e
            ORDER BY ts DESC
            LIMIT {$limit}
        SQL;

        $events = [];

        try {
            $result = $DB->doQuery($query);

            while ($result instanceof mysqli_result && ($row = $result->fetch_assoc())) {
                $anchor_id = $row['anchor_id'] !== null ? (int) $row['anchor_id'] : null;

                $events[] = [
                    'key'         => (string) $row['ev_key'],
                    'ts'          => (int) $row['ts'],
                    'kind'        => (string) $row['kind'],
                    'tickets_id'  => (int) $row['tickets_id'],
                    // Deliberately no author name: entities may anonymise
                    // support agents, and the ticket title is context enough.
                    'ticket'      => (string) $row['ticket'],
                    // Lets a notification point at the solution itself rather
                    // than at the top of the ticket. Absent for a closure:
                    // there is no single entry to aim at.
                    'anchor_type' => $anchor_id !== null ? 'ITILSolution' : null,
                    'anchor_id'   => $anchor_id,
                ];
            }
        } catch (Throwable $e) {
            // A notification that fails must never break the page that asked
            // for it: every GLPI page calls this.
            return [];
        }

        return $events;
    }
}
