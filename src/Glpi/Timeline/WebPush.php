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

use Config;
use RuntimeException;
use Throwable;

/**
 * Minimal Web Push sender: VAPID only, no payload.
 *
 * Why no payload
 * --------------
 * RFC 8291 payload encryption (ECDH + HKDF + AES-128-GCM) is the hard half of
 * Web Push, and the half that needs a library. It is skipped entirely: this
 * sends a BARE push, which RFC 8030 explicitly allows. The service worker
 * reacts by fetching the notification feed itself, with the user's own cookies.
 *
 * That is not a shortcut, it is the safer design:
 *
 *   - Nothing leaves the server. A push carries no ticket number, no title and
 *     no author, because it carries no body at all. It is a doorbell, not a
 *     letter.
 *   - What the user finally reads comes from ajax/livetimeline.php, answered
 *     inside their own session, so entities, profiles and private followups
 *     are enforced by the code that already enforces them everywhere else. A
 *     sender running from cron has no session and would have had to re-derive
 *     all of that — which is exactly how notification systems leak.
 *   - No dependency. GLPI ships as a release tarball with a prebuilt vendor/
 *     and no composer.json at all, so pulling a library in would have meant
 *     either rebuilding that vendor/ or bolting a second autoloader beside it.
 *
 * All this needs is ext-openssl for the ES256 signature and ext-curl to post.
 */
final class WebPush
{
    /**
     * Configuration context holding the VAPID keypair.
     */
    public const CONFIG_CONTEXT = 'live_push';

    /**
     * How long a push may wait for a device that is offline. Short on purpose:
     * news about a ticket reply is stale within the hour, and a backlog
     * delivered all at once is worse than nothing.
     */
    public const TTL = 1800;

    /**
     * Lifetime of the VAPID token. Well under the 24h the spec allows, so a
     * clock slightly out of step cannot make every push fail at once.
     */
    private const TOKEN_TTL = 43200;

    /**
     * Whether this PHP can send a push at all.
     */
    public static function isSupported(): bool
    {
        return function_exists('openssl_sign')
            && function_exists('openssl_pkey_new')
            && function_exists('curl_init');
    }

    /**
     * The public key browsers need in order to subscribe, base64url encoded.
     *
     * Empty until the installer has generated a keypair, which is what makes
     * the whole feature degrade to "no push" rather than to an error.
     */
    public static function getPublicKey(): string
    {
        $values = Config::getConfigurationValues(self::CONFIG_CONTEXT, ['vapid_public']);

        return (string) ($values['vapid_public'] ?? '');
    }

    private static function getPrivateKey(): string
    {
        $values = Config::getConfigurationValues(self::CONFIG_CONTEXT, ['vapid_private']);

        return (string) ($values['vapid_private'] ?? '');
    }

    /**
     * Generate a P-256 keypair for VAPID.
     *
     * Called once, by the installer. Regenerating it invalidates every
     * subscription in the table, because a browser ties its subscription to
     * the key it was created with.
     *
     * @return array{public:string, private:string} public is base64url raw
     *         (65 bytes, uncompressed point), private is PEM
     */
    public static function generateKeys(): array
    {
        $key = openssl_pkey_new([
            'curve_name'       => 'prime256v1',
            'private_key_type' => OPENSSL_KEYTYPE_EC,
        ]);

        if ($key === false) {
            // Generating a key is the one operation here that reads OpenSSL's
            // config file; signing later does not. A PHP that cannot find
            // openssl.cnf therefore fails only at install time, with an error
            // ("No such process") that says nothing about the real cause.
            throw new RuntimeException(
                'could not generate an EC keypair: ' . openssl_error_string()
                . "\nIf this mentions a missing file or \"No such process\", OpenSSL cannot find"
                . " its configuration. Point the OPENSSL_CONF environment variable at an"
                . " openssl.cnf and run this again."
            );
        }

        $pem = '';
        if (!openssl_pkey_export($key, $pem)) {
            throw new RuntimeException('could not export the private key: ' . openssl_error_string());
        }

        $details = openssl_pkey_get_details($key);
        if (!isset($details['ec']['x'], $details['ec']['y'])) {
            throw new RuntimeException('the generated key carries no EC coordinates');
        }

        // Uncompressed point: 0x04 || X || Y, each padded to the curve size.
        // This is the format the browser's applicationServerKey expects.
        $public = "\x04"
            . str_pad($details['ec']['x'], 32, "\0", STR_PAD_LEFT)
            . str_pad($details['ec']['y'], 32, "\0", STR_PAD_LEFT);

        return [
            'public'  => self::b64url($public),
            'private' => $pem,
        ];
    }

    /**
     * Ring one subscription's doorbell.
     *
     * @param string $endpoint the push service URL stored at subscribe time
     * @return int the HTTP status, or 0 when the request never left. 404 and
     *         410 mean the subscription is dead and should be deleted.
     */
    public static function send(string $endpoint): int
    {
        if (!self::isSupported() || $endpoint === '') {
            return 0;
        }

        $public  = self::getPublicKey();
        $private = self::getPrivateKey();
        if ($public === '' || $private === '') {
            return 0;
        }

        try {
            $token = self::vapidToken($endpoint, $private);
        } catch (Throwable $e) {
            return 0;
        }

        if ($token === '') {
            return 0;
        }

        $curl = curl_init($endpoint);
        curl_setopt_array($curl, [
            CURLOPT_POST           => true,
            // A bare push: the doorbell has no letter in it.
            CURLOPT_POSTFIELDS     => '',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 10,
            CURLOPT_HTTPHEADER     => [
                'Authorization: vapid t=' . $token . ', k=' . $public,
                'TTL: ' . self::TTL,
                'Content-Length: 0',
            ],
        ]);

        curl_exec($curl);
        $status = (int) curl_getinfo($curl, CURLINFO_RESPONSE_CODE);
        curl_close($curl);

        return $status;
    }

    /**
     * The signed JWT proving to the push service who is asking.
     */
    private static function vapidToken(string $endpoint, string $private_pem): string
    {
        $parts = parse_url($endpoint);
        if (!isset($parts['scheme'], $parts['host'])) {
            return '';
        }

        // The audience is the push service's origin, never the full URL: the
        // endpoint path is a per-device secret and has no business in a token.
        $audience = $parts['scheme'] . '://' . $parts['host'];

        $header = ['typ' => 'JWT', 'alg' => 'ES256'];
        $claims = [
            'aud' => $audience,
            'exp' => time() + self::TOKEN_TTL,
            'sub' => self::subject(),
        ];

        $input = self::b64url((string) json_encode($header))
               . '.'
               . self::b64url((string) json_encode($claims));

        $key = openssl_pkey_get_private($private_pem);
        if ($key === false) {
            return '';
        }

        $der = '';
        if (!openssl_sign($input, $der, $key, OPENSSL_ALGO_SHA256)) {
            return '';
        }

        return $input . '.' . self::b64url(self::derToRaw($der));
    }

    /**
     * Who to contact about a misbehaving sender. Push services want a mailto:
     * or an https: URL and reject a token without one.
     */
    private static function subject(): string
    {
        /** @var array $CFG_GLPI */
        global $CFG_GLPI;

        $url = (string) ($CFG_GLPI['url_base'] ?? '');

        return str_starts_with($url, 'https://') ? $url : 'mailto:admin@localhost';
    }

    /**
     * ECDSA signatures come out of OpenSSL as DER, but JWS wants the bare
     * r || s pair, each padded to the curve size. Without this conversion the
     * push service rejects every token with a 401 that explains nothing.
     */
    private static function derToRaw(string $der): string
    {
        $offset = 0;

        $read = static function (int $length) use ($der, &$offset): string {
            $chunk   = substr($der, $offset, $length);
            $offset += $length;

            return $chunk;
        };

        if (bin2hex($read(1)) !== '30') {
            throw new RuntimeException('signature is not a DER sequence');
        }

        // Length byte: either the length itself, or how many bytes hold it.
        $length = ord($read(1));
        if ($length & 0x80) {
            $read($length & 0x7f);
        }

        $pair = '';
        for ($i = 0; $i < 2; $i++) {
            if (bin2hex($read(1)) !== '02') {
                throw new RuntimeException('signature component is not a DER integer');
            }

            $component = $read(ord($read(1)));

            // DER integers are signed, so a component whose top bit is set
            // carries a leading zero byte. JWS wants neither that sign byte
            // nor any padding of its own: exactly 32 bytes, left-padded.
            $pair .= str_pad(ltrim($component, "\0"), 32, "\0", STR_PAD_LEFT);
        }

        return $pair;
    }

    public static function b64url(string $raw): string
    {
        return rtrim(strtr(base64_encode($raw), '+/', '-_'), '=');
    }
}
