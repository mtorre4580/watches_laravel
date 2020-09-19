<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Categoria;
use App\Models\Comentario;

/*
|--------------------------------------------------------------------------
| Panel (Controller)
|--------------------------------------------------------------------------
|
| Este controller es aquel que se encarga de mostrar las vistas asociadas al panel del admin
| modificar una noticia, dar de alta a una noticia, o eliminar una noticia
*/
class PanelController extends Controller {

    /**
     * Realiza el render de la vista que actua como index 
     * @return View
     */
    public function index() {
        $noticias = Noticia::with('categoria')->get();
        $categorias = Categoria::all();
        return view('panel.index', compact(['noticias', 'categorias']));
    }

    /**
     * Realiza el render de la vista del formulario para editar una noticia
     * agrega los comentarios que posee la noticia para poder manipularlos en el caso que
     * fuera necesario
     * @return View
     */
    public function formEditar($id) {
        $noticia = Noticia::find($id);
        $categorias = Categoria::all();
        $comentarios = Comentario::where('id_noticia', $id)->get();
		return view('panel.editar', compact('noticia', 'categorias', 'comentarios'));
    }

    /**
     * Realiza el render de la vista del formulario para dar de alta una noticia
     * @return View
     */
    public function formAgregar() {
        $categorias = Categoria::all();
        $noticia = new Noticia;
		return view('panel.agregar', compact('noticia', 'categorias'));
    }

}
