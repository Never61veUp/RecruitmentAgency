<?php

namespace App\Core\Router;

use App\Core\Controller\Controller;
use App\Core\View\View;
use JetBrains\PhpStorm\NoReturn;

class Router
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function __construct(private View $view)
    {
        $this->initRouts();
    }

    public function dispatch(string $uri, string $method): void
    {
        $route = $this->findRoute($uri, $method);

        if (! $route) {
            $this->notFound();
        }

        if (is_array($route->getAction())) {
            [$controller, $action] = $route->getAction();
            /** @var Controller $controller */
            $controller = new $controller;
            call_user_func([$controller, 'setView'], $this->view);
            call_user_func([$controller, $action]);
        } else {
            call_user_func($route->getAction());
        }

    }

    private function initRouts(): void
    {
        $routes = $this->getRouts();

        foreach ($routes as $route) {
            $this->routes[$route->getMethod()][$route->getURl()] = $route;
        }
    }

    /**
     * @return Route[]
     */
    private function getRouts(): array
    {

        return require_once APP_PATH.'/config/routes.php';
    }

    private function findRoute(string $uri, string $method): Route|false
    {
        if (! isset($this->routes[$method][$uri])) {
            return false;
        }

        return $this->routes[$method][$uri];
    }

    #[NoReturn]
    private function notFound(): void
    {
        echo 'not found route';
        exit;
    }
}
