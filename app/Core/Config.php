<?php

namespace App\Core;

class Config
{
    private static array $data = [];

    public static function load(string $dir): void
    {
        foreach (glob($dir . '/*.php') as $file) {
            $name = basename($file, '.php');
            self::$data[$name] = require $file;
        }
    }

    public static function get(string $key, $default = null)
    {
        $keys = explode('.', $key);
        $value = self::$data;

        foreach ($keys as $k) {
            if (is_array($value) && array_key_exists($k, $value)) {
                $value = $value[$k];
            } else {
                return $default;
            }
        }

        return $value;
    }

}