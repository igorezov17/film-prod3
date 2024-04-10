<?php

use App\Controllers\HomeController;
use App\Controllers\MoviesController;
use Kernel\Router\Route;


return [
    Route::get('/home', [HomeController::class, 'index']),
    Route::get('/movies', [MoviesController::class, 'index']),
    Route::get('/admin/movies/add', [MoviesController::class, 'add']),
    Route::post('/admin/movies/add', [MoviesController::class, 'store']),
    Route::get('/test', function() {
        include APP_PATH . "/views/pages/movies.php"; 
    }),
];