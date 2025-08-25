<?php

$config = config('session');

ini_set('session.cookie_secure',    $config['secure'] ? '1' : '0');
ini_set('session.cookie_httponly',  $config['httponly'] ? '1' : '0');
ini_set('session.use_strict_mode',  '1');
ini_set('session.use_only_cookies', '1');
ini_set('session.gc_maxlifetime',   (string) $config['lifetime']);

session_set_cookie_params([
    'lifetime' => $config['lifetime'],
    'path'     => $config['path'],
    'domain'   => $config['domain'],
    'secure'   => $config['secure'],
    'httponly' => $config['httponly'],
    'samesite' => $config['samesite'],
]);

session_start();