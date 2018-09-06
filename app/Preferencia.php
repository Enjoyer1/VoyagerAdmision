<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Preferencia extends Model

{


    protected  $fillable=['estudiante_id','carrera_id','posicion'];
}
