<?php
declare(strict_types=1);

namespace src\Controllers;

use JetBrains\PhpStorm\NoReturn;
use src\Core\BaseController;

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
        echo $this->abort();
        exit;
    }

    #[NoReturn]
    public function show403(): void
    {
        http_response_code(403);
        echo $this->denied();
        exit;
    }
}
