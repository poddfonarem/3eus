<?php

use Dotenv\Dotenv;

if (!defined('BASE_PATH')) {
    define('BASE_PATH', realpath(dirname(__DIR__)));
}

$dotenv = Dotenv::createImmutable(BASE_PATH);
$dotenv->load();


