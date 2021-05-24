<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SocioEcono extends Model
{
    //Indico que la conección es vía Sybase
    protected $connection='sybase';
    protected $table='sol_ficha_ds';
}
