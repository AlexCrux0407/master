<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!session()->has('usuario_id')) {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión');
        }

        $userRole = session('rol', 'alumno');
        
        if (!in_array($userRole, $roles)) {
            return redirect()->route('index')->with('error', 'No tienes permisos para acceder a esta sección');
        }

        return $next($request);
    }
}
