<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreFicha3 extends Model
{
    //Indico que la conección es vía Sybase
    protected $connection='sybase';
    protected $table='fichas_sol_aspirantes';
}