<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Programa extends Model
{

    protected $fillable = ['nombre','descripcion'];

    public function colegios()
    {
        return $this->belongsToMany('App\Colegio')->withPivot('file','fecha_inicio');
    }
}
