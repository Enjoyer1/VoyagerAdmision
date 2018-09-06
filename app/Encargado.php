<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Encargado extends Model
{

    protected $fillable = ['nombre','apellido1','apellido2','cargo','email','celular','colegio_id'];

    public function colegios()
    {
        return  $this->belongsTo('App\Colegio');
    }

}
