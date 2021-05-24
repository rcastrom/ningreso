<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos2 extends Model
{
    //Indico que la conección es vía spe
    protected $connection='spe';
    protected $table='parametros';
}
