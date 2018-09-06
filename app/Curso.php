<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = ['nombre'];

   public  function estudiantes()
   {
       return $this->hasMany('App\Estudiante');
   }

}