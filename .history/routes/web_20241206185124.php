<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Endpoint para el crud de usuarios
Route::resource('users', UserController::class)->name();
