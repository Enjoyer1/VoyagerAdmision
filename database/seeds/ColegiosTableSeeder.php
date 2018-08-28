<?php

use Illuminate\Database\Seeder;

class ColegiosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::create('colegios', function (Blueprint $table) {
        $table->increments('id');
        $table->string('nombre');
        $table->string('celular','20')->nullable();
        $table->string('dirección')->nullable();

        $table->integer('ciudad_id')->unsigned()->nullable();
        $table->foreign('ciudad_id')->references('id')->on('ciudades')->onDelete('cascade');

        $table->timestamps();
    }
}
