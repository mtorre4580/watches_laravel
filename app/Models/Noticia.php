<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/*
|--------------------------------------------------------------------------
| Noticia (Model)
|--------------------------------------------------------------------------
|
| Modelo que extiende de Eloquent para realizar el mapeo contra la tabla noticia
| $table : nombre de la tabla
| $primaryKey: clave primaria de la tabla
| $fillable: campos que permiten guardarse en conjunto
| $cast: campos para castear al realizar el get
| $rules: reglas de validación
*/
class Noticia extends Model {

    use SoftDeletes;

    protected $table = 'noticia';

    protected $primaryKey = 'id_noticia';

    protected $fillable = ['titulo', 'fecha_publicacion', 'contenido', 'imagen', 'id_categoria'];
    
    protected $casts = ['fecha_publicacion' => 'date', 'deleted_at' => 'date'];

    public static $rules = ['titulo' => 'required|min:3', 'id_categoria' => 'required|integer', 'contenido' => 'required|min:40'];

    public static $errorMessages = [
      'titulo.required' => 'El título es obligatorio',
      'titulo.min' => 'El título debe tener un mínimo 3 carácteres',
      'id_categoria.required'=> 'El id de la categoría es obligatorio',
      'id_categoria.integer' => 'El id de la categoría debe ser un número',
      'contenido.required' => 'El contenido es obligatorio',
      'contenido.min' => 'El contenido debe tener un mínimo de 40 carácteres',
    ];

    /**
     * Permite realizar la asociación contra la tabla categoria (fk)
     */
    public function categoria() {
		  return $this->belongsTo(Categoria::class, 'id_categoria', 'id_categoria');
    }

    /**
     * Permite mostrar un resumen del contenido, limitando la cantidad a mostrar
     * @param $cantidad
     * @return string
     */
    public function mostrarResumenContenido($cantidad) {
      return str_limit($this->contenido, $cantidad, '...');
    }

}
