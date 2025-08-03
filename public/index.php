<?php

declare(strict_types=1);

require_once dirname(__DIR__) . '/bootstrap/app.php';

use src\Core\Router;

try {
    $router = new Router();
    $router->handleRequest();

} catch (Throwable $e) {
    logException($e);
    http_response_code(500);

    if (env('APP_DEBUG', false) === 'true') {
        echo '<pre>' . $e . '</pre>';
    } else {
        require BASE_PATH . '/resources/views/errors/500.php';
    }
}

exit;