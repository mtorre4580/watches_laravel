<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;

class MarcasTest extends TestCase {

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
     * Permite verificar el endpoint GET /api/marcas
     * Status 200 (OK)
     * Cantidad de resultados
     * @return void
     */
    public function testAll() {
        $response = $this->json('get','/api/marcas');
        $response->assertStatus(200);
        $response->assertJsonCount(10);
    }

    /**
     * Permite verificar el endpoint POST /api/marcas
     * Status 200 (OK)
     * @return void
     */
    public function testSave() {
        $request = [
            'nombre' => 'Cartier',
            'logo' => 'cartier.jpg',
            'historia' => 'Cartier fue fundada en París en 1847 por Louis-François Cartier, cuando se hizo cargo del taller de su maestro',
            'origen' => 'Francia',
            'web' => 'https://www.cartier.com'
        ];
        $response = $this->json('post','api/marcas', $request);
        $response->assertStatus(200);
        $response->assertJson(['id' => 11]);
    }

    /**
     * Permite verificar el endpoint POST /api/marcas
     * Status 400 (BadRequest)
     * @return void
     */
    public function testInvalidSave() {
        $request = ['logo' => 'cartier.jpg'];
        $response = $this->json('post','api/marcas', $request);
        $response->assertStatus(400);
        $response->assertJson([
            'logo' => ['El campo logo es obligatorio.'], 
            'web' => ['El campo web es obligatorio.'],
            'historia' => ['El campo historia es obligatorio.'],
            'origen' => ['El campo origen es obligatorio.']
        ]);
    }

    /**
     * Permite verificar el endpoint GET /api/marcas/{id}
     * Status 200 (OK)
     * @return void
     */
    public function testFindById() {
        $response = $this->json('get','api/marcas/3');
        $response->assertStatus(200);
        $response->assertJson([
            'id_marca' => 3,
            'nombre' => 'Patek Philippe',
            'logo' => 'Patek_Philippe.png',
            'web' => 'https://www.patek.com/es/coleccion/nuevos-modelos-2018',
            'historia' => 'Otra marca suiza, esta fue fundada en 1851 y ha lanzado al mercado algunos de los mecanismos más complicados en la historia de la relojería. Con una marcada línea clásica, los Patek Philippe han sido de los favoritos de la realeza europea durante años.',
            'origen' => 'Suiza',
        ]);
    }

    /**
     * Permite verificar el endpoint GET /api/marcas/{id}
     * Status 400 (BadRequest) no existe el id
     * @return void
     */
    public function testInvalidFindById() {
        $response = $this->json('get','api/marcas/1123');
        $response->assertStatus(400);
        $response->assertJson(['msg' => 'El id no existe']);
    }

    /**
     * Permite verificar el endpoint DELETE /api/marcas/{id}
     * Status 200 (OK)
     */
    public function testDelete() {
        $response = $this->json('delete', 'api/marcas/4');
        $response->assertStatus(200);
    }

    /**
     * Permite verificar el endpoint DELETE /api/marcas/{id}
     * Status 400 (BadRequest) no existe el id
     * @return void
     */
    public function testInvalidDelete() {
        $response = $this->json('delete','api/marcas/11234');
        $response->assertStatus(400);
        $response->assertJson(['msg' => 'El id no existe']);
    }

    /**
     * Permite verificar el endpoint PUT /api/marcas/{id}
     * Status 200 (OK)
     * @return void
     */
    public function testUpdate() {
        $request = [
            'id_marca' => 5,
            'nombre' => 'Chopard, Modificado',
            'origen' => 'México',
            'logo' => 'Chopard.jpg',
            'web' => 'https://www.chopard.com/intl/',
            'historia' => 'Chopard no sólo es conocida por sus relojes suizos, sino también por sus increíbles piezas de joyería.'
        ];
        $response = $this->json('put','api/marcas/5', $request);
        $response->assertStatus(200);
    }

     /**
     * Permite verificar el endpoint PUT /api/marcas/{id}
     * Status 400 (BadRequest)
     * @return void
     */
    public function invalidUpdate() {
        $request = [
            'nombre' => 'Chopard, Modificado',
        ];
        $response = $this->json('put','api/marcas/5', $request);
        $response->assertStatus(400);
        $response->assertJson([
            'logo' => ['El campo logo es obligatorio.'], 
            'web' => ['El campo web es obligatorio.'], 
            'historia' => ['El campo historia es obligatorio.'], 
            'origen' => ['El campo origen es obligatorio.']
        ]);
    }

}
