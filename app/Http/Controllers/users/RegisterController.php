<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\DniValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function register(Request $request){

        //validar los datos que llegan desde el fronted
        $request->validate([
            'full_name' => 'required|max:100',
            'nick' => 'required|unique:users|max:50',
            'nif' => ['required', 'unique:users', 'min:9', 'max:9,', new DniValidator],
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:8|max:255|regex:/^(?=.*[A-Z])(?=.*\d).+$/',
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
