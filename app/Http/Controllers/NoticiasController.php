<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Noticia;
use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Comentario;
use Auth;

/*
|--------------------------------------------------------------------------
| Noticias (Controller)
|--------------------------------------------------------------------------
|
| Este controller muestra toda la información relacionada con las noticias
| realiza los render de las vistas, redirect, consulta información de las noticias, categorías
| Actua con las acciones de una API básica
*/
class NoticiasController extends Controller {

    /**
     * Realiza el render de la vista que actua como index 
     * @return View
     */
    public function index() {
        $noticias = Noticia::with('categoria')->get();
        return $this->mostrarViewConCategorias('noticias.index', $noticias);
    }

    /**
     * Realiza el render de la vista que muestra el detalle de la noticia
     * recibe el id de la noticia, devuelve tambien los comentarios asociados a esa noticia
     * @param int $id 
     * @return View
     */
    public function verDetalle($id) {
        $noticia = Noticia::find($id);
        $comentarios = Comentario::where('id_noticia', $id)->get();
        return view('noticias.detalle', compact('noticia', 'comentarios'));
    }

    /**
     * Permite filtrar las categorías por el id de categoría recibido
     * renderiza nuevamente la view con los datos filtrados
     * @param int $idCategoria 
     * @return View
     */
    public function filtrarPorCategoria($idCategoria) {
        $noticias = Noticia::where('id_categoria', $idCategoria)->get();
        return $this->mostrarViewConCategorias('noticias.index', $noticias);
    }

     /**
     * Permite buscar las noticias por el query param recibido "search"
     * Actualmente realiza un like solo en contenido, no en título de la noticia
     * @param Request $request
     * @return View
     */
    public function buscar(Request $request) {
        $search = $request->input('search');
        $noticias = Noticia::where('contenido', 'like', "%$search%")->get();
        $user = Auth::user();
        if ($user->isAdmin()) {
            return $this->mostrarViewConCategorias('panel.index', $noticias);
        }
        return $this->mostrarViewConCategorias('noticias.index', $noticias);
    }

     /**
     * Permite realizar la acción de editar una noticia
     * recibe el id de la noticia y el request, valida los datos
     * @param Request $request
     * @param int $id
     * @return View
     */
    public function editar(Request $request, $id) {
		$request->validate(Noticia::$rules);
        $formData = $request->except(['_token', '_method']);
        $formData = $this->subirImagenSiPosee($request, $formData);
		$noticia = Noticia::find($id);
        $noticia->fill($formData);
        $noticia->fecha_publicacion = date('Y-m-d H:i:s');
        $noticia->save();
        return $this->redirectConMensaje('Se actualizó correctamente la noticia <b>'.$noticia->titulo.'</b>');
    }
    
    /**
     * Permite eliminar una noticia por el id de la misma
     * @param int $id
     * @return View
     */
    public function eliminar($id) {
		$noticia = Noticia::find($id);
        $noticia->delete();    
        $comentarios = Comentario::where('id_noticia', $id)->get();
        if ($comentarios) {
            $this->eliminarComentarios($comentarios);
        }
        return $this->redirectConMensaje('Se eliminó correctamente la noticia <b>'.$noticia->titulo.'</b>');
    }
    
    /**
     * Permite agregar una noticia, hacer un insert en la tabla
     * valida los datos, guarda la imagen si existe, sino muestra una por defecto
     * agrega la fecha del sistema como fecha de publicación al momento de hacer el save...
     * @param Request $request
     * @return View
     */
    public function agregar(Request $request) {
		$request->validate(Noticia::$rules);
        $formData = $request->except(['_token']);
        $formData = $this->subirImagenSiPosee($request, $formData);
        $formData['fecha_publicacion'] =  date('Y-m-d H:i:s');
        Noticia::create($formData);
        return $this->redirectConMensaje('La noticia se agregó correctamente <b>' . $formData['titulo'] . "</b>");
    }

    /**
     * Eliminar los comentarios de la publicación
     * @param $comentarios
     * @return void
     */
    private function eliminarComentarios($comentarios) {
        foreach($comentarios as $comentario) {
            $comentario->delete();
        }
    }

    /**
     * Permite agregar la imagen si existe
     * @param Request $request
     * @param array $formData
     * @return array
     */
    private function subirImagenSiPosee($request, $formData) {
        if($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombreImagen = time() . "." . $imagen->extension();
            $imagen->move(public_path('./images'), $nombreImagen);
            $formData['imagen'] = $nombreImagen;
        } else {
            $formData['imagen'] = 'sin-imagen.png';
        }
        return $formData;
    }

    /**
     * Permite realizar el redirect con un mensaje para manipular desde la view
     * @param string $mensaje
     * @return View
     */
    private function redirectConMensaje($mensaje) {
        return redirect()->route('panel.index')->with('message', $mensaje);
    }

    /**
     * Método para realizar el redirect con los datos ya cargados que necesita
     * la vista (categorías, noticias)
     * @param string $view
     * @param array $noticias
     * @return View
     */
    private function mostrarViewConCategorias($view, $noticias) {
        $categorias = Categoria::all();
        $marcas = Marca::obtenerTop5Marcas();
        return view($view, [
            'noticias' => $noticias,
            'categorias' => $categorias,
            'marcas' => $marcas
        ]);
    }

}
