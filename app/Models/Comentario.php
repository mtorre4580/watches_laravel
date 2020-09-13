<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/*
|--------------------------------------------------------------------------
| Comentario (Model)
|--------------------------------------------------------------------------
|
| Modelo que extiende de Eloquent para realizar el mapeo contra la tabla comentario
*/
class Comentario extends Model {
    
    protected $table = 'comentario';

    protected $primaryKey = 'id_comentario';

    protected $fillable = ['contenido', 'id_noticia', 'id_usuario'];

    protected $casts = ['created_at' => 'date', 'deleted_at' => 'date'];

    public static $rules = ['contenido' => 'required|min:10|max:255', 'id_noticia' => 'required|integer', 'id_usuario' => 'required|integer'];

    /**
     * Permite realizar la asociación contra la tabla usuario (fk)
     */
    public function usuario() {
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id_usuario');
    }

    /**
     * Permite realizar la asociación contra la tabla noticia (fk)
     */
    public function noticia() {
        return $this->belongsTo(Noticia::class, 'id_noticia', 'id_noticia');
    }

}
