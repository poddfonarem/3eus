<?php

declare(strict_types = 1);

namespace src\Core;

use RuntimeException;

class View
{
    public static function render(string $view, array $data = [], string $layout = 'layouts/main'): bool|string
    {
        $viewPath = BASE_PATH . '/resources/views/' . $view . '.php';
        if (!file_exists($viewPath)) {
            throw new RuntimeException("View [$view] not found.");
        }

        extract($data, EXTR_SKIP);

        ob_start();
        require $viewPath;
        $content = ob_get_clean();

        $config = require BASE_PATH . '/config/routes.php';

        $noBuilderPages = $config['noBuilderPages'] ?? [];

        $routeKey = self::getRouteKey($view);

        $pagesWithoutLayout = $noBuilderPages['pagesWithoutLayout'] ?? [];
        $pagesWithLayout = $noBuilderPages['pagesWithLayout'] ?? [];

        if (in_array($routeKey, $pagesWithoutLayout, true)) {
            return $content;
        }

        if (in_array($routeKey, $pagesWithLayout, true)) {
            $layout = 'layouts/main.min';
        }

        $layoutPath = BASE_PATH . '/resources/views/' . $layout . '.php';
        if (!file_exists($layoutPath)) {
            return $content;
        }

        ob_start();
        require $layoutPath;
        return ob_get_clean();
    }

    protected static function getRouteKey(string $view): string
    {
        return basename($view);
    }
}