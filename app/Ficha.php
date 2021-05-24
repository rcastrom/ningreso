<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ficha extends Model
{
    //Indico que la conección es vía Sybase
    protected $connection='sybase';
    protected $table='parametros';
}
