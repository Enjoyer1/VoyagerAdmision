<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasantia extends Model
{

    protected $fillable = ['nombre', 'fecha', 'cupos', 'campus', 'carrera_id'];


    public function carreras()
    {
        return $this->belongsTo('App\Carerra');
    }

    public function estudiantes()
    {
        return $this->belongsToMany('App\Estudiante', 'asistencias')->withPivot('asistencia','date')->withTimestamps();
    }

    public function alertAlumno($cantidad, $limite)
    {
        if ($cantidad >= $limite) {
            $cantidadEstudiante = "<span class=\"label label-danger\"> $cantidad / $limite </span>";
        } elseif ($cantidad < $limite && $cantidad >= $limite - 5) {
            $cantidadEstudiante = "<span class=\"label label-warning\"> $cantidad / $limite </span>";
        } else {
            $cantidadEstudiante = "<span class=\"label label-default\"> $cantidad / $limite </span>";
        }
        return $cantidadEstudiante;
    }

    public function getNombreCompletoAttribute()
    {
        return "{$this->nombre} {$this->apellido1} {$this->apellido2}";
    }


}
