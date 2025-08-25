<?php

return [
    'hostname' => env('DB_HOST', '127.0.0.1'),
    'port' => env('DB_PORT', '3306'),
    'username' => env('DB_USERNAME', 'root'),
    'password' => env('DB_PASSWORD', ''),
    'database' => env('DB_DATABASE', 'test'),
    'enable' => env('DB_ENABLE', 'off'),
];