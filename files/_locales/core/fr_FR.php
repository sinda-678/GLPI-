<?php

/**
 * French strings for the in-app notification feature (unread messages counter
 * and global new-message / new-ticket notifier).
 *
 * These few labels do not exist in GLPI's own catalogue, so without this file
 * they would show in English on a French instance.
 *
 * Lives in files/_locales/core/ — the overlay GLPI reads after its own
 * catalogue — so a GLPI upgrade cannot wipe it. Loaded by
 * Session::loadLanguage() for users whose language is French.
 *
 * "New ticket" and "New tickets" are deliberately absent: GLPI already
 * translates them ("Nouveau ticket", "Nouveaux tickets").
 */

return [
    'Unread messages' => 'Messages non lus',
    'New message'     => 'Nouveau message',
    'Nothing new'     => 'Rien de nouveau',
];
