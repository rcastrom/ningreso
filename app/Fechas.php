<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fechas extends Model
{
    //Indico que la conección es vía Sybase
    protected $connection='sybase';
    protected $table='fichas_configuracion';
}
