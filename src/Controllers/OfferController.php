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
        dd($this->request()->input('titl1e'));
    }
}
