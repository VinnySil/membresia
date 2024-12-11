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
    public function handle(Request $request, Closure $next, string ...$rols): Response
    {
        $allowed = false;

        foreach ($rols as $rol) {
            if($request->user()->rol->name === $rol){ //Compruebo si el usuario cumple con el rol
                $allowed = true;
                break;
            }
        }

        if($allowed) return $next($request);
        else return abort(403, 'No tienes permisos para acceder');
        
    }
}
