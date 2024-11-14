<?php

use App\Controllers\HomeController;
use App\Controllers\OfferController;
use App\Controllers\SignInController;
use App\Controllers\SignUpCompanyController;
use App\Controllers\SignUpUserController;
use App\Core\Router\Route;

return [
    Route::get('/home', [HomeController::class, 'index']),
    Route::get('/employer/offers/add', [OfferController::class, 'addOffer']),
    Route::post('/employer/offers/add', [OfferController::class, 'storeOffer']),
    Route::get('/signUp/user', [SignUpUserController::class, 'signUp']),
    Route::post('/signUp/user', [SignUpUserController::class, 'AddUser']),
    Route::get('/signUp/company', [SignUpCompanyController::class, 'signUp']),
    Route::post('/signUp/company', [SignUpCompanyController::class, 'AddCompany']),
    Route::get('/signIn', [SignInController::class, 'signIn']),
    Route::post('/signIn', [SignInController::class, 'signInPost']),

];
