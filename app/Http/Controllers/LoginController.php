<?php

namespace App\Http\Controllers;

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

        $credentials = [
            'nick' => $request->nick,
            'password' => $request->password,
        ];

        $remember = $request->has('remember');

        if(Auth::attempt($credentials, $remember)){

            $request->session()->regenerate();
            return redirect()->intended(route('home'));

        }
        else{
            return redirect('login');
        }

    }

    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect(route('home'));

    }
}
