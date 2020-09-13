<?php

use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder {
	
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('categoria')->insert([
        	'id_categoria' => 1,
        	'descripcion' => 'Reviews',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
    	]);
        DB::table('categoria')->insert([
        	'id_categoria' => 2,
        	'descripcion' => 'Eventos',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categoria')->insert([
        	'id_categoria' => 3,
        	'descripcion' => 'Unboxing',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('categoria')->insert([
        	'id_categoria' => 4,
        	'descripcion' => 'Vintage',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
		]);
		DB::table('categoria')->insert([
        	'id_categoria' => 5,
        	'descripcion' => 'General',
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
    	]);
	}
	
}
