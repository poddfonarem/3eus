<?php

/**
 * Конфіг сесії через .env
 */

$lifetime = (int)(env('SESSION_LIFETIME', 3600));
$path     = env('SESSION_PATH', '/');
$domain   = env('SESSION_DOMAIN', '');
$secure   = filter_var(env('SESSION_SECURE', ($_SERVER['HTTPS'] ?? false)), FILTER_VALIDATE_BOOL);
$httponly = filter_var(env('SESSION_HTTPONLY', true), FILTER_VALIDATE_BOOL);
$samesite = env('SESSION_SAMESITE', 'Lax');

ini_set('session.cookie_secure',    $secure ? '1' : '0');
ini_set('session.cookie_httponly',  $httponly ? '1' : '0');
ini_set('session.use_strict_mode',  '1');
ini_set('session.use_only_cookies', '1');
ini_set('session.gc_maxlifetime',   (string)$lifetime);

session_set_cookie_params([
    'lifetime' => $lifetime,
    'path'     => $path,
    'domain'   => $domain,
    'secure'   => $secure,
    'httponly' => $httponly,
    'samesite' => $samesite,
]);

session_start();