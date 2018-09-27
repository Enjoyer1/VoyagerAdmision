<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasantiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasantias', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre');
            $table->date('fecha')->nullable();
            $table->unsignedInteger('cupos');
            $table->enum('campus',['Talca','Curico','Santiago']);
            $table->boolean('estado')->default(false);
            $table->integer('carrera_id')->unsigned()->nullable();
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('set null');

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
        Schema::dropIfExists('internships');
    }
}
