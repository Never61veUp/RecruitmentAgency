<?php

namespace App\Core\Router;

use App\Core\Auth\IAuth;
use App\Core\Controller\Controller;
use App\Core\Http\IRedirect;
use App\Core\Http\IRequest;
use App\Core\Middleware\AbstractMiddleware;
use App\Core\Persistance\IDataBase;
use App\Core\Session\ISession;
use App\Core\View\IView;
use JetBrains\PhpStorm\NoReturn;

class Router implements IRouter
{
    private array $routes = [
        'GET' => [],
        'POST' => [],
    ];

    public function __construct(private readonly IView $view,
        private readonly IRequest $request,
        private readonly IRedirect $redirect,
        private readonly ISession $session,
        private readonly IDatabase $database,
        private readonly IAuth $auth)
    {

        $this->initRouts();
    }

    public function dispatch(string $uri, string $method): void
    {
        $route = $this->findRoute($uri, $method);

        if (! $route) {
            $this->notFound();
        }
        if ($route->hasMiddlewares()) {
            foreach ($route->getMiddlewares() as $middleware) {
                /** @var AbstractMiddleware $middleware */
                $middleware = new $middleware($this->request, $this->auth, $this->redirect);

                $middleware->handle();
            }
        }
        if (is_array($route->getAction())) {
            [$controller, $action] = $route->getAction();
            /** @var Controller $controller */
            $controller = new $controller;
            call_user_func([$controller, 'setView'], $this->view);
            call_user_func([$controller, 'setRequest'], $this->request);
            call_user_func([$controller, 'setRedirect'], $this->redirect);
            call_user_func([$controller, 'setSession'], $this->session);
            call_user_func([$controller, 'setDatabase'], $this->database);
            call_user_func([$controller, 'setAuth'], $this->auth);

            $params = $route->getParams();
            call_user_func_array([$controller, $action], $params);
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
        foreach ($this->routes[$method] as $routeUri => $route) {
            $pattern = preg_replace('#\{([a-zA-Z0-9_]+)\}#', '(?P<\1>[^/]+)', $routeUri);
            $pattern = '#^'.$pattern.'$#';

            if (preg_match($pattern, $uri, $matches)) {
                $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY);
                $route->setParams($params);

                return $route;
            }
        }

        return false;
    }

    #[NoReturn]
    private function notFound(): void
    {
        $this->view->renderView('/notFound');
        exit;
    }
}
