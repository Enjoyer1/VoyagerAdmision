<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $fillable = ['id_carrera','nombre','correo_encargado'];

    public function estudiantes()
    {
        return  $this->belongsToMany('App\Estudiante','Preferencias')->withPivot('posicion');
    }

    public function pasantias()
    {
        return  $this->hasMany('App\Pasantia');
    }

}
