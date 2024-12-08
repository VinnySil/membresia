<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Rules\DniValidator;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function show(User $user)
    {
        return view('users.account', compact('user'));
    }


    public function update(Request $request, User $user)
    {
        //validar los datos que llegan desde el fronted
        $request->validate([
            'full_name' => 'required|max:100',
            'nick' => 'required|max:50|unique:users,nick,'.$user->id,
            'nif' => ['required', 'min:9', 'max:9,', new DniValidator, 'unique:users,nif,'.$user->id],
            'email' => 'required|max:255|unique:users,email,'.$user->id,
            'born_date' => 'required|date'
        ]);

        $user->update($request->all());
        return redirect()->route('account.show', compact('user'));
    }


    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('home');
    }
}
