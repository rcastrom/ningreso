<?php

namespace App\Exports;


use App\PreFicha;
use App\Carreras;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


//use Maatwebsite\Excel\Concerns\FromQuery;

class PreformatosExport implements FromCollection,WithHeadings
{
    use Exportable;
    private $periodo;
    private $carrera;

    public function __construct($periodo,$carrera){
        $this->periodo=$periodo;
        $this->carrera=$carrera;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $datos=PreFicha::where('periodo',$this->periodo)
            ->select('no_solicitud','nombre_aspirante','apellido_paterno','apellido_materno','curp','telefono','correo_electronico','carrera_opcion_1','created_at')
            ->get();
        $coleccion = array([]);
        $i=1;
        if($this->carrera=="T"){
            foreach ($datos as $data){
                //$existe=PreFicha::where('periodo',$this->periodo)->where('curp',$data->curp)->count();
                //$ficha=$existe>0?1:0;
                $coleccion[$i]['nombre']=utf8_encode($data->nombre_aspirante);
                $coleccion[$i]['apellidos']=utf8_encode($data->apellido_paterno)." ".utf8_encode($data->apellido_materno);
                $coleccion[$i]['curp']=$data->curp;
                //$leyenda=$ficha==1?"Si":"No";
                //$coleccion[$i]['ficha']=$leyenda;
                //if($existe){
                    //$datos_aspirante=PreFicha::where('periodo',$this->periodo)
                    //    ->where('curp',$data->curp)->first();
                    $carrera_aspira=trim($data->carrera_opcion_1);
                    $ncarrera=Carreras::where('carrera',$carrera_aspira)
                        ->select('nombre_reducido')
                        ->first();
                    $coleccion[$i]['carrera']=utf8_encode($ncarrera->nombre_reducido);
                    $coleccion[$i]['no_ficha']=$data->no_solicitud;
                    $coleccion[$i]['telefono']=is_null($data->telefono)?"NO INDICO":$data->telefono;
                /*}else{
                    $coleccion[$i]['carrera']="Sin informacion";
                    $coleccion[$i]['no_ficha']="NA";
                    $coleccion[$i]['telefono']="S/I";
                }*/
                $coleccion[$i]['correo_personal']=$data->correo_electronico;
                //$coleccion[$i]['correo_ite']="asp".substr($this->periodo,-3)."_".$data->id."@ite.edu.mx";
                $coleccion[$i]['fecha_registro']=$data->created_at;
                $i++;
            }
        }else{
            foreach ($datos as $data){
                /*$existe=PreFicha::where('periodo',$this->periodo)->where('curp',$data->curp)->count();
                $ficha=$existe>0?1:0;
                if($ficha){
                    $datos_aspirante=PreFicha::where('periodo',$this->periodo)
                        ->where('curp',$data->curp)->first();*/
                    $carrera_aspira=trim($data->carrera_opcion_1);
                    if($carrera_aspira==$this->carrera){
                        $coleccion[$i]['nombre']=utf8_encode($data->nombre_aspirante);
                        $coleccion[$i]['apellidos']=utf8_encode($data->apellido_paterno)." ".utf8_encode($data->apellido_materno);
                        $coleccion[$i]['curp']=$data->curp;
                        //$leyenda=$ficha==1?"Si":"No";
                        //$coleccion[$i]['ficha']=$leyenda;
                        $ncarrera=Carreras::where('carrera',$carrera_aspira)
                            ->select('nombre_reducido')
                            ->first();
                        $coleccion[$i]['carrera']=utf8_encode($ncarrera->nombre_reducido);
                        $coleccion[$i]['no_ficha']=$data->no_solicitud;
                        $coleccion[$i]['telefono']=is_null($data->telefono)?"NO INDICO":$data->telefono;
                        $coleccion[$i]['correo_personal']=$data->correo_electronico;
                        //$coleccion[$i]['correo_ite']="asp".substr($this->periodo,-3)."_".$data->id."@ite.edu.mx";
                        $coleccion[$i]['fecha_registro']=$data->created_at;
                        $i++;
                    }
                //}
            }
        }
        return collect($coleccion);
    }

    public function headings(): array{
        return ["nombre", "apellidos", "curp","carrera","no_ficha","telefono","correo_personal","fecha_registro"];
    }
}
