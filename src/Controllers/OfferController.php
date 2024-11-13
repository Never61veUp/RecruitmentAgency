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
        //        dd($this->getSession());

        $validations = $this->request()->validate([
            'title' => ['required', 'min:3', 'max:25', 'isSpecChar:no'],
        ]);
        if (! $validations) {

            foreach ($this->request()->getErrors() as $field => $error) {
                $this->session->set($field, $error);

            }
            dd($_SESSION);
            $this->redirect('/employer/offers/add');
        } else {
            dd('Validation succeededd');
        }
    }
}
