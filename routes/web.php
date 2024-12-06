<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

//Endpoint para el crud de usuarios
Route::resource('users', UserController::class);

//Endpoints para los profiles de los usuarios
Route::resource('profiles', ProfileController::class)->only(['show', 'edit', 'update', 'destroy']);
