<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Usuario;
use Validator;

/**
 * Clase que se encarga de manipular los endpoints de usuarios (API)
 * @author mtorre4580
 */
class UsuariosController extends Controller {
   
    /**
     * Permite obtener todos los usuarios en el site
     * @return json
     */
    public function findAll() {
        try {
            $users = Usuario::all();
            return response()->json($users);
        } catch (QueryException $e) {
            return $this->genericError('Se produjo un error al obtener los usuarios');
        }
    }

    /**
     * Permite registar un usuario por default no tiene rol de admin
     * @param Request $request
     * @return json
     */
    public function save(Request $request) {
        try {
            $data = $request->all();
            $validator = Validator::make($data, Usuario::$rules);
            if ($validator->passes()) {
                $data['password'] = Hash::make($data['password']);
                $data['is_admin'] = 0;
                $user = Usuario::create($data);
                return response()->json();
            }
            return response()->json($validator->errors())->setStatusCode(400);
        } catch (QueryException $e) {
            return $this->genericError('Se produjo un error al dar de alta al usuario'. $e);
        }
    }

    /**
     * Permite obtener un user por id
     * @param int $id identificador del user
     * @return json
     */
    public function findById($id) {
        try {
            $user = Usuario::find($id);
            if ($user) {
                return response()->json($user);
            }
            return $this->notFoundId($id);
        } catch (QueryException $e) {
           return $this->genericError('Se produjo un error al obtener al usuario por id');
        }
    }

}
