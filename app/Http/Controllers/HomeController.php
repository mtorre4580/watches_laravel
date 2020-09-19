<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Home (Controller)
|--------------------------------------------------------------------------
|
| Este controller muestra la información de la sección principal del sitio
| La bienvenida al usuario
*/
class HomeController extends Controller {
    
    /**
     * Realiza el render de la vista que actua como index 
     * @return View
     */
    public function index() {
        return view('home.index');
    }

}
