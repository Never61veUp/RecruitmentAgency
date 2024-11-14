<?php

namespace App\Core\Container;

use App\Core\Http\IRedirect;
use App\Core\Http\IRequest;
use App\Core\Http\Redirect;
use App\Core\Http\Request;
use App\Core\Router\IRouter;
use App\Core\Router\Router;
use App\Core\Session\ISession;
use App\Core\Session\Session;
use App\Core\Validator\IValidator;
use App\Core\Validator\Validator;
use App\Core\View\IView;
use App\Core\View\View;

class Container
{
    public readonly IRequest $request;

    public readonly IRouter $router;

    public readonly IView $view;

    public readonly IValidator $validator;

    public readonly IRedirect $redirect;

    public readonly ISession $session;

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
