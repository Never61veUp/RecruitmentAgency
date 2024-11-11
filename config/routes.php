<?php

use App\Controllers\HomeController;
use App\Core\Router\Route;

return [
    Route::get('/home', [HomeController::class, 'index']),

];
