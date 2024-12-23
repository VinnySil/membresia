<?php

namespace App\Http\Controllers\auto;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Rol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $filter = request('name');
        $rols = Rol::name($filter)->orderBy('name', 'asc')->paginate(2);
        return view('rols.index', compact('rols', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('rols.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if(Auth::user()->rol->name !== 'Administrador')//Comprobamos si el usuario autenticado es el mismmo al que intenta acceder a la ruta
            abort(403, "No tienes permisos para acceder");

        $request->validate([
            'name' => 'required|max:30',
            "permissions" => 'required|array'
        ]);
        
        $rol = new Rol();
        $rol->name = $request->input('name');
        $permissions = array_map('intval', $request->input('permissions'));
        $rol->save();
        $rol->permissions()->sync($permissions);
        
        return redirect()->route('rols.show', compact('rol'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Rol $rol)
    {
        $permissions = $rol->permissions;
        return view('rols.show', compact('rol', 'permissions'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Rol $rol)
    {
        $userPermissions = $rol->permissions;
        $permissions = Permission::all();
        $userPermissionsArray = [];
        foreach ($userPermissions as $userPermission) {
            $userPermissionsArray[] = $userPermission->id;
        }
        return view('rols.edit', compact('rol', 'permissions', 'userPermissionsArray'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rol $rol)
    {
        $request->validate([
            'name' => 'required|max:30',
            'permissions' => 'required|array'
        ]);
        $rol->name = $request->input('name');
        $rol->permissions()->sync($request->input('permissions'));
        $rol->save();
        return redirect()->route('rols.show', compact('rol'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rol $rol)
    {
        if(Auth::user()->rol->name !== 'Administrador')//Comprobamos si el usuario autenticado es el mismmo al que intenta acceder a la ruta
            abort(403, "No tienes permisos para acceder");
        $rol->delete();
        return redirect()->route('rols.index');
    }
}
