<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Authenticate extends Middleware
{
    /**
     
    Handle an incoming request.*
*/
// ruta cuando el usuario no esta autenticado

    public function redirectTo(Request $request): ?string{
        return $request->expectsJson() ? null : route('login');
    }
}