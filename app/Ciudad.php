<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    protected $table = 'ciudades';

    public $timestamps = false;

    public function colegio()
    {
        return $this->hasMany('App\Colegio');
    }

}
