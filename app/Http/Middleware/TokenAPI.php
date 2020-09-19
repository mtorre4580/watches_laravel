<?php

namespace App\Http\Middleware;

use Closure;

/*
|--------------------------------------------------------------------------
| TokenAPI (Middleware)
|--------------------------------------------------------------------------
|
| Este middleware permite verificar si consultan la api la ruta va estar validada por el token
*/
class TokenAPI {

    /**
     * Permite validar si el request posee el token para acciones sensibles
     * Posee un hash hardocode de ejemplo
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next) {
        $header = $request->header('Authorization');
        if ($header == '602A0ABB57D67C562BCDA242A6733514C7AAC60E4B179CC6E7FF6F769371A6DA') {
            return $next($request);
        }
        return response()->json(array('status' => 'No autorizado'))->setStatusCode(401);
    }
}
