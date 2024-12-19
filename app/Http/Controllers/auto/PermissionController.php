<?php

namespace App\Http\Controllers\auto;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
        /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Auth::user()->rol->name !== 'Administrador')//Comprobamos si el usuario autenticado es el mismmo al que intenta acceder a la ruta
            abort(403, "No tienes permisos para acceder");

        $request->validate(['action' => 'required|max:30']);

        $permission = new Permission();
        $permission->action = $request->input('action');
        $permission->save();
        
        return redirect()->route('permissions.show', compact('permission'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Permission $permission)
    {
        return view('permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $request->validate(['action' => 'required|max:30']);
        $permission->action = $request->input('action');
        $permission->save();
        return redirect()->route('permissions.show', compact('permission'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        if(Auth::user()->rol->name !== 'Administrador')//Comprobamos si el usuario autenticado es el mismmo al que intenta acceder a la ruta
            abort(403, "No tienes permisos para acceder");
        $permission->delete();
        return redirect()->route('permissions.index');
    }
}
