<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Facades\Voyager;

class Region extends Model
{
    public $timestamps=false;

    public function citys(){

        return $this->hasMany('App\City');
    }
}
