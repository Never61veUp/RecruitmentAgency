<?php

namespace App\Controllers;

use App\Core\Controller\Controller;

class SignInController extends Controller
{
    public function signIn(): void
    {
        $this->view('/signIn/signIn');
    }

    public function signInPost(): void
    {
        $email = $this->request()->input('email');
        $password = $this->request()->input('password');
        if ($this->auth->attempt($email, $password)) {
            $this->redirect('/home');
        } else {
            dd('Wrong email or password');
        }

    }
}
