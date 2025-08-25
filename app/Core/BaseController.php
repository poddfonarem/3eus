<?php
declare(strict_types=1);

namespace App\Core;

use PDO;

abstract class BaseController
{
    protected ?PDO $conn = null;

    /**
     * Constructor: start session and connect to database
     */
    public function __construct()
    {
        session_start();
        $db = new DB();
        $this->conn = $db->getConnection();
    }

    protected function view(string $view, array $data = [], string $layout = 'layouts/main'): bool|string
    {
        return View::render($view, $data, $layout);
    }

    protected function abort(int $code = 404, string $message = ''): bool|string
    {
        http_response_code($code);
        if ($code === 404) {
            return View::render('errors/404',['h1_content' => 'Сторінка не знайдена']);
        }

        if ($message && (!isset($_ENV['APP_DEBUG']) || $_ENV['APP_DEBUG'] !== 'true')) {
            $message = '';
        }

        return $message ?: 'Error';
    }

    protected function denied(int $code = 403, string $message = ''): bool|string
    {
        http_response_code($code);
        if ($code === 403) {
            return View::render('errors/403', ['h1_content' => 'Доступ заборонено']);
        }

        if ($message && (!isset($_ENV['APP_DEBUG']) || $_ENV['APP_DEBUG'] !== 'true')) {
            $message = '';
        }

        return $message ?: 'Error';
    }
}
