<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AgregarFkUsuarioATablaComentario extends Migration {
    
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('comentario', function (Blueprint $table) {
            $table->integer('id_usuario')->unsigned()->change();
            $table->foreign('id_usuario')->references('id_usuario')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('comentario', function (Blueprint $table) {
            $table->dropForeign(['id_usuario']);
        });
    }

}
