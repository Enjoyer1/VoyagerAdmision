<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateColegiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colegios', function (Blueprint $table) {

                $table->increments('id');
                $table->string('nombre');
                $table->string('celular','20')->nullable();
                $table->string('direccion')->nullable();
                $table->integer('ciudad_id')->unsigned()->nullable();
                $table->foreign('ciudad_id')->references('id')->on('ciudades')->onDelete('cascade');
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
        Schema::dropIfExists('colegios');
    }
}
