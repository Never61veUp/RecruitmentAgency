<?php

namespace App\Core\View;

use App\Core\Auth\IAuth;
use App\Core\Exceptions\ViewNotFoundException;
use App\Core\Session\ISession;

class View implements IView
{
    public function __construct(private ISession $session,
        private IAuth $auth) {}

    public function renderView(string $name, array $data = []): void
    {

        $viewPath = APP_PATH."/views/pages/$name.php";
        if (! file_exists($viewPath)) {
            throw new ViewNotFoundException("View $name does not exist");
        }
        extract(array_merge($this->data(), $data));
        include_once $viewPath;
    }

    public function renderComponent(string $name): void
    {
        $componentPath = APP_PATH."/views/components/$name.php";
        if (! file_exists($componentPath)) {
            echo "Component $name does not exist";

            return;
        }
        extract($this->data());
        include_once $componentPath;
    }

    private function data(): array
    {
        return [
            'view' => $this,
            'session' => $this->session,
            'auth' => $this->auth,
        ];
    }
}
