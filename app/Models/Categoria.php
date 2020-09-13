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

}
