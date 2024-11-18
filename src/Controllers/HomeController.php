<?php

namespace App\Controllers;

use App\Core\Controller\Controller;
use App\Services\CompanyService;
use App\Services\OfferService;
use App\Services\UserService;

class HomeController extends Controller
{
    public function index(): void
    {
        $offers = new OfferService($this->dataBase);
        $offers = $offers->getCount();
        $users = new UserService($this->dataBase);
        $users = $users->getCount();
        $companies = new CompanyService($this->dataBase);
        $companies = $companies->getCount();

        $this->view('home', ['offers' => $offers, 'users' => $users, 'companies' => $companies]);
    }
}
