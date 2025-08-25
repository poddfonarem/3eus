<?php

declare(strict_types=1);

namespace App\Core;

use RuntimeException;

class View
{
    public static function render(string $view, array $data = [], string $layout = 'layouts/main'): bool|string
    {
        $zeusTemplatePath = BASE_PATH . '/resources/views/' . $view . '.zeus.php';
        $phpTemplatePath = BASE_PATH . '/resources/views/' . $view . '.php';

        $isZeus = file_exists($zeusTemplatePath);

        if (!$isZeus && !file_exists($phpTemplatePath)) {
            throw new RuntimeException("View [$view] not found.");
        }

        extract($data, EXTR_SKIP);

        ob_start();
        if ($isZeus) {
            $compiled = self::compileZeus($view);
            require $compiled;
        } else {
            require $phpTemplatePath;
        }
        $content = ob_get_clean();

        $config = require BASE_PATH . '/routes/web.php';
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

        protected static function compileZeus(string $view): string
        {
            $viewPath = BASE_PATH . '/resources/views/' . $view . '.zeus.php';
            $compiledDir = BASE_PATH . '/storage/compiled/';
            $compiledPath = $compiledDir . str_replace(['/', '\\'], '_', $view) . '.php';

            if (!file_exists($compiledDir)) {
                mkdir($compiledDir, 0755, true);
            }

            if (!file_exists($compiledPath) || filemtime($compiledPath) < filemtime($viewPath)) {
                $content = file_get_contents($viewPath);

                $sections = [];
                if (preg_match_all('/@section\s*\(\s*[\'"](.+?)["\']\s*\)(.*?)@endsection/s', $content, $matches, PREG_SET_ORDER)) {
                    foreach ($matches as $match) {
                        $sections[$match[1]] = $match[2];
                    }
                    $content = preg_replace('/@section\s*\(\s*[\'"](.+?)["\']\s*\)(.*?)@endsection/s', '', $content);
                }

                if (preg_match('/@extends\s*\(\s*[\'"](.+?)["\']\s*\)/', $content, $extendMatch)) {
                    $parentView = $extendMatch[1];
                    $parentPath = BASE_PATH . '/resources/views/' . $parentView . '.zeus.php';
                    if (file_exists($parentPath)) {
                        $parentContent = file_get_contents($parentPath);
                        foreach ($sections as $name => $sectionContent) {
                            $parentContent = preg_replace(
                                '/@yield\s*\(\s*[\'"]' . preg_quote($name, '/') . '["\']\s*\)/',
                                $sectionContent,
                                $parentContent
                            );
                        }
                        $content = $parentContent;
                    }
                }

                $content = preg_replace('/{{\s*(.+?)\s*}}/', '<?=htmlspecialchars($1) ?>', $content);
                $content = preg_replace('/{!!\s*(.+?)\s*!!}/', '<?= $1 ?>', $content);

                preg_replace_callback('/@if\s*\(([^)]+)\)/', function($m) {
                    return '<?php if (' . trim($m[1]) . '): ?>';
                }, $content);

                $content = preg_replace_callback('/@elseif\s*\((.*?)\)/', function($matches) {
                    return '<?php elseif (' . $matches[1] . '): ?>';
                }, $content);

                $content = str_replace('@else', '<?php else: ?>', $content);
                $content = str_replace('@endif', '<?php endif; ?>', $content);


                $content = preg_replace('/@isset\s*\((.+?)\)/', '<?php if (isset($1)): ?>', $content);
                $content = preg_replace('/@endisset/', '<?php endif; ?>', $content);

                $content = preg_replace('/@empty\s*\((.+?)\)/', '<?php if (empty($1)): ?>', $content);
                $content = preg_replace('/@endempty/', '<?php endif; ?>', $content);

                $content = preg_replace('/@foreach\s*\((.+?)\)/', '<?php foreach ($1): ?>', $content);
                $content = preg_replace('/@endforeach/', '<?php endforeach; ?>', $content);

                $content = preg_replace('/@for\s*\((.+?)\)/', '<?php for ($1): ?>', $content);
                $content = preg_replace('/@endfor/', '<?php endfor; ?>', $content);

                $content = preg_replace('/@while\s*\((.+?)\)/', '<?php while ($1): ?>', $content);
                $content = preg_replace('/@endwhile/', '<?php endwhile; ?>', $content);

                $content = preg_replace('/@auth/', '<?php if (isset($_SESSION["logged"])): ?>', $content);
                $content = preg_replace('/@endauth/', '<?php endif; ?>', $content);

                $content = preg_replace_callback(
                    '/@include\s*\(\s*[\'"](.+?)["\']\s*\)/',
                    function ($matches) {
                        $filename = $matches[1];
                        return '<?php include BASE_PATH . "/resources/views/partials/' . $filename . '.zeus.php"; ?>';
                    },
                    $content
                );

                file_put_contents($compiledPath, $content);
            }

            return $compiledPath;
        }

}