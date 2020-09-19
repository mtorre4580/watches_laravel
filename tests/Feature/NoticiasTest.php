<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Artisan;

class NoticiasTest extends TestCase {

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
     * Permite verificar el endpoint GET /api/noticias
     * Status 200 (OK)
     * Cantidad de resultados
     * @return void
     */
    public function testAll() {
        $response = $this->json('get','/api/noticias');
        $response->assertStatus(200);
        $response->assertJsonCount(5);
    }

    /**
     * Permite verificar el endpoint POST /api/noticias
     * Status 200 (OK)
     * @return void
     */
    public function testSave() {
        $request = [
            'titulo' => 'Nuevo Longines 2020',
            'contenido' => 'El nuevo longines es una nueva edición de la version de 1967 el mismo incluye 2 versiones, todavía no se encuentra disponible el precio para el público',
            'id_categoria' => 1,
        ];
        $response = $this->json('post','api/noticias', $request);
        $response->assertStatus(200);
        $response->assertJson(['id' => 6]);
    }

    /**
     * Permite verificar el endpoint POST /api/noticias
     * Status 400 (BadRequest)
     * @return void
     */
    public function testInvalidSave() {
        $request = ['titulo' => 'Nuevo Longines 2020'];
        $response = $this->json('post','api/noticias', $request);
        $response->assertStatus(400);
        $response->assertJson([
            'titulo' => ['El campo titulo es obligatorio.'],
            'id_categoria' => ['El campo id categoria es obligatorio.'],
            'contenido' => ['El campo contenido es obligatorio.']
        ]);
    }

    /**
     * Permite verificar el endpoint GET /api/noticias/{id}
     * Status 200 (OK)
     * @return void
     */
    public function testFindById() {
        $response = $this->json('get','api/noticias/2');
        $response->assertStatus(200);
        $response->assertJson([
            'id_noticia' => 2,
            'titulo' => 'Bulova Pilot, otra vez',
            'fecha_publicacion' => '2020-09-13 00:00:00',
            'contenido' => 'El histórico Reloj de la Luna de Bulova tiene una historia larga y fascinante, aunque un tanto complicada. El reloj fue hecho para el astronauta David Scott, quien lo usó en la misión Apollo 15. Su reloj apareció en 2015, y más tarde ese año se vendió por el precio de us$ 1,300,000 en una subasta. El año pasado, el colaborador de Worn & Wound Hung Doan hizo una profunda inmersión en el reloj.',
            'imagen' => 'bulova-pilot.jpg',
            'id_categoria' => 1,
            'comentarios' => [
                   [
                    'id_comentario' => 1,
                    'contenido' => 'Es un reloj con historia, uno de los cuales fue al espacio, lo malo es que es quartz y no manual',
                    'id_noticia' => 2,
                    'id_usuario' => 2,
                   ]
            ]
        ]);
    }

    /**
     * Permite verificar el endpoint GET /api/noticias/{id}
     * Status 404 (NotFound) no existe el id
     * @return void
     */
    public function testInvalidFindById() {
        $response = $this->json('get','api/noticias/1');
        $response->assertStatus(404);
        $response->assertJson(['msg' => 'El id no existe']);
    }

    /**
     * Permite verificar el endpoint DELETE /api/noticias/{id}
     * Status 200 (OK)
     */
    public function testDelete() {
        $response = $this->json('delete', 'api/noticias/1');
        $response->assertStatus(200);
    }

    /**
     * Permite verificar el endpoint DELETE /api/noticias/{id}
     * Status 404 (NotFound) no existe el id
     * @return void
     */
    public function testInvalidDelete() {
        $response = $this->json('delete','api/noticias/1');
        $response->assertStatus(404);
        $response->assertJson(['msg' => 'El id no existe']);
    }

    /**
     * Permite verificar el endpoint PUT /api/noticias/{id}
     * Status 200 (OK)
     * @return void
     */
    public function testUpdate() {
        $request = [
            'titulo' => 'Nuevo Longines 2020 Modificado',
            'contenido' => 'Todavía no se encuentra disponible el precio para el público en general',
            'id_categoria' => 3,
        ];
        $response = $this->json('put','api/noticias/1', $request);
        $response->assertStatus(200);
    }

     /**
     * Permite verificar el endpoint PUT /api/noticias/{id}
     * Status 400 (BadRequest)
     * @return void
     */
    public function invalidUpdate() {
        $request = [
            'titulo' => 'Nuevo Longines 2020 Modificado',
            'id_categoria' => '333333',
        ];
        $response = $this->json('put','api/noticias/1', $request);
        $response->assertStatus(400);
        $response->assertJson([
            'id_categoria' => ['El campo id categoria debe ser un número entero.'],
            'contenido' => ['El campo contenido es obligatorio.']
        ]);
    }

}
