<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColegioPrograma extends Model
{

    protected  $table='colegio_programa';

    protected $fillable = ['colegio_id','programa_id','fecha_inicio','file'];
}
