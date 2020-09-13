<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*
|--------------------------------------------------------------------------
| Marca (Model)
|--------------------------------------------------------------------------
|
| Modelo que extiende de Eloquent para realizar el mapeo contra la tabla marca
| Contenido de la marca, historia, origen, etc
*/
class Marca extends Model {

    protected $table = 'marca';

    protected $primaryKey = 'id_marca';

    /**
     * Permite obtener el top 5 de las marcas, por ahora lo simulo trayendo sólo las que tienen imágenes
     */
    public static function obtenerTop5Marcas() {
        return Marca::where('logo', '<>', '')->get();
    }

}
