<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asistencia extends Model
{
    protected  $table="asistencias";

    protected  $fillable=['estudiante_id','pasantia_id','date','asistencia'];
}
