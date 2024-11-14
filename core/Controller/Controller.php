<?php

namespace App\Core\Controller;

use App\Core\Http\IRedirect;
use App\Core\Http\IRequest;
use App\Core\Session\ISession;
use App\Core\View\IView;

abstract class Controller
{
    protected IView $view;

    protected IRequest $request;

    protected IRedirect $redirect;

    protected ISession $session;

    public function view(string $view): void
    {
        $this->view->renderView($view);
    }

    public function setView(IView $view): void
    {
        $this->view = $view;
    }

    public function request(): IRequest
    {
        return $this->request;
    }

    public function setRequest(IRequest $request): void
    {
        $this->request = $request;
    }

    public function setRedirect(IRedirect $redirect): void
    {
        $this->redirect = $redirect;
    }

    public function redirect(string $url): IRedirect
    {
        return $this->redirect->to($url);
    }

    public function getSession(): ISession
    {
        return $this->session;
    }

    public function setSession(ISession $session): void
    {
        $this->session = $session;
    }
}
