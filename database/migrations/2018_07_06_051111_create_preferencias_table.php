<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferencias', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('estudiante_id')->unsigned()->nullable();
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');

            $table->integer('carrera_id')->unsigned()->nullable();
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');

            $table->integer('posición')->unsigned();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preferencias');
    }
}
