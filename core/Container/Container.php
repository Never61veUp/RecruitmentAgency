<?php

namespace App\Core\Container;

use App\Core\Http\Request;
use App\Core\Router\Router;

class Container
{
public readonly Request $request;
public readonly Router $router;

    function __construct( )
    {
        $this->registerServices();
}
private function registerServices(): void
{
    $this->router = new Router();
    $this->request = Request::createFromGlobals();
}
}