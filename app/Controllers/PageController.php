<?php

declare(strict_types=1);

namespace App\Controllers;

use JetBrains\PhpStorm\NoReturn;
use App\Core\BaseController;

class PageController extends BaseController
{
    public function home(): array
    {
        return [
            'view' => 'pages/home',
            'data' => [
                'h1_content' => config('app.name') . ' Starter by poddfonarem',
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
