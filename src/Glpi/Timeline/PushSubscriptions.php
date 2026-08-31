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

use DBmysql;
use mysqli_result;
use Throwable;

/**
 * Browsers that have asked to be told about ticket activity while GLPI is not
 * open in front of them.
 *
 * One row per browser, not per user: somebody using a laptop and a desktop has
 * two, and each has to be rung separately. The endpoint is the push service's
 * per-device URL and is the natural unique key.
 *
 * Only the endpoint is stored. A browser subscription also carries p256dh and
 * auth secrets, but those exist purely to encrypt a payload — and this sender
 * has no payload to encrypt (see {@see WebPush}). Keeping secrets that nothing
 * reads would be a liability with no upside, so they are dropped on arrival.
 *
 * Like the rest of the feature, everything degrades to "nobody to notify"
 * rather than breaking the page that asked.
 */
final class PushSubscriptions
{
    /**
     * Backing table. Not a CommonDBTM object on purpose: internal bookkeeping,
     * no form, no search option, no history.
     */
    public const TABLE = 'glpi_itilobject_pushsubs';

    /**
     * Whether the table has been installed.
     */
    public static function isAvailable(): bool
    {
        /** @var DBmysql|null $DB */
        global $DB;

        return $DB instanceof DBmysql && $DB->tableExists(self::TABLE);
    }

    /**
     * Remember a browser, or refresh the one already recorded.
     *
     * A push service may hand the same endpoint back to a different user on a
     * shared machine, so the endpoint — not the pair — is the unique key, and
     * re-subscribing simply moves it to whoever is logged in now.
     */
    public static function store(int $users_id, string $endpoint): bool
    {
        /** @var DBmysql $DB */
        global $DB;

        if ($users_id <= 0 || $endpoint === '' || !self::isAvailable()) {
            return false;
        }

        try {
            return (bool) $DB->updateOrInsert(
                self::TABLE,
                [
                    'users_id'      => $users_id,
                    'date_creation' => $_SESSION['glpi_currenttime'] ?? date('Y-m-d H:i:s'),
                ],
                ['endpoint' => $endpoint]
            );
        } catch (Throwable $e) {
            trigger_error('Push subscription store failed: ' . $e->getMessage(), E_USER_WARNING);

            return false;
        }
    }

    /**
     * Forget a browser: it unsubscribed, or the push service says it is gone.
     */
    public static function forget(string $endpoint): bool
    {
        /** @var DBmysql $DB */
        global $DB;

        if ($endpoint === '' || !self::isAvailable()) {
            return false;
        }

        try {
            return (bool) $DB->delete(self::TABLE, ['endpoint' => $endpoint]);
        } catch (Throwable $e) {
            return false;
        }
    }

    /**
     * Who takes part in each of these tickets.
     *
     * Actors only — requester, observer, assignee, and the members of any
     * group in those roles. This is deliberately NARROWER than the in-app feed,
     * which also serves technicians holding READALL: being able to read every
     * ticket in the instance is a good reason to see a counter, and a terrible
     * reason to have a phone buzz. It is also exactly how GLPI's own mail
     * notifications choose their recipients.
     *
     * @param int[] $tickets_ids
     * @return array<int, int[]> ticket id => user ids
     */
    public static function actorsOf(array $tickets_ids): array
    {
        /** @var DBmysql $DB */
        global $DB;

        $tickets_ids = array_values(array_unique(array_map('intval', $tickets_ids)));
        if ($tickets_ids === [] || !self::isAvailable()) {
            return [];
        }

        $in = implode(',', $tickets_ids);

        $query = <<<SQL
            SELECT `tickets_id`, `users_id`
            FROM `glpi_tickets_users`
            WHERE `tickets_id` IN ({$in})

            UNION

            SELECT gt.`tickets_id`, gu.`users_id`
            FROM `glpi_groups_tickets` AS gt
            INNER JOIN `glpi_groups_users` AS gu ON gu.`groups_id` = gt.`groups_id`
            WHERE gt.`tickets_id` IN ({$in})
        SQL;

        $actors = [];

        try {
            $result = $DB->doQuery($query);

            while ($result instanceof mysqli_result && ($row = $result->fetch_assoc())) {
                $tickets_id = (int) $row['tickets_id'];
                $users_id   = (int) $row['users_id'];

                if ($users_id > 0) {
                    $actors[$tickets_id][$users_id] = $users_id;
                }
            }
        } catch (Throwable $e) {
            return [];
        }

        return array_map('array_values', $actors);
    }

    /**
     * Every browser registered by any of these users.
     *
     * @param int[] $users_ids
     * @return array<int, array{users_id:int, endpoint:string}>
     */
    public static function endpointsFor(array $users_ids): array
    {
        /** @var DBmysql $DB */
        global $DB;

        $users_ids = array_values(array_unique(array_map('intval', $users_ids)));
        if ($users_ids === [] || !self::isAvailable()) {
            return [];
        }

        $in    = implode(',', $users_ids);
        $table = self::TABLE;

        $rows = [];

        try {
            $result = $DB->doQuery(
                "SELECT `users_id`, `endpoint` FROM `{$table}` WHERE `users_id` IN ({$in})"
            );

            while ($result instanceof mysqli_result && ($row = $result->fetch_assoc())) {
                $rows[] = [
                    'users_id' => (int) $row['users_id'],
                    'endpoint' => (string) $row['endpoint'],
                ];
            }
        } catch (Throwable $e) {
            return [];
        }

        return $rows;
    }

    /**
     * How many browsers are registered, for the installer's --check.
     */
    public static function count(): int
    {
        /** @var DBmysql $DB */
        global $DB;

        if (!self::isAvailable()) {
            return 0;
        }

        try {
            $result = $DB->doQuery('SELECT COUNT(*) AS total FROM `' . self::TABLE . '`');
            $row    = $result instanceof mysqli_result ? $result->fetch_assoc() : null;

            return (int) ($row['total'] ?? 0);
        } catch (Throwable $e) {
            return 0;
        }
    }
}
