<?php

declare(strict_types=1);

namespace src\Core;

class Request
{
    public static function capture(): self
    {
        return new self();
    }

    public function method(): string
    {
        return strtoupper($_SERVER['REQUEST_METHOD'] ?? 'GET');
    }

    public function path(): string
    {
        $uri = $_SERVER['REQUEST_URI'] ?? '/';
        $uri = parse_url($uri, PHP_URL_PATH);
        return rtrim($uri, '/') ?: '/';
    }

    public function all(): array
    {
        return $_REQUEST;
    }

    public function input(string $key, $default = null)
    {
        return $_REQUEST[$key] ?? $default;
    }
}