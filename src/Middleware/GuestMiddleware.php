<?php

namespace App\Middleware;

use App\Core\Middleware\AbstractMiddleware;

class GuestMiddleware extends AbstractMiddleware
{
    public function handle(): void
    {
        if ($this->auth->isLoggedIn()) {
            $this->redirect->to('/home');
        }
    }
}
