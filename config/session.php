<?php

return [
    'lifetime' => (int) env('SESSION_LIFETIME', 3600),
    'path'     => env('SESSION_PATH', '/'),
    'domain'   => env('SESSION_DOMAIN', ''),
    'secure'   => filter_var(env('SESSION_SECURE', ($_SERVER['HTTPS'] ?? false)), FILTER_VALIDATE_BOOL),
    'httponly' => filter_var(env('SESSION_HTTPONLY', true), FILTER_VALIDATE_BOOL),
    'samesite' => env('SESSION_SAMESITE', 'Lax'),
];
