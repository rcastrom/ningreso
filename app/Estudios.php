<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudios extends Model
{
    //Indico que la conección es vía Sybase
    protected $connection='sybase';
    protected $table='sol_ds_estudios_padres';
}
