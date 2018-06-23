<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'regions';

    public $timestamps = false;

    public function cities(){

        return $this->hasMany('App\City');
    }
}
