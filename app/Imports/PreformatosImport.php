<?php

namespace App\Imports;

use App\Preformato;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
//use Maatwebsite\Excel\Concerns\ToCollection;

class PreformatosImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Preformato([
            'nombre'=>$row['nombre'],
            'apellidos'=>$row['apellidos'],
            'curp'=>$row['curp'],
            'correo'=>$row['correo'],
            'creado'=>$row['creado'],
            'fcreacion'=>$row['created_at']
        ]);
    }
}
