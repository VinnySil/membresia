<?php

namespace App\Http\Controllers\users;

use App\Http\Controllers\Controller;
use App\Models\Rol;
use App\Models\User;
use App\Rules\DniValidator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
   public function index()
   {
       $users = User::all();
       return view('users.index', compact('users'));
   }

   /**
    * Show the form for creating a new resource.
    */
   public function create()
   {
       $rols = Rol::all();
       return view('users.create', compact('rols'));
   }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if(Auth::user()->rol->name !== 'Administrador')//Comprobamos si el usuario autenticado es el mismmo al que intenta acceder a la ruta
            abort(403, "No tienes permisos para acceder");

        //validar los datos que llegan desde el fronted
        $request->validate([
            'full_name' => 'required|max:100',
            'nick' => 'required|unique:users|max:50',
            'rol_id' => 'required',Rule::exists('rols', 'id'),
            'nif' => ['required', 'unique:users', 'min:9', 'max:9,', new DniValidator],
            'email' => 'required|unique:users|max:255',
            'password' => 'required|min:8|max:255|regex:/^(?=.*[A-Z])(?=.*\d).+$/',
            'born_date' => 'required|date'
        ]);

        $user = User::create($request->all());

        return redirect()->route('users.show', compact('user'));
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $rols = Rol::all();
        return view('users.edit', compact('user', 'rols'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //validar los datos que llegan desde el fronted
        $request->validate([
            'full_name' => 'required|max:100',
            'nick' => 'required|max:50|unique:users,nick,'.$user->id,
            'rol_id' => 'required|'.Rule::exists('rols', 'id'),
            'nif' => ['required', 'min:9', 'max:9,', new DniValidator, 'unique:users,nif,'.$user->id],
            'email' => 'required|max:255|unique:users,email,'.$user->id,
            'born_date' => 'required|date'
        ]);

        $user->update($request->all());
        return redirect()->route('users.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        if(Auth::user()->rol->name !== 'Administrador')//Comprobamos si el usuario autenticado es el mismmo al que intenta acceder a la ruta
            abort(403, "No tienes permisos para acceder");
        $user->delete();
        return redirect()->route('users.index');
    }
}
