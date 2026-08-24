<?php

/**
 * ---------------------------------------------------------------------
 *
 * GLPI - Gestionnaire Libre de Parc Informatique
 *
 * http://glpi-project.org
 *
 * @copyright 2015-2025 Teclib' and contributors.
 * @copyright 2003-2014 by the INDEPNET Development Team.
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

use Glpi\Exception\Http\AccessDeniedHttpException;
use Glpi\Exception\Http\BadRequestHttpException;
use Glpi\Timeline\NewTickets;
use Glpi\Timeline\UnreadMessages;

use function Safe\json_encode;

header("Content-Type: application/json; charset=UTF-8");
Html::header_nocache();

if (Session::getLoginUserID() === false) {
    throw new AccessDeniedHttpException();
}

$action = $_REQUEST['action'] ?? null;

if ($action === 'summary') {
    // What the header counter has to show, split by kind so the dropdown can
    // tell "somebody replied" from "a ticket arrived". `total` is what the
    // badge displays, and is the sum of both.
    $messages = UnreadMessages::getSummary();
    $tickets  = NewTickets::getSummary();

    echo json_encode([
        'total'    => $messages['total'] + $tickets['total'],
        'messages' => $messages,
        'tickets'  => $tickets,
    ]);
    return;
}

if ($action === 'mark_read') {
    if (!isset($_REQUEST['itemtype'], $_REQUEST['items_id'])) {
        throw new BadRequestHttpException();
    }

    $item = getItemForItemtype($_REQUEST['itemtype']);
    if (!$item instanceof CommonITILObject) {
        throw new BadRequestHttpException();
    }

    // Never trust the client: only an item the user may actually read can be
    // flagged as read.
    if (!$item->getFromDB((int) $_REQUEST['items_id']) || !$item->canViewItem()) {
        throw new AccessDeniedHttpException();
    }

    UnreadMessages::markAsRead($item);
    echo json_encode(['success' => true]);
    return;
}

throw new BadRequestHttpException();
