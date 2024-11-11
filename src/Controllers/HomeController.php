<?php

namespace App\Controllers;

use App\Core\View\View;

class HomeController
{
public function index(): void
{
    $view = new View();
    $view->render('home');
}
}