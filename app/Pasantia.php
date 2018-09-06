<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasantia extends Model
{

    protected $fillable=['nombre','fecha','cupos','campus','carrera_id'];

    public function carreras()
    {
        return  $this->belongsTo('App\Carerra');
    }
    public function estudiantes()
    {
        return  $this->belongsToMany('App\Estudiante','Asistencias');
    }

}
