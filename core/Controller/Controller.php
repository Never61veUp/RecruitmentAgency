<?php

namespace App\Core\Controller;

use App\Core\Http\Request;
use App\Core\View\View;

abstract class Controller
{
    protected View $view;

    protected Request $request;

    public function view(string $view): void
    {
        $this->view->renderView($view);
    }

    public function setView(View $view): void
    {
        $this->view = $view;
    }

    public function request(): Request
    {
        return $this->request;
    }

    public function setRequest(Request $request): void
    {
        $this->request = $request;
    }
}
