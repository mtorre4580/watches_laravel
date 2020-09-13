<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaMarca extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('marca', function (Blueprint $table) {
            $table->increments('id_marca');
            $table->string('nombre', 255);
            $table->string('logo', 100)->nullable();
            $table->string('web', 255)->nullable();
            $table->longText('historia');
            $table->string('origen');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('marca');
    }

}
