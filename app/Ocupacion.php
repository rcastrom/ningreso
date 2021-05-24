<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocupacion extends Model
{
    //Indico que la conección es vía Sybase
    protected $connection='sybase';
    protected $table='sol_ds_ocupacion_padres';
}
