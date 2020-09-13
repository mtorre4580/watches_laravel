<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarFkNoticiaATablaComentario extends Migration {
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('comentario', function (Blueprint $table) {
            $table->integer('id_noticia')->unsigned()->change();
            $table->foreign('id_noticia')->references('id_noticia')->on('noticia')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('comentario', function (Blueprint $table) {
            $table->dropForeign(['id_noticia']);
        });
    }

}
