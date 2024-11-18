<?php

namespace App\Controllers;

use App\Core\Controller\Controller;
use App\Services\OfferService;

class AllOffersController extends Controller
{
    private OfferService $offerService;

    public function renderView(): void
    {
        $offers = new OfferService($this->dataBase);

        $offers = $offers->getAll();

        $this->view('offers/offers', ['offers' => $offers]);

    }

    public function updateOffers(): void
    {

        $data = $this->request->input('title');

        $offers = new OfferService($this->dataBase);
        ! $data ? $offers = $offers->getAll() : $offers = $offers->getAll([], ['title' => $data]);

        $this->view('offers/offers', ['offers' => $offers]);
    }
}
