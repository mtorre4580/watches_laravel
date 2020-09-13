<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/*
|--------------------------------------------------------------------------
| Usuario (Model)
|--------------------------------------------------------------------------
|
| Modelo que extiende de Authenticatable para poder utilizar los métodos de auth
| $table : nombre de la tabla
| $primaryKey: clave primaria de la tabla
| $fillable: campos que permiten guardarse en conjunto
| $cast: campos para castear al realizar el get
| $rules: reglas de validación
*/
class Usuario extends Authenticatable {
	
	use Notifiable;

    protected $table = 'usuarios';
    
    protected $primaryKey = 'id_usuario';

    protected $fillable = ['email', 'password', 'is_admin'];

    public static $rules = ['email' => 'required|email', 'password' => 'required|min:6'];

    /**
     * Permite saber si el usuario es un admin, para poder mostrar el panel
     * @return boolean
     */
    public function isAdmin() {
    	return $this->is_admin == 1;
    }

    /**
     * Permite obtener el username del usuario via el email, hago un explode para obtener el nickname
     * @return string
     */
    public function getUsername() {
        return explode('@', $this->email)[0];
    }
    
}
