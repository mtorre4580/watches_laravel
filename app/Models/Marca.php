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

    protected $fillable = ['nombre', 'logo', 'web', 'historia', 'origen'];

    public static $rules = ['nombre' => 'required|min:3', 'logo' => 'required|string', 'web' => 'required|string', 'historia' => 'required|string', 'origen' => 'required|string'];

    public static $errorMessages = [
      'nombre.required' => 'El nombre es obligatorio',
      'nombre.min' => 'El nombre debe tener un mínimo 3 carácteres',
      'logo.string' => 'El logo debe ser texto',
      'web.string' => 'La web debe ser texto',
      'historia.required' => 'La historia es obligatoria',
      'historia.string' => 'La historia debe ser texto',
      'origen.required' => 'El origen es obligatorio',
      'origen.string' => 'El origen debe ser texto',
    ];

    /**
     * Permite obtener el top 5 de las marcas, por ahora lo simulo trayendo sólo las que tienen imágenes
     * @return Marca
     */
    public static function obtenerTop5Marcas() {
        return Marca::where('logo', '<>', '')->get();
    }

}
