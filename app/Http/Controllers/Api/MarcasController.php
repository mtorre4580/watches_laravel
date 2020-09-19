<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Models\Marca;
use Validator;

/**
 * Clase que se encarga de manipular los endpoints de marcas (API)
 * @author mtorre4580
 */
class MarcasController extends Controller {

    /**
     * Permite obtener todas las marcas
     * @return json
     */ 
    public function findAll() {
        try {
            $brands = Marca::all();
            return response()->json($brands);
        } catch (QueryException $e) {
            return $this->genericError('Se produjo un error al obtener las marcas');
        }
    }

    /**
     * Permite obtener una marca por si id
     * @param int $id identificador de la marca
     * @return json
     */
    public function findById($id) {
        try {
            $brand = Marca::find($id);
            if ($brand) {
                return response()->json($brand);
            }
            return $this->notFoundId($id);
        } catch (QueryException $e) {
           return $this->genericError('Se produjo un error al obtener la marca por el id');
        }
    }

    /**
     * Permite eliminar una marca por el id de la misma
     * @param int $id identificador de la marca
     * @return json
     */
    public function delete($id) {
        try {
            $brand = Marca::find($id);
            if ($brand) {
                $brand->delete();
                return response()->json();
            }
            return $this->notFoundId($id);
        } catch (QueryException $e) {
            return $this->genericError('Se produjo un error al eliminar la marca');
        }
    }

    /**
     * Permite crear una marca
     * @param Request $request objeto request
     * @return json
     */
    public function save(Request $request) {
        try {
            $data = $request->all();
            $validator = Validator::make($data, Marca::$rules);
            if ($validator->passes()) {
                $new = Marca::create($data);
                return response()->json(array('id' => $new->id_marca));
            }
            return response()->json($validator->errors())->setStatusCode(400);
        } catch (QueryException $e) {
            return $this->genericError('Se produjo un error al crear la marca');
        }
    }

    /**
     * Permite actualizar una marca por su id
     * @param int $id identificador de la marca
     * @param Request $request objeto request
     * @return json
     */
    public function update($id, Request $request) {
        try {
            $brand = Marca::find($id);
            if ($brand) {
                $data = $request->all();
                $validator = Validator::make($data, Marca::$rules);
                if ($validator->passes()) {
                    $brand->fill($data);
                    $brand->save();
                    return response()->json();
                }
                return response()->json($validator->errors())->setStatusCode(400);
            }
            return $this->notFoundId($id);
        } catch (QueryException $e) {
            return $this->genericError('Se produjo un error al actualizar la marca');
        }
    }

}
