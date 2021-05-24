<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeQuien extends Model
{
    ///Indico que la conección es vía Sybase
    protected $connection='sybase';
    protected $table='sol_ds_de_quien_dependes';
}
