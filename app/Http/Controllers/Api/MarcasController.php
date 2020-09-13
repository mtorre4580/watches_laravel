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
            
        }
    }

    /**
     * Permite obtener una marca por su id
     * @param int $id identificador de la marca
     * @return json
     */
    public function findById($id) {
        $brand = Marca::find($id);
        return response()->json($brand);
    }

    /**
     * Permite eliminar una marca por el id de la misma
     * @param int $id identificador de la marca
     * @return json
     */
    public function delete($id) {
        $brand = Marca::find($id);
        $brand->delete(); 
        return response()->json([
            'success' => true,
            'msg'     => 'Success delete',
        ]);
    }

    /**
     * Permite dar de alta una marca
     * @param Request $request objeto request
     * @return json
     */
    public function save(Request $request) {
        $data = $request->all();
        $brand = Marca::create($data);
        return response()->json([
            'msg'    => $brand->id_marca,
        ]);
    }

    /**
     * Permite actualizar una marca por su id
     * @param int $id identificador de la marca
     * @param Request $request objeto request
     * @return json
     */
    public function update($id, Request $request) {
        
    }

}
