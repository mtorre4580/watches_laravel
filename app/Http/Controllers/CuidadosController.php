<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Cuidados (Controller)
|--------------------------------------------------------------------------
|
| Este controller muestra la información relacionada a los cuidados de los relojes
| controller dummy no tiene logica, solo realiza el render
*/
class CuidadosController extends Controller {
   
    /**
     * Realiza el render de la vista que actua como index 
     * @return void
     */
    public function index() {
        return view('cuidados.index');
    }
    
}
