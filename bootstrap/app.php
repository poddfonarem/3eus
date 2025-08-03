<?php

declare(strict_types=1);

use src\Core\SecurityHeaders;

if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(dirname(__DIR__)));
}

require BASE_PATH . '/vendor/autoload.php';

SecurityHeaders::apply();

require BASE_PATH . '/bootstrap/env.php';

require BASE_PATH . '/config/session.php';