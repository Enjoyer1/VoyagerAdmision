<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';

    public $timestamps = false;

    public function regions(){

        return $this->belongsTo('App\Region');
    }
}
