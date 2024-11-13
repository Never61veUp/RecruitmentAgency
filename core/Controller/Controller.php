<?php

namespace App\Core\Controller;

use App\Core\Http\Redirect;
use App\Core\Http\Request;
use App\Core\Session\Session;
use App\Core\View\View;

abstract class Controller
{
    protected View $view;

    protected Request $request;

    protected Redirect $redirect;

    protected Session $session;

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

    public function setRedirect(Redirect $redirect): void
    {
        $this->redirect = $redirect;
    }

    public function redirect(string $url): Redirect
    {
        return $this->redirect->to($url);
    }

    public function getSession(): Session
    {
        return $this->session;
    }

    public function setSession(Session $session): void
    {
        $this->session = $session;
    }
}
