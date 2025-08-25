<?php

use App\Core\Config;

// --- ENV ---
if (!function_exists('env')) {
    function env(string $key, $default = null)
    {
        return $_ENV[$key] ?? $default;
    }
}

// --- CONFIG ---
if (!function_exists('config')) {
    function config(string $key, $default = null) {
        return Config::get($key, $default);
    }
}

// --- LOGGING ---
function logException(Throwable $e): void
{
    $logPath = BASE_PATH . '/storage/logs';
    if (!is_dir($logPath)) {
        @mkdir($logPath, 0777, true);
    }

    file_put_contents(
        $logPath . '/error.log',
        '[' . date('Y-m-d H:i:s') . '] ' . $e . PHP_EOL,
        FILE_APPEND
    );
}
