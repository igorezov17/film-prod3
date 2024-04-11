<?php

use App\Controllers\AuthController;
use App\Controllers\HomeController;
use App\Controllers\MoviesController;
use App\Controllers\RegisterController;
use Kernel\Router\Route;


return [
    Route::get('/home', [HomeController::class, 'index']),
    Route::get('/movies', [MoviesController::class, 'index']),
    Route::get('/admin/movies/add', [MoviesController::class, 'add']),
    Route::post('/admin/movies/add', [MoviesController::class, 'store']),
    Route::get('/register', [RegisterController::class, 'index']),
    Route::post('/register', [RegisterController::class, 'register']),
    Route::get('/login', [AuthController::class, 'index']),
    Route::post('/login', [AuthController::class, 'login']),
    Route::get('/test', function() {
        include APP_PATH . "/views/pages/movies.php"; 
    }),
];