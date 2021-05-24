<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carreras extends Model
{
    //Indico que la conección es vía Sybase
    protected $connection='sybase';
    protected $table='carreras';
}
