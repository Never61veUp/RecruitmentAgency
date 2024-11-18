<?php

namespace App\Core\Middleware;

interface IMiddleware
{
    public function check(array $middleware = []): void;
}
