<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuarioTableSeeder extends Seeder {
    
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('usuarios')->insert([
        	'id_usuario' => '1',
            'email' => 'mtorre4580@gmail.com',
            'is_admin' => 1,
        	'password' => Hash::make('123456'),
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('usuarios')->insert([
        	'id_usuario' => '2',
            'email' => 'coty81@gmail.com',
            'is_admin' => 0,
        	'password' => Hash::make('123456'),
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('usuarios')->insert([
        	'id_usuario' => '3',
            'email' => 'juanbelloti@outlook.com',
            'is_admin' => 0,
        	'password' => Hash::make('123456'),
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('usuarios')->insert([
        	'id_usuario' => '4',
            'email' => 'belu67@outlook.com',
            'is_admin' => 0,
        	'password' => Hash::make('123456'),
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('usuarios')->insert([
        	'id_usuario' => '5',
            'email' => 'facuorologi@outlook.com',
            'is_admin' => 0,
        	'password' => Hash::make('123456'),
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
        ]);
        DB::table('usuarios')->insert([
        	'id_usuario' => '6',
            'email' => 'micavic@outlook.com',
            'is_admin' => 0,
        	'password' => Hash::make('123456'),
        	'created_at' => date('Y-m-d H:i:s'),
        	'updated_at' => date('Y-m-d H:i:s'),
    	]);
    }

}
