<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
    
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        $this->call(CategoriaTableSeeder::class);
        $this->call(NoticiaTableSeeder::class);
        $this->call(UsuarioTableSeeder::class);
        $this->call(MarcaTableSeeder::class);
        $this->call(ComentarioTableSeeder::class);
    }

}
