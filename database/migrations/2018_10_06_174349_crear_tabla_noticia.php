<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaNoticia extends Migration {
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('noticia', function (Blueprint $table) {
            $table->increments('id_noticia');
            $table->string('titulo', 255);
            $table->date('fecha_publicacion');
            $table->longText('contenido');
            $table->string('imagen', 255);
            $table->integer('id_categoria');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('noticia');
    }

}
