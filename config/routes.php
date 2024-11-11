<?php

use App\Controllers\HomeController;
use App\Controllers\OfferController;
use App\Core\Router\Route;

return [
    Route::get('/home', [HomeController::class, 'index']),
    Route::get('/employer/offers/add', [OfferController::class, 'addOffer']),
    Route::post('/employer/offers/add', [OfferController::class, 'storeOffer']),

];
