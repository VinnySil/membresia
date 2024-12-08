<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(Request $request){

        //validamos los datos del usuario que nos llega
        $request->validate([
            'nick' => 'required|max:50|',
            'password' => 'required|max:255',
        ]);

        $credentials = $request->only('nick', 'password');
        $remember = $request->has('remember');

        if(Auth::attempt($credentials, $remember)){ //Intento de autenticacón
            $request->session()->regenerate();
            return redirect()->intended(route('home'));
        }

        return redirect('login');
    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('home'));

    }
}
