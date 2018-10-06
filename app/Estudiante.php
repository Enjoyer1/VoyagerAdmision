<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $fillable = ['nombre','apellido1','apellido2','genero','RUN','email','celular','colegio_id','curso_id'];

    public $additional_attributes = ['nombre_completo'];


    public function colegios()
    {
        return  $this->belongsTo('App\Colegio');
    }

    public function cursos()
    {
        return  $this->belongsTo('App\Curso');
    }
    public function carreras()
    {
        return  $this->belongsToMany('App\Carrera','Preferencias')->withPivot('posicion');
    }
    public function pasantias()
    {
        return  $this->belongsToMany('App\Pasantia','asistencias')->withPivot('asistencia','date')->withTimestamps();
    }



    public function getNombreCompletoAttribute()
    {
        return "{$this->nombre} {$this->apellido1} {$this->apellido2}";
    }
}
