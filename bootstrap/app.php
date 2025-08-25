<?php

declare(strict_types=1);

if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(dirname(__DIR__)));
}

require BASE_PATH . '/vendor/autoload.php';

use App\Core\Config;
use App\Core\Headers;
use Dotenv\Dotenv;

Headers::apply();

if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(dirname(__DIR__)));
}

$dotenv = Dotenv::createImmutable(BASE_PATH);
$dotenv->load();

Config::load(BASE_PATH . '/config/');

require BASE_PATH . '/bootstrap/session.php';