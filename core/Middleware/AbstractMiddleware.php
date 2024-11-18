<?php

namespace App\Core\Middleware;

use App\Core\Auth\IAuth;
use App\Core\Http\IRedirect;
use App\Core\Http\IRequest;

abstract class AbstractMiddleware
{
    public function __construct(protected IRequest $request, protected IAuth $auth, protected IRedirect $redirect) {}

    abstract public function handle(): void;
}
