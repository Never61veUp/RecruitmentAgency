<?php

namespace App\Core\Container;

use App\Core\Http\Redirect;
use App\Core\Http\Request;
use App\Core\Router\Router;
use App\Core\Session\Session;
use App\Core\Validator\Validator;
use App\Core\View\View;

class Container
{
    public readonly Request $request;

    public readonly Router $router;

    public readonly View $view;

    public readonly Validator $validator;

    public readonly Redirect $redirect;

    public readonly Session $session;

    public function __construct()
    {
        $this->registerServices();
    }

    private function registerServices(): void
    {
        $this->session = new Session;
        $this->view = new View($this->session);
        $this->request = Request::createFromGlobals();
        $this->redirect = new Redirect;

        $this->router = new Router($this->view, $this->request, $this->redirect, $this->session);
        $this->validator = new Validator;
        $this->request->setValidator($this->validator);

    }
}
