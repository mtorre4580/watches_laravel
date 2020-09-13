<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController {

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Helper para validar si el id es un número, sino por default devuelve que no existe
     * @param int $id identificador
     * @return json
     */
    protected function notFoundId($id) {
        if (!is_numeric($id)) {
            return response()->json(array('msg' => 'El id no es un número, ' . $id))->setStatusCode(400);
        }
        return response()->json(array('msg' => 'El id no existe'))->setStatusCode(400);
    }

    /**
     * Helper para devolver un mensaje de error con el status 500
     * @param string $msg mensaje de error
     * @return json
     */
    protected function genericError($msg) {
        return response()->json(array('msg' => $msg))->setStatusCode(500);
    }

}
