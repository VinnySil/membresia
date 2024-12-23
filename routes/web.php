<?php

use App\Http\Controllers\auto\PermissionController;
use App\Http\Controllers\auto\RolController;
use App\Http\Controllers\users\AccountController;
use App\Http\Controllers\users\LoginController;
use App\Http\Controllers\users\RegisterController;
use App\Http\Controllers\users\UserController;
use App\Http\Middleware\CheckRol;
use Illuminate\Support\Facades\Route;

//Rutas base
Route::get('/', function () {return view('welcome');})->name('home');
Route::get('/no-autorizado', function () {return view('no_autorizado');})->name('no-autorizado');

//Rutas para el login y registro de usuarios
Route::get('/register', function(){return view('auth.register');})->name('register');
Route::get('/login', function(){return view('auth.login');})->name('login');
Route::post('/register', [RegisterController::class, 'register'])->name('post.register');
Route::post('/login', [LoginController::class, 'login'])->name('post.login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function(){

    Route::middleware(CheckRol::class.':Administrador,Editor')->group(function(){
        //Endpoint para el crud de usuarios
        Route::resource('users', UserController::class);
        //Endpoint para el crud de permisos
        Route::resource('permissions', PermissionController::class);
        //Endpoint para el crud de roles
        Route::resource('rols', RolController::class);
    });
    //Endpoints para las cuentas de usuarios
    Route::controller(AccountController::class)->group(function(){
        Route::get('/account/{user}', 'show')->name('account.show');
        Route::patch('/account/{user}', 'update')->name('account.update');
        Route::delete('/account/{user}', 'destroy')->name('account.destroy');
    });
});

