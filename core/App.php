<?php

namespace App\Core;

use App\Core\Container\Container;
use App\Core\Http\Request;
use App\Core\Router\Router;

class App
{
    private Container $container;

    function __construct()
    {
        $this->container = new Container();
    }
    public function run(): void
    {
        $this->container
            ->router
            ->dispatch(
                $this->container->request->uri(),
                $this->container->request->method()
            );
    }
}
