<?php

namespace App\Core\View;

use App\Core\Exceptions\ViewNotFoundException;
use App\Core\Session\ISession;

class View implements \App\Core\View\IView
{
    public function __construct(private ISession $session) {}

    public function renderView(string $name): void
    {

        $viewPath = APP_PATH."/views/pages/$name.php";
        if (! file_exists($viewPath)) {
            throw new ViewNotFoundException("View $name does not exist");
        }
        extract($this->data());
        include_once $viewPath;
    }

    public function renderComponent(string $name): void
    {
        $componentPath = APP_PATH."/views/components/$name.php";
        if (! file_exists($componentPath)) {
            echo "Component $name does not exist";

            return;
        }
        include_once APP_PATH."/views/components/$name.php";
    }

    private function data(): array
    {
        return [
            'view' => $this,
            'session' => $this->session,
        ];
    }
}
