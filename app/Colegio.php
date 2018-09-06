<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{

    protected $fillable = ['nombre','celular','direccion','ciudad_id'];


    public function ciudades()
    {
        return $this->belongsTo('App\Ciudad');
    }

    public function encargados()
    {
        return $this->hasMany('App\Encargado');
    }
    public function programas()
    {
        return $this->belongsToMany('App\Programa')->withPivot('file','fecha_inicio');;
    }
}
