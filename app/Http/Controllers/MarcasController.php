<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Marca;

/*
|--------------------------------------------------------------------------
| Marcas (Controller)
|--------------------------------------------------------------------------
|
| Este controller muestra la información de la sección marcas
| 
*/
class MarcasController extends Controller {

    /**
     * Realiza el render de la vista que actua como index 
     * Tomo sólo las marcas con imágenes
     * @return void
     */
    public function index() {
        $marcas = Marca::obtenerTop5Marcas();
        return view('marcas.index', compact('marcas'));
    }

}
