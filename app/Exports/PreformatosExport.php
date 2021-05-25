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
        $datos=DB::table('preformatos')
            ->where('periodo',$this->periodo)
            ->select('id','nombre','apellidos','curp','correo','creado','created_at')
            ->get();
        $coleccion = array([]);
        $i=1;
        if($this->carrera=="T"){
            foreach ($datos as $data){
                $existe=PreFicha::where('periodo',$this->periodo)->where('curp',$data->curp)->count();
                $ficha=$existe>0?1:0;
                $coleccion[$i]['nombre']=$data->nombre;
                $coleccion[$i]['apellidos']=$data->apellidos;
                $coleccion[$i]['curp']=$data->curp;
                $leyenda=$ficha==1?"Si":"No";
                $coleccion[$i]['ficha']=$leyenda;
                if($existe){
                    $datos_aspirante=PreFicha::where('periodo',$this->periodo)
                        ->where('curp',$data->curp)->first();
                    $carrera_aspira=trim($datos_aspirante->carrera_opcion_1);
                    $ncarrera=Carreras::where('carrera',$carrera_aspira)
                        ->select('nombre_reducido')
                        ->first();
                    $coleccion[$i]['carrera']=utf8_encode($ncarrera->nombre_reducido);
                    $coleccion[$i]['no_ficha']=$datos_aspirante->no_solicitud;
                    $coleccion[$i]['telefono']=is_null($datos_aspirante->telefono)?"NO INDICO":$datos_aspirante->telefono;
                }else{
                    $coleccion[$i]['carrera']="Sin informacion";
                    $coleccion[$i]['no_ficha']="NA";
                    $coleccion[$i]['telefono']="S/I";
                }
                $coleccion[$i]['correo_personal']=$data->correo;
                $coleccion[$i]['correo_ite']="asp".substr($this->periodo,-3)."_".$data->id."@ite.edu.mx";
                $coleccion[$i]['fecha_registro']=$data->created_at;
                $i++;
            }
        }else{
            foreach ($datos as $data){
                $existe=PreFicha::where('periodo',$this->periodo)->where('curp',$data->curp)->count();
                $ficha=$existe>0?1:0;
                if($ficha){
                    $datos_aspirante=PreFicha::where('periodo',$this->periodo)
                        ->where('curp',$data->curp)->first();
                    $carrera_aspira=trim($datos_aspirante->carrera_opcion_1);
                    if($carrera_aspira==$this->carrera){
                        $coleccion[$i]['nombre']=$data->nombre;
                        $coleccion[$i]['apellidos']=$data->apellidos;
                        $coleccion[$i]['curp']=$data->curp;
                        $leyenda=$ficha==1?"Si":"No";
                        $coleccion[$i]['ficha']=$leyenda;
                        $ncarrera=Carreras::where('carrera',$carrera_aspira)
                            ->select('nombre_reducido')
                            ->first();
                        $coleccion[$i]['carrera']=utf8_encode($ncarrera->nombre_reducido);
                        $coleccion[$i]['no_ficha']=$datos_aspirante->no_solicitud;
                        $coleccion[$i]['telefono']=is_null($datos_aspirante->telefono)?"NO INDICO":$datos_aspirante->telefono;
                        $coleccion[$i]['correo_personal']=$data->correo;
                        $coleccion[$i]['correo_ite']="asp".substr($this->periodo,-3)."_".$data->id."@ite.edu.mx";
                        $coleccion[$i]['fecha_registro']=$data->created_at;
                        $i++;
                    }
                }
            }
        }
        return collect($coleccion);
    }

    public function headings(): array{
        return ["nombre", "apellidos", "curp","ficha","carrera","no_ficha","telefono","correo_personal","correo_ite","fecha_registro"];
    }
}
