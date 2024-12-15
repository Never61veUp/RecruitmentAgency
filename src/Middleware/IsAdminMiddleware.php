<?php

namespace App\Middleware;

use App\Core\Middleware\AbstractMiddleware;

class IsAdminMiddleware extends AbstractMiddleware
{
    public function handle(): void
    {
        if (! $this->auth->isAdmin()) {
            $this->redirect->to('/home');
        }
    }
}
