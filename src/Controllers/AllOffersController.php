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

        $offers = $offers->getAll(['status' => 1]);

        $this->view('offers/offers', ['offers' => $offers]);

    }

    public function updateOffers(): void
    {

        $title = $this->request->input('title');
        $companyName = $this->request->input('company');

        $offersService = new OfferService($this->dataBase);

        // Если оба фильтра пустые, возвращаем все офферы
        if (empty($title) && empty($companyName)) {
            $offers = $offersService->getAll();
        } else {
            // Учитываем фильтры по заголовку и названию компании
            $likeConditions = [];
            if (! empty($title)) {
                $likeConditions['title'] = $title;
            }

            $offers = $offersService->getAll([], ['Title' => $title], $companyName);
        }

        $this->view('offers/offers', ['offers' => $offers]);
    }
}
