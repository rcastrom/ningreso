<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreFicha2 extends Model
{
    //Indico que la conección es vía Sybase
    protected $connection='sybase';
    protected $table='preficha';
}
