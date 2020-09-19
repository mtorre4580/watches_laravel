<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*
|--------------------------------------------------------------------------
| Categoria (Model)
|--------------------------------------------------------------------------
|
| Modelo que extiende de Eloquent para realizar el mapeo contra la tabla categoría
*/
class Categoria extends Model {
    
    protected $table = 'categoria';

    protected $primaryKey = 'id_categoria';

    protected $fillable = ['descripcion'];

    public static $rules = ['descripcion' => 'required|min:3'];

    public static $errorMessages = [
      'descripcion.required' => 'La descripción es obligatoria',
      'descripcion.min' => 'La descripción debe tener un mínimo 3 carácteres',
    ];

}
