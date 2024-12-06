<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Endpoint para el crud de usuarios
// Route::resource('user', UserController::class);
