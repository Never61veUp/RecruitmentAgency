<?php

namespace App\Controllers;

use App\Core\Controller\Controller;

class OfferController extends Controller
{
    public function addOffer(): void
    {
        $this->view('employer/offers/add');
    }

    public function storeOffer(): void
    {

        $validations = $this->request()->validate([
            'title' => ['required', 'min:3', 'max:25', 'isSpecChar:no'],
            'description' => ['required', 'min:3', 'max:255'],
            'salary' => ['required', 'min:3', 'max:25'],
            'requiredExperience' => ['required', 'min:3', 'max:25'],
        ]);

        if (! $validations) {
            foreach ($this->request()->getErrors() as $field => $error) {
                $this->session->set($field, $error);

            }

            $this->redirect('/employer/offers/add');
        } else {

            $id = $this->dataBase->add('offers', [
                'title' => $this->request->input('title'),
                'description' => $this->request->input('description'),
                'salary' => $this->request->input('salary'),
                'requiredExperience' => $this->request->input('requiredExperience'),
            ]);
            dd($id);
        }
    }
}
