<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VivesActual extends Model
{
    //Indico que la conección es vía Sybase
    protected $connection='sybase';
    protected $table='sol_ds_quien_vives_actual';
}
