<?php
declare(strict_types=1);

namespace src\Core;

use Exception;
use ReflectionMethod;
use src\Controllers;

class Router
{
    private array $routes;
    private array $noBuilderPages;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $routesConfig = require BASE_PATH . '/config/routes.php';

        if (
            !is_array($routesConfig) ||
            !isset($routesConfig['routes']) ||
            !isset($routesConfig['noBuilderPages']) ||
            !is_array($routesConfig['routes']) ||
            !is_array($routesConfig['noBuilderPages'])
        ) {
            throw new Exception("Помилка у файлі конфігурації маршрутів.");
        }

        $this->routes = $routesConfig['routes'];
        $this->noBuilderPages = $routesConfig['noBuilderPages'];
    }

    /**
     * Основна логіка обробки запитів
     */
    public function handleRequest(): void
    {

        $route = filter_var($_GET['route'] ?? '', FILTER_SANITIZE_URL);

        if (!array_key_exists($route, $this->routes)) {
            (new Controllers\PageController)->show404();
            return;
        }

        if (str_contains($_SERVER['REQUEST_URI'], '?')) {
            http_response_code(403);
            header('Location: /403');
            exit;
        }

        $definition = $this->routes[$route];
        $controllerClass = $definition[0] ?? null;
        $method = $definition[1] ?? null;
        $pageTitle = $definition[2] ?? '';


        $allNoBuilderPages = array_merge(
            $this->noBuilderPages['pagesWithLayout'] ?? [],
            $this->noBuilderPages['pagesWithoutLayout'] ?? []
        );

        $controller = new $controllerClass();

        if (!method_exists($controller, $method)) {
            (new Controllers\PageController)->show404();
            return;
        }

        $params = $_SERVER['REQUEST_METHOD'] === 'POST'
            ? array_merge($_GET, $_POST)
            : $_GET;

        unset($params['route']);

        $reflection = new ReflectionMethod($controller, $method);
        $expectedParams = [];

        foreach ($reflection->getParameters() as $param) {
            $name = $param->getName();
            if (array_key_exists($name, $params)) {
                $expectedParams[$name] = $params[$name];
            } elseif ($param->isDefaultValueAvailable()) {
                $expectedParams[$name] = $param->getDefaultValue();
            } else {

                $expectedParams[$name] = null;
            }
        }

        $viewData = call_user_func_array([$controller, $method], $expectedParams);


        if (is_array($viewData)) {
            if (empty($viewData['data']['h1_content'])) {
                $viewData['data']['h1_content'] = $pageTitle;
            }

            echo View::render(
                $viewData['view'],
                $viewData['data'] ?? [],
                'layouts/main'
            );
        } else {
            echo $viewData;
        }
    }
}