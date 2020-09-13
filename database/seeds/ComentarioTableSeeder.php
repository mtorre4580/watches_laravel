<?php

use Illuminate\Database\Seeder;

class ComentarioTableSeeder extends Seeder {
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('comentario')->insert([
        	'id_comentario' => 1,
            'contenido' => 'Es un reloj con historia, uno de los cuales fue al espacio, lo malo es que es quartz y no manual',
            'id_usuario' => '2',
            'id_noticia' => '2',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('comentario')->insert([
        	'id_comentario' => 2,
            'contenido' => 'La verdad que por el precio no hay que decirle nada, estamos teniendo en nuestras manos un reloj con historia, posee cristal de zafiro, coincido con los comentarios de arriba ojala saquen una version a cuerda o auto.',
            'id_usuario' => '6',
            'id_noticia' => '5',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('comentario')->insert([
        	'id_comentario' => 3,
            'contenido' => 'Me encantó este reloj no hay nada que criticarle, mi próxima compra para este año!',
            'id_usuario' => '5',
            'id_noticia' => '3',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
    	]);
    }

}
