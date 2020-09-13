<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;
use Auth;

/*
|--------------------------------------------------------------------------
| Comentario (Controller)
|--------------------------------------------------------------------------
|
| Este controller maneja los datos relacionados con los comentarios de una publicación
| Eliminar, Editar, Modificar, realiza un redirect al detalle de la noticia a la cual pertenece
*/
class ComentariosController extends Controller {

    /**
     * Permite crear un nuevo comentario con los datos recibidos del request, valida los datos...
     * y luego redirige al detalle de la noticia con los comentarios actualizados
     * @param $request
     * @return void
     */
    public function agregar(Request $request) {
        $request-> validate(Comentario::$rules);
        $formData = $request->except(['_token']);
        Comentario::create($formData);
        return $this->redirectConQueryParams('noticias.verDetalle', $formData['id_noticia']);
    }

    /**
     * Permite eliminar el comentario por el id del mismo
     * El comentario se puede eliminar si el usuario es el que lo escribió , o si es un Admin
     * @param $request
     * @return void
     */
    public function eliminar($id) {
        $comentario = Comentario::find($id);
        $user = Auth::user();
        $this->verificarSiPuedeEliminar($user, $comentario);
        $comentario->delete();
        if ($user->isAdmin()) {
            return $this->redirectConQueryParams('panel.formEditar', $comentario->noticia->id_noticia);
        }
        return $this->redirectConQueryParams('noticias.verDetalle', $comentario->noticia->id_noticia);
    }

    /**
     * Permite editar el comentario del usuario
     * @param $request
     * @param $id
     * @return void
     */
    public function editar(Request $request, $id) {
        $request->validate(Comentario::$rules);
		$input = $request->except(['_token', '_method']);
        $comentario = Comentario::find($id);
        $comentario->fill($input);
        $comentario->save();
        return $this->redirectConQueryParams('noticias.verDetalle', $comentario->noticia->id_noticia);
    }

    /**
     * Permite hacer un redirect a una ruta especifica, enviando el id de la noticia 
     * a la cual pertenece el comentario
     * @param $ruta
     * @param $idNoticia 
     */
    private function redirectConQueryParams($ruta, $idNoticia) {
        return redirect()->route($ruta, ['id' => $idNoticia]);
    }

    /**
     * Permite verificar si el usuario que quiere eliminar el comentario es el que creo el mismo
     * en caso que no lo sea, realiza un redirect, mostrando un mensaje de error que no lo
     * puede eliminar
     * @param $user
     * @param $comentario
     */
    private function verificarSiPuedeEliminar($user, $comentario) {
        if (!$user->isAdmin() && $user->id_usuario != $comentario->usuario->id_usuario) {
            return $this->redirectConQueryParams('noticias.verDetalle', $comentario->noticia->id_noticia)->with('message', 'Usted no puede eliminar un comentario que no creo');
        }
    }

}


        
