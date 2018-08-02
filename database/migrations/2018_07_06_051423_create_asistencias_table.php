<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsistenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asistencias', function (Blueprint $table) {
            $table->increments('id');


            $table->integer('estudiante_id')->unsigned()->nullable();
            $table->foreign('estudiante_id')->references('id')->on('estudiantes')->onDelete('cascade');

            $table->integer('pasantia_id')->unsigned()->nullable();
            $table->foreign('pasantia_id')->references('id')->on('pasantias')->onDelete('cascade');


            $table->enum('asistencia',['Sí', 'No']);
            $table->date('date');
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
        Schema::dropIfExists('asistencias');
    }
}
