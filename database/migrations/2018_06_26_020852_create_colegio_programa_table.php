<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColegioProgramaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colegio_programa', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('programa_id')->unsigned()->nullable();
            $table->foreign('programa_id')->references('id')->on('programas')->onDelete('cascade');

            $table->integer('colegio_id')->unsigned()->nullable();
            $table->foreign('colegio_id')->references('id')->on('colegios')->onDelete('cascade');

            $table->date('fecha_inicio')->nullable();
            $table->string('file')->nullable();



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
        Schema::dropIfExists('colegio_programa');
    }
}
