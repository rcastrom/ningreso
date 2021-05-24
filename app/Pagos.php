<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
     //Indico que la conección es vía spe
     protected $connection='spe';
     protected $table='conceptos';
}
