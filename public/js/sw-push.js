'use strict';

/**
 * =========================================================================
 * GLPI push worker — notifications when the application is not open
 * =========================================================================
 *
 * Companion of templates/layout/parts/live_notifier.html.twig. That one polls
 * and covers every case where a GLPI page is loaded, hidden tab and minimised
 * window included. This one covers the case it cannot: no GLPI page open at
 * all, only the browser running.
 *
 * A push arrives EMPTY. The server sends a doorbell, never a letter — see
 * Glpi\Timeline\WebPush for why. This worker answers it by asking GLPI what
 * the user has waiting, using the user's own cookies, so what finally shows on
 * screen has been through the same rights checks as the page itself.
 *
 * Consequences worth knowing:
 *   - Nothing is notified if the GLPI session has expired. That is correct:
 *     somebody who is logged out should not be told what is in their tickets.
 *   - Scope is deliberately "<root>/js/", which controls no page. A push
 *     worker does not need to control anything: push, notificationclick and
 *     clients.matchAll() all work regardless of scope, and a narrow scope
 *     avoids needing a Service-Worker-Allowed header from the web server.
 *
 * Installed by bin/install-live-push.php — do not edit by hand.
 * =========================================================================
 */

/** Where the labels handed over by the page are kept between worker lifetimes. */
var CACHE = 'glpi-push-v1';
var LABELS_URL = 'glpi-push-labels';

/**
 * Root of the GLPI instance, derived from where this worker was served: the
 * scope is "<root_doc>/js/", so its parent is the application root. Nothing is
 * hardcoded, so an instance in a subdirectory works with no configuration.
 */
function glpiRoot() {
    return new URL('../', self.registration.scope).toString().replace(/\/$/, '');
}

/**
 * Translated strings, put there by the page at registration time.
 *
 * A worker is a static file and cannot call GLPI's translator, so the page
 * hands over what it already had translated. The English defaults are the
 * msgids themselves, which is what an untranslated GLPI shows anyway.
 */
async function labels() {
    var fallback = {
        unread: 'Unread messages',
        activity: 'New activity on your tickets',
        several: '%d unread messages'
    };

    try {
        var cache = await caches.open(CACHE);
        var hit = await cache.match(LABELS_URL);
        if (!hit) {
            return fallback;
        }

        return Object.assign(fallback, await hit.json());
    } catch (e) {
        return fallback;
    }
}

self.addEventListener('install', function() {
    // Take over straight away: the page has just asked for this worker, making
    // it wait for every other tab to close would delay push by a whole session.
    self.skipWaiting();
});

self.addEventListener('activate', function(event) {
    event.waitUntil(self.clients.claim());
});

self.addEventListener('message', function(event) {
    var data = event.data || {};
    if (data.type !== 'labels' || !data.labels) {
        return;
    }

    event.waitUntil((async function() {
        try {
            var cache = await caches.open(CACHE);
            await cache.put(LABELS_URL, new Response(JSON.stringify(data.labels), {
                headers: {'Content-Type': 'application/json'}
            }));
        } catch (e) {
            // Without a cache the worker simply falls back to English.
        }
    })());
});

self.addEventListener('push', function(event) {
    event.waitUntil(announce());
});

async function announce() {
    // Somebody is already looking at GLPI: the in-app toast has it covered and
    // an OS notification on top would be the same news twice. This is the only
    // reason this worker ever stays silent on purpose.
    var windows = await self.clients.matchAll({type: 'window', includeUncontrolled: true});
    var watching = windows.some(function(client) {
        return client.focused === true;
    });

    if (watching) {
        return;
    }

    var root = glpiRoot();
    var text = await labels();
    var summary = null;
    var logged_out = false;

    try {
        var response = await fetch(root + '/ajax/unreadmessages.php?action=summary', {
            credentials: 'same-origin',
            // Same header jQuery sends, so GLPI treats this as the AJAX call
            // it is rather than as a page request.
            headers: {'X-Requested-With': 'XMLHttpRequest'}
        });

        if (response.ok) {
            summary = await response.json();
        } else if (response.status === 401 || response.status === 403) {
            logged_out = true;
        }
    } catch (e) {
        summary = null;
    }

    // The session is gone. Say nothing: what is inside someone's tickets is no
    // business of a browser that is no longer logged in.
    if (logged_out) {
        await forgetSelf();
        return;
    }

    // No answer at all: offline, or the server is unreachable. Say that there
    // is something waiting without saying what.
    if (summary === null) {
        return self.registration.showNotification(text.activity, {
            tag: 'glpi-unread',
            data: {url: root + '/front/ticket.php'}
        });
    }

    var total = summary.total || 0;
    if (total === 0) {
        // Already read elsewhere between the push and this fetch. Showing
        // "0 messages" would be worse than showing nothing.
        return;
    }

    var items = (summary.messages && summary.messages.items) || [];
    if (items.length === 0) {
        items = (summary.tickets && summary.tickets.items) || [];
    }

    var first = items[0] || null;
    var url = root + '/front/ticket.php';
    var body = text.several.replace('%d', total);

    if (first) {
        url = root + '/front/ticket.form.php?id=' + encodeURIComponent(first.items_id);

        // Resume where reading stopped, exactly as the in-app dropdown does.
        if (first.first_unread_anchor) {
            url += '#' + encodeURIComponent(first.first_unread_anchor);
        }

        // Same "#42 — title" shape as the toasts: the number is what lets the
        // reader place a ticket among look-alike titles.
        var label = '#' + first.items_id + (first.name ? ' — ' + first.name : '');
        body = total > 1 ? label + ' · ' + text.several.replace('%d', total) : label;
    }

    return self.registration.showNotification(text.unread, {
        body: body,
        // One entry that updates, rather than a stack of them: three replies
        // are one thing to look at.
        tag: 'glpi-unread',
        renotify: true,
        icon: root + '/pics/logos/logo-G-100-black.png',
        data: {url: url}
    });
}

/**
 * Cancel this browser's own subscription.
 *
 * Called once the session has expired. Without it the sender would go on
 * ringing a browser that can never show anything, for as long as the row
 * lives. Cancelling here makes the push service answer the next send with a
 * 410, which is how the sender drops the row — no authenticated call needed,
 * which matters because there is no session left to make one with.
 *
 * Self-healing: the next GLPI page loaded while logged in subscribes again.
 */
async function forgetSelf() {
    try {
        var subscription = await self.registration.pushManager.getSubscription();

        if (subscription) {
            await subscription.unsubscribe();
        }
    } catch (e) {
        // Nothing to do: at worst the sender keeps trying until the push
        // service expires the endpoint on its own.
    }
}

self.addEventListener('notificationclick', function(event) {
    event.notification.close();

    var url = (event.notification.data && event.notification.data.url) || glpiRoot();

    event.waitUntil((async function() {
        var root = glpiRoot();
        var windows = await self.clients.matchAll({type: 'window', includeUncontrolled: true});

        // Reuse a GLPI tab that is already open rather than piling up a new one
        // on every notification.
        for (var i = 0; i < windows.length; i++) {
            var client = windows[i];

            if (client.url.indexOf(root) === 0 && 'focus' in client) {
                await client.focus();

                if ('navigate' in client) {
                    try {
                        await client.navigate(url);
                    } catch (e) {
                        // Some browsers refuse navigate() on a cross-document
                        // client; the tab is focused, which is the main thing.
                    }
                }

                return;
            }
        }

        await self.clients.openWindow(url);
    })());
});
