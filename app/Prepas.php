<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Prepas extends Model
{
    //Indico que la conección es vía Sybase
    protected $connection='sybase';
    protected $table='preparatorias_de_procedencia';
}
