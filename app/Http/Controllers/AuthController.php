<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use Auth;
use Hash;

/*
|--------------------------------------------------------------------------
| Auth (Controller)
|--------------------------------------------------------------------------
|
| Este controller se encarga de autenticar a los usuarios utilizando la case Auth, validar los campos
| Cerrar la sesión del usuario, los redirect del mismo, render de la vista
*/
class AuthController extends Controller {
   
    /**
     * Realiza el render de la vista que actua como index 
     * @return View
     */
    public function index() {
        return view('auth.login');
    }

    /**
     * Realiza el render de la vista que permite registrar a los usuarios
     * @return View
     */
    public function doRegistrar() {
        return view('auth.registrar');
    }

    /**
     * Autentica al usuario, valida el request recibido
     * si no es correcto realiza el redirect correspondiente
     * @param Request $request
     * @return View
     */
    public function autenticar(Request $request) {
        $request->validate(Usuario::$rules);
        $input = $request->except(['_token']);
        if(Auth::attempt(['password' => $input['password'], 'email' => $input['email']])) {
    		return $this->redirectConData('noticias.index', 'message', 'Bienvenido!');
    	}
        return $this->redirectConData('login', 'loginError', 'Los datos ingresados no son válidos');
    }

    /**
     * Registra a los usuarios de la aplicación, valida los datos recibidos
     * da de alta al usuario
     * @param Request $request
     * @return View
     */
    public function registrar(Request $request) {
        $request->validate(Usuario::$rules);
        $formData = $request->except(['_token']);
        $email = $formData['email'];
        if (!$this->emailEnUso($email)) {
            $formData = $this->hashearPasswordSetDefaultUsuario($formData);
            Usuario::create($formData);
            return $this->redirectConData('login', 'message', ['titulo' => 'Cuenta creada', 'mensaje' => 'Su cuenta se creo correctamente!']);
        }
        return $this->redirectConData('registrar', 'emailEnUso', "El email $email ya se encuentra en uso, elija otro");
    }

    /**
     * Cierra la sesión del usuario 
     * realiza el redirect a la view login
     * @return View
     */
    public function cerrarSesion() {
        Auth::logout();
        return $this->redirectConData('login', 'message',  [
            'titulo' => 'Sesión finalizada', 
            'mensaje' => 'La sesión se cerró correctamente, que tengas un buen día'
        ]);
    }

    /**
     * Permite verificar si el email dado esta en uso por otro usuario
     * @param string $email
     * @return boolean
     */
    private function emailEnUso($email) {
        $usuario = Usuario::where('email', $email)->first();
        return isset($usuario);
    }

    /**
     * Permite hacer el encoding del password, y setear el flag de admin en false...
     * @param array $formData
     * @return array
     */
    private function hashearPasswordSetDefaultUsuario($formData) {
        $formData['password'] = Hash::make($formData['password']);
        $formData['is_admin'] = 0;
        return $formData;
    }

    /**
     * Permite hacer un redirect a una ruta especifica, enviando un mensaje ...
     * @param string $ruta
     * @param string $msg
     * @param array $data
     * @return View
     */
    private function redirectConData($ruta, $msg, $data) {
    	return redirect()->route($ruta)->with($msg, $data);
    }

}
