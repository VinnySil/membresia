<?php

use App\Http\Controllers\users\AccountController;
use App\Http\Controllers\users\LoginController;
use App\Http\Controllers\users\RegisterController;
use App\Http\Controllers\users\UserController;
use App\Http\Middleware\CheckRol;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/no-autorizado', function () {
    return view('no-autorizado');
})->name('no-autorizado');

Route::get('/register', function(){
    return view('auth.register');
})->name('register');

Route::get('/login', function(){
    return view('auth.login');
})->name('login');

Route::post('/register', [RegisterController::class, 'register'])->name('post.register');
Route::post('/login', [LoginController::class, 'login'])->name('post.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function(){
    //Endpoint para el crud de usuarios
    Route::resource('users', UserController::class)->middleware(CheckRol::class.':Administrador');
    
    //Endpoints para las cuentas de usuarios
    Route::controller(AccountController::class)->group(function(){
        Route::get('/account/{user}', 'show')->name('account.show');
        Route::patch('/account/{user}', 'update')->name('account.update');
        Route::delete('/account/{user}', 'destroy')->name('account.destroy');
    });
    
});

