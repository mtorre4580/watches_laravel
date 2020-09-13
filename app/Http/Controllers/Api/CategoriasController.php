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
        $categories = Categoria::all();
        return response()->json($categories);
    }

     /**
     * Permite obtener el detalle de la categoría por el id
     * @param int $id identificador de la categoría
     * @return json
     */
    public function findById($id) {
        $category = Categoria::find($id);
        return response()->json($category);
    }

     /**
     * Permite eliminar una categoría por el id de la misma
     * @param int $id identificador de la categoría
     * @return json
     */
    public function delete($id) {
        $category = Categoria::find($id);
        $category->delete(); 
        return response()->json([
            'success' => true,
            'msg'     => 'Success delete',
        ]);
    }

    /**
     * Permite crear una categoría
     * @param Request $request objeto request
     * @return json
     */
    public function save(Request $request) {
        $data = $request->all();
        $categoria = Categoria::create($data);
        return response()->json([
            'msg'    => $categoria->id_categoria,
        ]);
    }

    /**
     * Permite actualizar una categoría por su id
     * @param int $id identificador de la categoría
     * @param Request $request objeto request
     * @return json
     */
    public function update(Request $request) {
        
    }

}
