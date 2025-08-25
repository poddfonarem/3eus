<?php

namespace App\Core;

class Headers
{
    public static function apply(): void {
        header("X-Content-Type-Options: nosniff");
        header("Content-Security-Policy: frame-ancestors 'self'");
        header("Referrer-Policy: no-referrer-when-downgrade");
        header("Permissions-Policy: camera=(), microphone=(), geolocation=()");
        header("Strict-Transport-Security: max-age=63072000; includeSubDomains; preload");
        header("Cross-Origin-Embedder-Policy: require-corp");
        // header("Cross-Origin-Opener-Policy: same-origin"); -- For HTTPS
        header("Cross-Origin-Resource-Policy: same-origin");
        header("Cache-Control: no-cache, no-store, must-revalidate");
        header("Pragma: no-cache");
        header("Expires: 0");
        header_remove("Expires");
        header("X-Frame-Options: DENY");
        header("X-XSS-Protection: 0");
        header("Content-Type: text/html; charset=UTF-8");
    }

}