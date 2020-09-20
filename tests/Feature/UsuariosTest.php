<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;

class UsuariosTest extends TestCase {
  
    use RefreshDatabase;

    /**
     * Permite hacer el Seed de la BD para tener los datos en la tabla
     * @return void
     */
    public function setUp() {
        parent::setUp();
        Artisan::call('db:seed');
    }

    /**
     * Permite verificar el endpoint GET /api/usuarios que esta protegido
     * Status 200 (OK)
     * Cantidad de resultados
     * @return void
     */
    public function testAll() {
        $response = $this->withHeaders(['Authorization' => '602A0ABB57D67C562BCDA242A6733514C7AAC60E4B179CC6E7FF6F769371A6DA'])->json('get','/api/usuarios');
        $response->assertStatus(200);
        $response->assertJsonCount(6);
    }

   /**
     * Permite verificar el endpoint GET /api/usuarios que esta protegido
     * Status 401 (Unauthorized)
     * @return void
     */
    public function testInvalidAllWithoutAuth() {
        $response = $this->json('get','/api/usuarios');
        $response->assertStatus(401);
        $response->assertJson(['status' => 'No autorizado']);
    }

    /**
     * Permite verificar el endpoint GET /api/usuarios/{id}
     * Status 200 (OK)
     * @return void
     */
    public function testFindById() {
        $response = $this->withHeaders(['Authorization' => '602A0ABB57D67C562BCDA242A6733514C7AAC60E4B179CC6E7FF6F769371A6DA'])->json('get','/api/usuarios/1');
        $response->assertStatus(200);
        $response->assertJson([
            'id_usuario' => 1,
            'email' => 'mtorre4580@gmail.com',
            'is_admin' => 1,
            'remember_token' => null,
        ]);
    }

    /**
     * Permite verificar el endpoint POST /api/usuarios
     * Status 200 (OK)
     * @return void
     */
    public function testSave() {
        $request = array('email' => 'test1234@gmail.com', 'password' => '123456');
        $response = $this->json('post','api/usuarios', $request);
        $response->assertStatus(200);
    }

    /**
     * Permite verificar el endpoint POST /api/usuarios
     * Status 400 (BadRequest)
     * @return void
     */
    public function testInvalidSave() {
        $request = array('email' => 'test1234@gmail.com');
        $response = $this->json('post','api/usuarios', $request);
        $response->assertStatus(400);
        $response->assertJson(['password' => ['El campo password es obligatorio.']]);
    }

}
