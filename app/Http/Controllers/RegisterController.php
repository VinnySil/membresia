<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request){

        //validamos los datos del usuario que nos llega
        $request->validate([
            'full_name' => 'required|max:100',
            'nick' => 'required|unique:users|max:50',
            'nif' => 'required|unique:users|min:9|max:9',
            'email' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'born_date' => 'required|date'
        ]);

        $datos = $request->all(); //saco todos los datos que llegan del frontend
        $datos['rol_id'] = 3; //añado el rol de cliente al usuario
        $user = User::create($datos);

        //Autenticamos el usuario
        Auth::login($user);

        return redirect(route('home'));

    }
}
