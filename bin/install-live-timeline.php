<?php

/**
 * Installer for the live timeline (new messages without reloading the page).
 *
 * Version independent on purpose: it locates the code to move by pattern,
 * never by line number, so it adapts to whichever GLPI 11.x is installed.
 *
 * What it changes:
 *   - extracts the timeline entries loop from
 *     templates/components/itilobject/timeline/timeline.html.twig
 *     into timeline_entries.html.twig, replacing it with an include
 *   - appends one include line to
 *     templates/components/itilobject/layout.html.twig
 *
 * Everything else it needs (ajax/livetimeline.php and
 * templates/components/itilobject/live_timeline.html.twig) is a new file and
 * overwrites nothing.
 *
 * Usage:
 *     php bin/install-live-timeline.php
 *     php bin/install-live-timeline.php --uninstall
 *     php bin/install-live-timeline.php --check
 */

if (PHP_SAPI !== 'cli') {
    exit("This script must be run from the command line.\n");
}

$root       = dirname(__DIR__);
$tpl_dir    = $root . '/templates/components/itilobject';
$timeline   = $tpl_dir . '/timeline/timeline.html.twig';
$entries    = $tpl_dir . '/timeline/timeline_entries.html.twig';
$layout     = $tpl_dir . '/layout.html.twig';
$script_tpl = $tpl_dir . '/live_timeline.html.twig';
$endpoint   = $root . '/ajax/livetimeline.php';
$backup_dir = $root . '/files/_live_timeline_backup';

$INCLUDE_SCRIPT  = "{{ include('components/itilobject/live_timeline.html.twig') }}";
$INCLUDE_ENTRIES = "{{ include('components/itilobject/timeline/timeline_entries.html.twig') }}";

$mode = 'install';
foreach ($argv as $arg) {
    if ($arg === '--uninstall') {
        $mode = 'uninstall';
    } elseif ($arg === '--check') {
        $mode = 'check';
    }
}

/** Report a fatal problem and stop without having touched anything. */
function fail(string $message): void
{
    fwrite(STDERR, "ERROR: {$message}\n");
    exit(1);
}

/** Keep whatever line ending the file already uses. */
function eol(string $content): string
{
    return str_contains($content, "\r\n") ? "\r\n" : "\n";
}

// ---------------------------------------------------------------------------
// Sanity checks
// ---------------------------------------------------------------------------

foreach ([$timeline, $layout] as $file) {
    if (!is_file($file)) {
        fail("not found: {$file}\nIs this script inside a GLPI root directory?");
    }
    if (!is_writable($file)) {
        fail("not writable: {$file}");
    }
}

$layout_content   = file_get_contents($layout);
$timeline_content = file_get_contents($timeline);
$installed        = str_contains($layout_content, $INCLUDE_SCRIPT)
                 && str_contains($timeline_content, $INCLUDE_ENTRIES);

if ($mode === 'check') {
    echo "GLPI root : {$root}\n";
    echo "Status    : " . ($installed ? "INSTALLED" : "not installed") . "\n";
    echo "Endpoint  : " . (is_file($endpoint) ? "present" : "MISSING (ajax/livetimeline.php)") . "\n";
    echo "Script    : " . (is_file($script_tpl) ? "present" : "MISSING (live_timeline.html.twig)") . "\n";
    echo "Partial   : " . (is_file($entries) ? "present" : "not generated yet") . "\n";
    echo "Backups   : " . (is_dir($backup_dir) ? $backup_dir : "none") . "\n";
    exit(0);
}

// ---------------------------------------------------------------------------
// Uninstall
// ---------------------------------------------------------------------------

if ($mode === 'uninstall') {
    if (!is_dir($backup_dir)) {
        fail("no backup directory found at {$backup_dir}; refusing to guess.");
    }

    $restored = 0;
    foreach (['timeline.html.twig' => $timeline, 'layout.html.twig' => $layout] as $name => $target) {
        $saved = $backup_dir . '/' . $name;
        if (!is_file($saved)) {
            echo "  no backup for {$name}, left untouched\n";
            continue;
        }
        copy($saved, $target);
        echo "  restored {$name}\n";
        $restored++;
    }

    if (is_file($entries)) {
        unlink($entries);
        echo "  removed timeline_entries.html.twig\n";
    }

    echo "\nRestored {$restored} file(s).\n";
    echo "ajax/livetimeline.php and live_timeline.html.twig were left in place: they are\n";
    echo "inert once the include is gone, and harmless to keep.\n";
    echo "\nNow clear the cache:  php bin/console cache:clear\n";
    exit(0);
}

// ---------------------------------------------------------------------------
// Install
// ---------------------------------------------------------------------------

if ($installed) {
    exit("Already installed. Nothing to do.\n");
}

// A previous attempt that reloads the whole page would fight with this one:
// both poll, and the reload would wipe whatever the user is typing.
if (preg_match('/window\.location\.reload|location\.reload\(/', $layout_content)) {
    echo "\n";
    echo "WARNING: layout.html.twig already contains a page-reloading script.\n";
    echo "         Two live mechanisms would fight each other, and the reload\n";
    echo "         would discard replies being typed.\n";
    echo "         Remove that block before relying on this one.\n";
    echo "\n";
    echo "Continue anyway? [y/N] ";
    $answer = trim((string) fgets(STDIN));
    if (strtolower($answer) !== 'y') {
        exit("Aborted; nothing was changed.\n");
    }
}

if (!is_file($endpoint)) {
    fail("missing ajax/livetimeline.php — copy it next to this script's GLPI root first.");
}
if (!is_file($script_tpl)) {
    fail("missing templates/components/itilobject/live_timeline.html.twig — copy it first.");
}

// --- Locate the entries loop, by pattern -----------------------------------

if (!preg_match('/\{%-?\s*for\s+entry\s+in\s+timeline\s*-?%\}/', $timeline_content, $m, PREG_OFFSET_CAPTURE)) {
    fail("could not find `{% for entry in timeline %}` in timeline.html.twig.\nThis GLPI version is not supported by this installer.");
}
$for_offset = $m[0][1];

// Walk forward, counting nesting, to find the matching {% endfor %}.
preg_match_all('/\{%-?\s*(for|endfor)\b/', $timeline_content, $tokens, PREG_OFFSET_CAPTURE);
$depth     = 0;
$end_after = null;
foreach ($tokens[1] as $i => $token) {
    $offset = $tokens[0][$i][1];
    if ($offset < $for_offset) {
        continue;
    }
    if ($token[0] === 'for') {
        $depth++;
    } else {
        $depth--;
        if ($depth === 0) {
            // End of the whole {% endfor %} tag.
            $close = strpos($timeline_content, '%}', $offset);
            if ($close === false) {
                fail("malformed `{% endfor %}` tag in timeline.html.twig.");
            }
            $end_after = $close + 2;
            break;
        }
    }
}
if ($end_after === null) {
    fail("could not find the `{% endfor %}` closing the entries loop.");
}

// The loop relies on `user_cache`, initialised just above it: the extracted
// block must start there or the merge inside the loop would fail.
if (!preg_match_all('/^[ \t]*\{%-?\s*set\s+user_cache\s*=/m', $timeline_content, $uc, PREG_OFFSET_CAPTURE)) {
    fail("could not find `{% set user_cache = {} %}` before the loop.\nThis GLPI version is not supported by this installer.");
}
$start = null;
foreach ($uc[0] as $match) {
    if ($match[1] < $for_offset) {
        $start = $match[1];
    }
}
if ($start === null) {
    fail("`user_cache` is not initialised before the loop; refusing to extract.");
}

// Take `status_closed` along when it sits just above, to keep the block whole.
if (preg_match_all('/^[ \t]*\{%-?\s*set\s+status_closed\s*=/m', $timeline_content, $sc, PREG_OFFSET_CAPTURE)) {
    foreach ($sc[0] as $match) {
        if ($match[1] < $start) {
            $start = $match[1];
        }
    }
}

$block = substr($timeline_content, $start, $end_after - $start);

// --- Back up before writing anything ---------------------------------------

if (!is_dir($backup_dir) && !mkdir($backup_dir, 0o755, true) && !is_dir($backup_dir)) {
    fail("could not create backup directory {$backup_dir}");
}
copy($timeline, $backup_dir . '/timeline.html.twig');
copy($layout, $backup_dir . '/layout.html.twig');
echo "Backed up originals to files/_live_timeline_backup/\n";

// --- Write the extracted partial -------------------------------------------

$nl     = eol($timeline_content);
$header = "{#" . $nl
        . " # Timeline entries, extracted verbatim from timeline.html.twig so that the" . $nl
        . " # same markup can be rendered on its own when new messages are fetched." . $nl
        . " #" . $nl
        . " # Generated by bin/install-live-timeline.php — do not edit by hand." . $nl
        . " #}" . $nl . $nl;

file_put_contents($entries, $header . $block . $nl);
echo "Wrote timeline_entries.html.twig (" . strlen($block) . " bytes extracted)\n";

// --- Patch timeline.html.twig ----------------------------------------------

$indent  = '';
$line_up = strrpos(substr($timeline_content, 0, $start), $nl);
if ($line_up !== false) {
    preg_match('/^[ \t]*/', substr($timeline_content, $line_up + strlen($nl)), $ind);
    $indent = $ind[0] ?? '';
}

$patched = substr($timeline_content, 0, $start)
         . $indent . $INCLUDE_ENTRIES
         . substr($timeline_content, $end_after);

file_put_contents($timeline, $patched);
echo "Patched timeline.html.twig (loop replaced by an include)\n";

// --- Patch layout.html.twig ------------------------------------------------

$layout_nl = eol($layout_content);
file_put_contents(
    $layout,
    rtrim($layout_content, "\r\n") . $layout_nl . $layout_nl . $INCLUDE_SCRIPT . $layout_nl
);
echo "Patched layout.html.twig (script included)\n";

echo "\nDone.\n";
echo "\nNext steps:\n";
echo "  1. php bin/console cache:clear\n";
echo "  2. Open the same ticket as two different users, in two browsers.\n";
echo "  3. One replies: the message must appear for the other within 10s, no F5.\n";
echo "\nTo revert:  php bin/install-live-timeline.php --uninstall\n";
