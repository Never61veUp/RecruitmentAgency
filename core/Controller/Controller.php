<?php

namespace App\Core\Controller;

use App\Core\View\View;

abstract class Controller
{
    protected View $view;

    public function view(string $view): void
    {
        $this->view->renderView($view);
    }

    public function setView(View $view): void
    {
        $this->view = $view;
    }
}
