<?php

namespace App\Core\Router;

interface IRouter
{
    public function dispatch(string $uri, string $method): void;
}
