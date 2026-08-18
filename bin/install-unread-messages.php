<?php

/**
 * Installer for the "unread messages" counter.
 *
 * Creates the per-user read-state table and records the date from which
 * messages start being counted. Safe to run twice: it does nothing if the
 * table is already there.
 *
 * Usage:
 *     php bin/install-unread-messages.php
 *     php bin/install-unread-messages.php --uninstall
 */

use Glpi\Timeline\UnreadMessages;

if (PHP_SAPI !== 'cli') {
    exit("This script must be run from the command line.\n");
}

$root = dirname(__DIR__);
require_once $root . '/vendor/autoload.php';
include_once $root . '/config/config_db.php';

if (!class_exists('DB')) {
    exit("config/config_db.php not found or incomplete: is GLPI installed?\n");
}

/** @var DBmysql $DB */
$DB = new DB();
if (!$DB->connected) {
    exit("Could not connect to the database using config/config_db.php.\n");
}

$table = UnreadMessages::TABLE;
$uninstall = in_array('--uninstall', $argv, true);

if ($uninstall) {
    if (!$DB->tableExists($table)) {
        exit("Nothing to do: table `{$table}` does not exist.\n");
    }
    $DB->doQuery("DROP TABLE `{$table}`");
    echo "Dropped table `{$table}`.\n";
    $context = UnreadMessages::CONFIG_CONTEXT;
    $DB->doQuery("DELETE FROM `glpi_configs` WHERE `context` = " . $DB->quoteValue($context));
    echo "Read states are gone; the counter will simply report nothing unread.\n";
    exit(0);
}

if ($DB->tableExists($table)) {
    exit("Nothing to do: table `{$table}` already exists.\n");
}

// Reuse the charset/collation of an existing GLPI table so the new one cannot
// drift from the rest of the schema.
$charset   = DBConnection::getDefaultCharset();
$collation = DBConnection::getDefaultCollation();
$key_sign  = DBConnection::getDefaultPrimaryKeySignOption();

$DB->doQuery(
    <<<SQL
    CREATE TABLE `{$table}` (
        `id` int {$key_sign} NOT NULL AUTO_INCREMENT,
        `itemtype` varchar(255) NOT NULL,
        `items_id` int {$key_sign} NOT NULL DEFAULT '0',
        `users_id` int {$key_sign} NOT NULL DEFAULT '0',
        `last_read_date` timestamp NULL DEFAULT NULL,
        PRIMARY KEY (`id`),
        UNIQUE KEY `unicity` (`itemtype`,`items_id`,`users_id`),
        KEY `users_id` (`users_id`),
        KEY `last_read_date` (`last_read_date`)
    ) ENGINE=InnoDB DEFAULT CHARSET = {$charset} COLLATE = {$collation} ROW_FORMAT=DYNAMIC;
    SQL
);

echo "Created table `{$table}`.\n";

// Everything posted before now stays "read", so nobody logs in to a counter
// showing years of history.
$baseline = date('Y-m-d H:i:s');
$context = UnreadMessages::CONFIG_CONTEXT;
$DB->updateOrInsert(
    'glpi_configs',
    ['value' => $baseline],
    ['context' => $context, 'name' => 'baseline_date']
);

echo "Baseline set to {$baseline}: only messages posted after this date are counted.\n";
echo "Done.\n";
