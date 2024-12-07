<?php

use App\Http\Controllers\LoginController;
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

Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::post('/register', [RegisterController::class, 'register'])->name('post.register');
Route::post('/login', [LoginController::class, 'login'])->name('post.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//Endpoint para el crud de usuarios
Route::resource('users', UserController::class);

//Endpoints para los profiles de los usuarios
Route::resource('profiles', ProfileController::class)->only(['show', 'edit', 'update', 'destroy']);
