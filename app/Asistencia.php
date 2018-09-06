<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{

    protected  $fillable=['estudiante_id','pasantia_id','date','asistencia'];
}
