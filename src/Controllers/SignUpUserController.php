<?php

namespace App\Controllers;

use App\Core\Controller\Controller;

class SignUpUserController extends Controller
{
    public function signUp(): void
    {
        $this->view('/signup/user');
    }

    public function AddUser(): void
    {
        $validations = $this->request()->validate([
            'name' => ['required', 'min:3', 'max:10', 'isSpecChar:no'],
            'surName' => ['required', 'min:3', 'max:255'],
            'birthDate' => ['required'],
            'email' => ['required', 'min:3', 'max:50'],
            'password' => ['required', 'min:3', 'max:25'],
        ]);

        if (! $validations) {
            foreach ($this->request()->getErrors() as $field => $error) {
                $this->session->set($field, $error);

            }

            $this->redirect('/signUp/user');
        } else {
            $hashedPassword = password_hash($this->request->input('password'), PASSWORD_DEFAULT);
            $hashedEmail = hash('sha256', $this->request->input('email'));

            $id = $this->dataBase->add('users', [
                'name' => $this->request->input('name'),
                'surName' => $this->request->input('surName'),
                'birthDate' => $this->request->input('birthDate'),
                'email' => $hashedEmail,
                'password' => $hashedPassword,
            ]);

            dd($id);
        }
    }
}
