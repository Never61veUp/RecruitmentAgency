<?php

namespace App\Middleware;

use App\Core\Middleware\AbstractMiddleware;

class isEmployerMiddleware extends AbstractMiddleware
{
    public function handle(): void
    {
        if (! $this->auth->isEmployer()) {
            $this->redirect->to('/home');
        }
    }
}
