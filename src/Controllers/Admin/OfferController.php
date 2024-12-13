<?php

namespace App\Controllers\Admin;

use App\Core\Controller\Controller;
use App\Services\OfferService;

class OfferController extends Controller
{
    public function renderView(): void
    {
        $offers = new OfferService($this->dataBase);

        $offers = $offers->getAll(['status' => 0]);

        $this->view('admin/acceptOffers', ['offers' => $offers]);

    }

    public function accept(): void
    {
        $id = $this->request->input('id');
        $this->dataBase->update('offers', $id, ['status' => 1]);
        $this->redirect('/admin/offers');
        dd($this->request->input('id'));
    }
}
