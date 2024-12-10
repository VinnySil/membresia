<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string $rol): Response
    {
        if($request->user()->rol->name !== $rol) //Compruebo si el usuario cumple con el rol
            return abort(403, "No tienes permisos para acceder");

        return $next($request);
    }
}
