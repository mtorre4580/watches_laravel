<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

/*
|--------------------------------------------------------------------------
| EsAdmin (Middleware)
|--------------------------------------------------------------------------
|
| Este middleware permite verificar si el usuario es un administrador para poder ingresar al panel
*/
class EsAdmin {
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        if (Auth::user() &&  Auth::user()->is_admin == 1) {
            return $next($request);
        }
        return redirect()->route('home.index');
    }

}
