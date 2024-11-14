<?php

namespace App\Controllers;

use App\Core\Controller\Controller;

class SignUpCompanyController extends Controller
{
    public function signUp(): void
    {
        $this->view('/signup/company');
    }

    public function AddCompany(): void
    {
        $validations = $this->request()->validate([
            'title' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'min:3', 'max:50', 'email'],
            'password' => ['required', 'min:3', 'max:25'],
        ]);

        if (! $validations) {
            foreach ($this->request()->getErrors() as $field => $error) {
                $this->session->set($field, $error);
            }

            $this->redirect('/signUp/company');
        } else {
            $hashedPassword = password_hash($this->request->input('password'), PASSWORD_DEFAULT);
            $hashedEmail = hash('sha256', $this->request->input('email'));

            $id = $this->dataBase->add('company', [
                'title' => $this->request->input('title'),
                'email' => $hashedEmail,
                'password' => $hashedPassword,
            ]);

            dd($id);
        }
    }
}
