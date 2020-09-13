<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use App\Http\Controllers\Controller;
use App\Models\Noticia;
use App\Models\Comentario;
use Validator;

/**
 * Clase que se encarga de manipular los endpoints de noticias (API)
 * @author mtorre4580
 */
class NoticiasController extends Controller {

    /**
     * Permite obtener todas las noticias
     * @return json
     */    
    public function findAll() {
        try {
            $news = Noticia::all();
            return response()->json($news);
        } catch (QueryException $e) {
            return $this->genericError('Se produjo un error al obtener las noticias');
        }
    }

    /**
     * Permite obtener el detalle de una noticia con sus comentarios correspondientes si existen
     * @param int $id identificador de la noticia
     * @return json
     */
    public function findById($id) {
        try {
            $new = Noticia::find($id);
            if ($new) {
                $comments = Comentario::where('id_noticia', $id)->get();
                $new['comentarios'] = $comments;
                return response()->json($new);
            }
            return $this->notFoundId($id);
        } catch (QueryException $e) {
           return $this->genericError('Se produjo un error al obtener el detalle de la noticia');
        }
    }

    /**
     * Permite eliminar una noticia por el id de la misma
     * @param int $id identificador de la noticia
     * @return json
     */
    public function delete($id) {
        try {
            $new = Noticia::find($id);
            if ($new) {
                $new->delete();
                $comments = Comentario::where('id_noticia', $id)->get();
                if ($comments) {
                    foreach($comments as $comment) {
                        $comment->delete();
                    }
                }
                return response()->json();
            }
            return $this->notFoundId($id);
        } catch (QueryException $e) {
            return $this->genericError('Se produjo un error al eliminar la noticia');
        }
    }

    /**
     * Permite crear una noticia
     * @param Request $request objeto request
     * @return json
     */
    public function save(Request $request) {
        try {
            $data = $request->all();
            $data['fecha_publicacion'] = date('Y-m-d H:i:s');
            if (!array_key_exists('imagen', $data)) {
                $data['imagen'] = 'sin-imagen.png';
            }
            $validator = Validator::make($data, Noticia::$rules);
            if ($validator->passes()) {
                $new = Noticia::create($data);
                return response()->json(array('id' => $new->id_noticia));
            }
            return response()->json($validator->errors())->setStatusCode(400);
        } catch (QueryException $e) {
            return $this->genericError('Se produjo un error al crear la noticia');
        }
    }

     /**
     * Permite actualizar una noticia por su id
     * @param int $id identificador de la noticia
     * @param Request $request objeto request
     * @return json
     */
    public function update($id, Request $request) {
        try {
            $new = Noticia::find($id);
            if ($new) {
                $data = $request->all();
                $validator = Validator::make($data, Noticia::$rules);
                if ($validator->passes()) {
                    $new->fill($data);
                    $new->save();
                    return response()->json();
                }
                return response()->json($validator->errors())->setStatusCode(400);
            }
            return $this->notFoundId($id);
        } catch (QueryException $e) {
            return $this->genericError('Se produjo un error al actualizar la noticia');
        }
    }

}
