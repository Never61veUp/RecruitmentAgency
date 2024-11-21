<?php

namespace App\Controllers;

use App\Core\Controller\Controller;
use App\Services\OfferService;

class OfferController extends Controller
{
    public function addOffer(): void
    {
        $this->view('employer/offers/add');
    }

    public function viewOffer(): void
    {
        $offers = new OfferService($this->dataBase);

        $offers = $offers->getAll(['companyId' => $this->session->get('email')['id']]);

        $this->view('employer/offers', ['offers' => $offers]);
    }

    public function storeOffer(): void
    {

        $validations = $this->request()->validate([
            'title' => ['required', 'min:3', 'max:25'],
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
                'companyId' => $this->session->get('email')['id'],
                'region' => $this->request->input('location'),
                'isRemote' => (int) $this->request->input('isRemote'),
            ]);

        }
        $this->redirect('/employer/offers');
    }

    public function deleteOffer(): void
    {
        $id = $this->request->input('id');
        $res = $this->dataBase->delete('offers', $id);
        $this->redirect('/employer/offers');
    }

    public function editOffer(): void
    {
        $id = $this->request->input('id');

        $res = $this->dataBase->update('offers', $id, [
            'title' => $this->request->input('title'),
            'description' => $this->request->input('description'),
            'salary' => $this->request->input('salary'),
            'requiredExperience' => $this->request->input('requiredExperience'),
            'region' => $this->request->input('location'),
            'isRemote' => (int) $this->request->input('isRemote'),
            'updatedAt' => date('Y-m-d H:i:s'),
        ]);
        $this->redirect('/employer/offers');
    }
}
