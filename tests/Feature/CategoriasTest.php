<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;

class CategoriasTest extends TestCase {

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
     * Permite verificar el endpoint GET /api/categorias
     * Status 200 (OK)
     * Cantidad de resultados
     * @return void
     */
    public function testAll() {
        $response = $this->json('get','/api/categorias');
        $response->assertStatus(200);
        $response->assertJsonCount(5);
    }

    /**
     * Permite verificar el endpoint POST /api/categorias
     * Status 200 (OK)
     * @return void
     */
    public function testSave() {
        $request = array('descripcion' => 'Homemade');
        $response = $this->json('post','api/categorias', $request);
        $response->assertStatus(200);
        $response->assertJson(['id' => 6]);
    }

    /**
     * Permite verificar el endpoint POST /api/categorias
     * Status 400 (BadRequest)
     * @return void
     */
    public function testInvalidSave() {
        $request = array('descripcion' => '');
        $response = $this->json('post','api/categorias', $request);
        $response->assertStatus(400);
        $response->assertJson(['descripcion' => ['El campo descripcion es obligatorio.']]);
    }

    /**
     * Permite verificar el endpoint GET /api/categorias/{id}
     * Status 200 (OK)
     * @return void
     */
    public function testFindById() {
        $response = $this->json('get','api/categorias/2');
        $response->assertStatus(200);
        $response->assertJson(['id_categoria' => 2, 'descripcion' => 'Eventos']);
    }
    
    /**
     * Permite verificar el endpoint GET /api/categorias/{id}
     * Status 400 (BadRequest) no existe el id
     * @return void
     */
    public function testInvalidFindById() {
        $response = $this->json('get','api/categorias/1123');
        $response->assertStatus(404);
        $response->assertJson(['msg' => 'El id no existe']);
    }

    /**
     * Permite verificar el endpoint DELETE /api/categorias/{id}
     * Status 200 (OK)
     */
    public function testDelete() {
        $response = $this->json('delete', 'api/categorias/5');
        $response->assertStatus(200);
    }

    /**
     * Permite verificar el endpoint DELETE /api/categorias/{id}
     * Status 404 (NotFound) no existe el id
     * @return void
     */
    public function testInvalidDelete() {
        $response = $this->json('delete','api/categorias/11234');
        $response->assertStatus(404);
        $response->assertJson(['msg' => 'El id no existe']);
    }

    /**
     * Permite verificar el endpoint PUT /api/categorias/{id}
     * Status 200 (OK)
     * @return void
     */
    public function testUpdate() {
        $request = array('id_categoria' => 4, 'descripcion' => 'Descripción modificada...');
        $response = $this->json('put','api/categorias/4', $request);
        $response->assertStatus(200);
    }
    
    /**
     * Permite verificar el endpoint PUT /api/categorias/{id}
     * Status 400 (BadRequest)
     * @return void
     */
    public function invalidUpdate() {
        $request = array('id_categoria' => 4, 'descripcion' => '');
        $response = $this->json('put','api/categorias/4', $request);
        $response->assertStatus(400);
        $response->assertJson(['descripcion' => ['El campo descripcion es obligatorio.']]);
    }

}
