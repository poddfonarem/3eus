<?php

return [
    'host'       => env('MAIL_HOST', 'smtp.gmail.com'),
    'username'   => env('MAIL_USERNAME', 'your_email@gmail.com'),
    'password'   => env('MAIL_USERNAME', 'your_app_password'),
    'port'       => env('MAIL_PORT', 587),
    'encryption' => env('MAIL_ENCRYPTION',  'tls'),
    'from_email' => env('MAIL_FROM_EMAIL', 'your_email@gmail.com'),
    'from_name'  => env('MAIL_FROM_NAME', '3eus-starter'),
];