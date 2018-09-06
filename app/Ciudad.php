<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudades';

    public $timestamps = false;

    protected $fillable = ['nombre','nombre_region'];


    public function colegios()
    {
        return $this->hasMany('App\Colegio');
    }

}
