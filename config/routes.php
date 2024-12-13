<?php

use App\Controllers\AllOffersController;
use App\Controllers\HomeController;
use App\Controllers\OfferController;
use App\Controllers\SignInController;
use App\Controllers\SignUpCompanyController;
use App\Controllers\SignUpUserController;
use App\Core\Router\Route;
use App\Middleware\GuestMiddleware;
use App\Middleware\isEmployerMiddleware;

return [
    Route::get('/', [HomeController::class, 'index']),
    Route::get('/home', [HomeController::class, 'index']),
    Route::get('/employer/offers/add', [OfferController::class, 'addOffer'], [isEmployerMiddleware::class]),
    Route::post('/employer/offers/add', [OfferController::class, 'storeOffer']),
    Route::post('/employer/offers/delete', [OfferController::class, 'deleteOffer']),
    Route::post('/employer/offers/edit', [OfferController::class, 'editOffer']),
    Route::get('/signUp/user', [SignUpUserController::class, 'signUp'], [GuestMiddleware::class]),
    Route::post('/signUp/user', [SignUpUserController::class, 'AddUser']),
    Route::get('/signUp/company', [SignUpCompanyController::class, 'signUp'], [GuestMiddleware::class]),
    Route::post('/signUp/company', [SignUpCompanyController::class, 'AddCompany']),
    Route::get('/signIn', [SignInController::class, 'signIn'], [GuestMiddleware::class]),
    Route::post('/signIn', [SignInController::class, 'signInPost']),
    Route::post('/signOut', [SignInController::class, 'signOut']),
    Route::get('/offers', [AllOffersController::class, 'renderView']),
    Route::post('/offers', [AllOffersController::class, 'updateOffers']),
    Route::get('/employer/offers', [OfferController::class, 'viewOffer']),
    Route::get('/admin/offers', [App\Controllers\Admin\OfferController::class, 'renderView'], [isEmployerMiddleware::class]),
    Route::post('/admin/offers/accept', [App\Controllers\Admin\OfferController::class, 'accept'], [isEmployerMiddleware::class]),

];
