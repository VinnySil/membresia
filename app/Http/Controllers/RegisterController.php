<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(Request $request){

        //validamos los datos del usuario que nos llega
        $request->validate([
            
        ]);

    }
}
