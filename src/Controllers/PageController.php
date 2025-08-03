<?php
declare(strict_types=1);

namespace src\Controllers;

use JetBrains\PhpStorm\NoReturn;
use src\Core\BaseController;
use src\Core\View;

class PageController extends BaseController
{
    public function home(): array
    {
        return [
            'view' => 'pages/home',
            'data' => [
                'h1_content' => 'MVC Starter by poddfonarem',
            ]
        ];
    }

    #[NoReturn]
    public function show404(): void
    {
        http_response_code(404);
        echo View::render('errors/404', ['h1_content' => 'Сторінка не знайдена']);
        exit;
    }

    #[NoReturn]
    public function show403(): void
    {
        http_response_code(403);
        echo View::render('errors/403', ['h1_content' => 'Доступ заборонено']);
        exit;
    }
}
