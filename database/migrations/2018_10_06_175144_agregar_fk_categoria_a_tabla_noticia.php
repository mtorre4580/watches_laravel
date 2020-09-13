<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarFkCategoriaATablaNoticia extends Migration {
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('noticia', function (Blueprint $table) {
            $table->integer('id_categoria')->unsigned()->change();
            $table->foreign('id_categoria')->references('id_categoria')->on('categoria')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('noticia', function (Blueprint $table) {
            $table->dropForeign(['id_categoria']);
        });
    }
    
}
