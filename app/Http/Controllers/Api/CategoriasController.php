<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Validator;

/**
 * Clase que se encarga de manipular los endpoints de categorías (API)
 * @author mtorre4580
 */
class CategoriasController extends Controller {

    /**
     * Permite obtener todas las categorías del site
     * @return json
     */ 
    public function findAll() {
        try {
            $categories = Categoria::all();
            return response()->json($categories);
        } catch (QueryException $e) {
            return $this->genericError('Se produjo un error al obtener las categorías');
        }
    }

    /**
     * Permite obtener una categoría por si id
     * @param int $id identificador de la categoría
     * @return json
     */
    public function findById($id) {
        try {
            $category = Categoria::find($id);
            if ($category) {
                return response()->json($category);
            }
            return $this->notFoundId($id);
        } catch (QueryException $e) {
           return $this->genericError('Se produjo un error al obtener la categoría por id');
        }
    }

    /**
     * Permite eliminar una categoría por el id de la misma
     * @param int $id identificador de la categoría
     * @return json
     */
    public function delete($id) {
        try {
            $category = Categoria::find($id);
            if ($category) {
                $category->delete();
                return response()->json();
            }
            return $this->notFoundId($id);
        } catch (QueryException $e) {
            return $this->genericError('Se produjo un error al eliminar la categoría');
        }
    }

    /**
     * Permite crear una categoría
     * @param Request $request objeto request
     * @return json
     */
    public function save(Request $request) {
        try {
            $data = $request->all();
            $validator = Validator::make($data, Categoria::$rules);
            if ($validator->passes()) {
                $category = Categoria::create($data);
                return response()->json(array('id' => $category->id_categoria));
            }
            return response()->json($validator->errors())->setStatusCode(400);
        } catch (QueryException $e) {
            return $this->genericError('Se produjo un error al crear la categoría');
        }
    }

    /**
     * Permite actualizar una categoría por su id
     * @param int $id identificador de la categoría
     * @param Request $request objeto request
     * @return json
     */
    public function update($id, Request $request) {
        try {
            $category= Categoria::find($id);
            if ($category) {
                $data = $request->all();
                $validator = Validator::make($data, Categoria::$rules);
                if ($validator->passes()) {
                    $category->fill($data);
                    $category->save();
                    return response()->json();
                }
                return response()->json($validator->errors())->setStatusCode(400);
            }
            return $this->notFoundId($id);
        } catch (QueryException $e) {
            return $this->genericError('Se produjo un error al actualizar la categoría');
        }
    }

}
