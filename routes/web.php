<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/register', function(){
    return view('auth.register');
})->name('register');

Route::post('/register', [RegisterController::class, 'register'])->name('post.register');

//Endpoint para el crud de usuarios
Route::resource('users', UserController::class);

//Endpoints para los profiles de los usuarios
Route::resource('profiles', ProfileController::class)->only(['show', 'edit', 'update', 'destroy']);
