<?php


namespace App\Http\Controllers;

use App\Personal;
use App\PreFicha;
use App\Prope;
use App\User;
use App\Docente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\GpoPrope;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class PropeController extends Controller
{
    public function alta_grupos(){
        return view('prope.alta1');
    }
    public function alta_materias(Request $request){
        request()->validate([
            'nmateria'=>'required',
            'ncorto'=>'required',
            'gpo'=>'required'
        ],[
            'nmateria.required'=>'Por favor, indique el nombre de la materia',
            'ncorto.required'=>'Por favor, indique un nombre abreviado para la materia',
            'gpo.required'=>'Por favor, indique el grupo para la materia'
        ]);
        $periodo=$request->session()->get('periodo');
        $alta=new GpoPrope;
        $alta->periodo=$periodo;
        $alta->materia=trim(utf8_decode($request->nmateria));
        $alta->ncorto=trim($request->ncorto);
        $alta->grupo=trim($request->gpo);
        $alta->e1=empty($request->e1)?"null":$request->e1;
        $alta->e2=empty($request->e1)?"null":$request->e2;
        $alta->e3=empty($request->e1)?"null":$request->e3;
        $alta->e4=empty($request->e1)?"null":$request->e4;
        $alta->e5=empty($request->e1)?"null":$request->e5;
        $alta->e6=empty($request->e1)?"null":$request->e6;
        $alta->s1=empty($request->s1)?"null":$request->s1;
        $alta->s2=empty($request->s1)?"null":$request->s2;
        $alta->s3=empty($request->s1)?"null":$request->s3;
        $alta->s4=empty($request->s1)?"null":$request->s4;
        $alta->s5=empty($request->s1)?"null":$request->s5;
        $alta->s6=empty($request->s1)?"null":$request->s6;
        $alta->save();
        if(!$alta){
            App::abort(500,'No se pudo almacenar');
        }
        return view('prope.alta_gracias');
    }
    public function alta_docente1(){
        $cant=Docente::select()->count();
        $info=Docente::select('appat','apmat','nombre','id','rfc')->orderBy('appat','DESC')
            ->orderBy('apmat','DESC')
            ->orderBy('nombre','DESC')
            ->get();
        return view('prope.alta_docente1')->with(compact('cant','info'));
    }
    public function alta_docente2(Request $request){
        request()->validate([
            'appat'=>'required',
            'nombre'=>'required',
            'rfc'=>'required|min:13|max:13',
            'correoe'=>'required|email',
            'pass1'=>'required|required_with:pass2|same:pass2',
        ],[
            'appat.required'=>'Indique por favor el primer apellido del docente',
            'nombre.required'=>'Indique por favor el nombre del docente',
            'rfc.required'=>'Por favor, indique el RFC del docente',
            'rfc.min'=>'El RFC consta de 13 caracteres',
            'rfc.max'=>'El RFC consta de 13 caracteres',
            'correoe.required'=>'Debe indicar el correo electrónico del docente',
            'correoe.email'=>'Debe ser un correo electrónico válido',
            'pass1.required'=>'Por favor, escriba la contraseña a emplear',
            'pass1.required_with'=>'Por favor, confirme la contraseña a emplear',
            'pass2.same'=>'No concuerda la confirmación de la contraseña',
        ]);
        $nombre=$request->get('nombre').' '.$request->get('appat').' '.$request->get('apmat');
        $user = new User;
        $user->name=$nombre;
        $user->email=$request->get('correoe');
        $user->type=$request->get('type');
        $user->curp=$request->get('rfc');
        $user->password=bcrypt($request->get('pass1'));
        $user->save();
        if(!$user){
            App::abort(500,'No se pudo dar de alta al docente (1)');
        }
        $docente_creado=$user->id;
        $docente = new Docente;
        $docente->appat=$request->get('appat');
        $docente->apmat=$request->get('apmat');
        $docente->nombre=$request->get('nombre');
        $docente->clave=$docente_creado;
        $docente->rfc=$request->get('rfc');
        $docente->save();
        if(!$docente){
            App::abort(500,'No se pudo dar de alta al docente (2)');
        }else {
            return view('prope.docente_gracias');
        }
    }
    public function editar_docente1(Request $request){
        $clave_docente=$request->get('value');
        $info=Docente::where('id',$clave_docente)->first();
        $correo=User::where('id',$info->clave)->first();
        return view('prope.edita_docente1')->with(compact('info','correo'));
    }
    public function editar_docente2(Request $request){
        request()->validate([
            'appat'=>'required',
            'nombre'=>'required',
            'rfc'=>'required|min:13|max:13'
        ],[
            'appat.required'=>'Indique por favor el primer apellido del docente',
            'nombre.required'=>'Indique por favor el nombre del docente',
            'rfc.required'=>'Por favor, indique el RFC del docente',
            'rfc.min'=>'El RFC consta de 13 caracteres',
            'rfc.max'=>'El RFC consta de 13 caracteres'
        ]);
        $docente=$request->get('docente');
        Docente::where('id',$docente)->update([
            'appat'=>$request->get('appat'),
            'apmat'=>$request->get('apmat'),
            'nombre'=>$request->get('nombre'),
            'updated_at'=>Carbon::now()
        ]);
        return view('prope.docente_gracias2');
    }
    public function editar_docente3(Request $request){
        request()->validate([
            'pass1'=>'required|required_with:pass2|same:pass2',
        ],[
            'pass1.required'=>'Por favor, escriba la contraseña a emplear',
            'pass1.required_with'=>'Por favor, confirme la contraseña a emplear',
            'pass1.same'=>'No concuerda la confirmación de la contraseña',
        ]);
        $docente=$request->get('docente');
        User::where('id',$docente)->update([
            'password'=>bcrypt($request->get('pass1')),
            'updated_at'=>Carbon::now()
        ]);
        return view('prope.docente_gracias2');
    }
    public function editar_docente4(Request $request){
        $para_docente=$request->get('value');
        $clave_docente=Docente::where('id',$para_docente)->first();
        $para_usuario=$clave_docente->clave;
        Docente::where('id',$para_docente)->delete();
        User::where('id',$para_usuario)->delete();
        return view('prope.docente_gracias4');
    }
    public function docente_a_grupo1(Request $request){
        $periodo=$request->session()->get('periodo');
        $cant=GpoPrope::where('periodo',$periodo)->count();
        $info=GpoPrope::where('periodo',$periodo)
            ->select('materia','grupo','docente','id')
            ->orderBy('materia','ASC')
            ->orderBy('grupo','ASC')
            ->get();
        return view('prope.materia_a_docente1')->with(compact('cant','info','periodo'));
    }
    public function docente_a_grupo2(Request $request){
        $periodo=$request->get('periodo');
        $materia=$request->get('value');
        $datos_materia=GpoPrope::where('periodo',$periodo)->where('id',(int)$materia)->first();
        $nmateria=$datos_materia->materia;
        $gpo=$datos_materia->grupo;
        $cant=Docente::select()->count();
        $info=Docente::select('appat','apmat','nombre','id','rfc')->orderBy('appat','DESC')
            ->orderBy('apmat','DESC')
            ->orderBy('nombre','DESC')
            ->get();
        return view('prope.materia_a_docente2')->with(compact('cant','info','periodo','materia','nmateria','gpo'));
    }
    public function docente_a_grupo3(Request $request){
        $periodo=$request->get('periodo');
        $materia=$request->get('materia');
        $docente=$request->get('docente');
        $info=Docente::where('id',$docente)->select('rfc')->first();
        $rfc=$info->rfc;
        GpoPrope::where('periodo',$periodo)->where('id',(int)$materia)->update([
            'docente'=>$rfc,
            'updated_at'=>Carbon::now()
        ]);
        return view('prope.docente_gracias3');
    }
    public function docente_a_grupo4(Request $request){
        $periodo=$request->get('periodo');
        $materia=$request->get('value');
        GpoPrope::where('periodo',$periodo)->where('id',(int)$materia)->delete();
        return view('prope.docente_gracias5');
    }
    public function inscripcion1(){
        return view('prope.inscripcion1');
    }
    public function inscripcion2(Request $request){
        request()->validate([
            'appat'=>'required',
        ],[
            'appat.required'=>'Por favor, indique el apellido de la persona'
        ]);
        $periodo=$request->session()->get('periodo');
        $appat=utf8_decode($request->appat);
        $posibles=PreFicha::where('periodo',$periodo)
            ->where(function ($query) use($appat){
                $query->where('apellido_paterno','like','%'.$appat.'%')
                    ->orWhere('apellido_materno','like','%'.$appat,'%')
                    ->orWhere('nombre_aspirante','like','%'.$appat,'%');
            })->count();
        if($posibles==0){
            return view('prope.noprocede3');
        }else{
            $aspirantes=PreFicha::where('periodo',$periodo)
                ->where(function ($query) use($appat){
                    $query->where('apellido_paterno','like','%'.$appat.'%')
                        ->orWhere('apellido_materno','like','%'.$appat,'%')
                        ->orWhere('nombre_aspirante','like','%'.$appat,'%');
                })->select('no_solicitud','nombre_aspirante','apellido_paterno','apellido_materno','curp')
                ->orderby('apellido_paterno','ASC')
                ->orderby('apellido_materno','ASC')
                ->get();
            return view('prope.inscripcion2')->with(compact('aspirantes','periodo'));
        }
    }
    public function inscripcion3(Request $request){
        $periodo=$request->session()->get('periodo');
        $cant=GpoPrope::where('periodo',$periodo)->count();
        $info=GpoPrope::where('periodo',$periodo)
            ->select('materia','grupo','docente','id')
            ->orderBy('materia','ASC')
            ->orderBy('grupo','ASC')
            ->get();
        $no_sol=$request->ficha;
        $datos=PreFicha::where('periodo',$periodo)->where('no_solicitud',(int)$no_sol)->first();
        $inscrito=Prope::where('periodo',$periodo)->where('ficha',(int)$no_sol)->count();
        return view('prope.inscripcion3')->with(compact('periodo','cant','info','datos','inscrito'));
    }
    public function inscripcion4(Request $request){
        $materias=$request->get("materias");
        $inscrito=$request->get('inscrito');
        if($inscrito>0){
            Prope::where('periodo',$request->get("periodo"))
                ->where('ficha',(int)$request->get("ficha"))
                ->delete();
        }
        foreach ($materias as $value){
            $alta_materia = new Prope;
            $alta_materia->periodo=$request->get("periodo");
            $alta_materia->ficha=(int)$request->get("ficha");
            $alta_materia->materia=(int)$value;
            $alta_materia->eval=null;
            $alta_materia->save();
        }
        return view('prope.inscripcion_gracias');
    }
    public function listas1(){
        return view('prope.listas1');
    }
    public function listas2(Request $request){
        $periodo=$request->session()->get('periodo');
        $tipo=$request->get('tipo');
        if($tipo==1){
            if(GpoPrope::where('periodo',$periodo)->whereNotNull('docente')->count()>0){
                $info=Docente::select('appat','apmat','nombre','id')
                    ->orderBy('appat','ASC')
                    ->orderBy('apmat','ASC')
                    ->orderBy('nombre','ASC')
                    ->get();
                return view('prope.listas2')->with(compact('periodo','tipo','info'));
            }else{
                $leyenda=" con docentes ";
            }
        }elseif ($tipo==2){
            if(GpoPrope::where('periodo',$periodo)->count()>0){
                $info=GpoPrope::where('periodo',$periodo)->select('materia','grupo','id')->get();
                return view('prope.listas3')->with(compact('periodo','tipo','info'));
            }else{
                $leyenda=" con grupos ";
            }
        }
        return view('prope.noprocede4')->with(compact('leyenda'));
    }
    public function listas3(Request $request){
        $doc=Docente::where('id',$request->quien)->first();
        $RFC=$doc->rfc;
        $periodo=$request->get('periodo');
        $tipo=$request->get('tipo');
        if(GpoPrope::where('periodo',$periodo)
                ->where('docente',$RFC)
                ->count()>0){
            $info=GpoPrope::where('periodo',$request->get('periodo'))
                ->where('docente',$RFC)->select('materia','grupo','id')
                ->orderBy('materia','ASC')
                ->get();
            return view('prope.listas3')->with(compact('periodo','tipo','info'));
        }else{
            $leyenda="no cuenta con materias marcadas para el propedéutico.";
            return view('prope.noprocede5')->with(compact('leyenda'));
        }
    }
    public function listas4(Request $request){
        if(Prope::where('periodo',$request->get('periodo'))
                ->where('materia',(int)$request->get('cual'))
                ->count()>0){
            $periodo=$request->get('periodo');
            $inscritos=Prope::where('materia',(int)$request->get('cual'))
                ->leftJoin('sol_ficha_examen',function ($join) use($periodo){
                    $join->on('propes.ficha','=','sol_ficha_examen.no_solicitud');
                    $join->on('propes.periodo','=','sol_ficha_examen.periodo');
                    $join->on('propes.periodo','=',DB::raw("'".$periodo."'"));
                })
                ->select('propes.ficha','apellido_paterno','apellido_materno','nombre_aspirante')
                ->orderBy('apellido_paterno','asc')
                ->orderBy('apellido_materno','asc')
                ->orderBy('nombre_aspirante','asc')
                ->get();
            $nombre_mat=GpoPrope::where('periodo',$periodo)
                ->where('id',(int)$request->get('cual'))
                ->first();
            if(is_null($nombre_mat->docente)){
                $doc="Por asignar";
            }else{
                $ndocente=Docente::where('rfc',$nombre_mat->docente)
                    ->select('appat','apmat','nombre')->first();
                $doc=$ndocente->appat." ".$ndocente->apmat." ".$ndocente->nombre;
            }
            $data=[
                'alumnos'=>$inscritos,
                'docente'=>$doc,
                'nmateria'=>$nombre_mat
            ];
            $pdf = PDF::loadView('prope.pdf_lista', $data);
            return $pdf->download('lista.pdf');
        }else{
            $leyenda="no tiene ningún alumno inscrito";
            return view('prope.noprocede5')->with(compact('leyenda'));
        }
    }
    public function estadistica1(){
        return view('prope.estadistica1');
    }
    public function estadistica2(Request $request){
        $periodo=$request->session()->get('periodo');
        $consulta=$request->get('consulta');
        if($consulta==1){
            $inscritos=Prope::select(Prope::raw('count(*) as total'),'carrera_opcion_1 as carrera')
                ->leftJoin('sol_ficha_examen',function ($join) use($periodo){
                    $join->on('propes.ficha','=','sol_ficha_examen.no_solicitud');
                    $join->on('propes.periodo','=','sol_ficha_examen.periodo');
                    $join->on('propes.periodo','=',DB::raw("'".$periodo."'"));
                })
                ->groupBy('carrera_opcion_1')
                ->orderBY('carrera_opcion_1','ASC')
                ->get();
            return view('prope.estadistica2',compact('inscritos'));
        }
    }
    public function actas1(){
        return view('prope.actas1');
    }
    public function actas2(Request $request){
        $periodo=$request->session()->get('periodo');
        $tipo=$request->get('tipo');
        if($tipo==1){
            if(GpoPrope::where('periodo',$periodo)->whereNotNull('docente')->count()>0){
                $info=Docente::select('appat','apmat','nombre','id')
                    ->orderBy('appat','ASC')
                    ->orderBy('apmat','ASC')
                    ->orderBy('nombre','ASC')
                    ->get();
                return view('prope.actas2')->with(compact('periodo','tipo','info'));
            }else{
                $leyenda=" con docentes ";
            }
        }elseif ($tipo==2){
            if(GpoPrope::where('periodo',$periodo)->count()>0){
                $info=GpoPrope::where('periodo',$periodo)->select('materia','grupo','id')->get();
                return view('prope.actas3')->with(compact('periodo','tipo','info'));
            }else{
                $leyenda=" con grupos ";
            }
        }
        return view('prope.noprocede4')->with(compact('leyenda'));
    }
    public function actas3(Request $request){
        $doc=Docente::where('id',$request->quien)->first();
        $RFC=$doc->rfc;
        $periodo=$request->get('periodo');
        $tipo=$request->get('tipo');
        if(GpoPrope::where('periodo',$periodo)
                ->where('docente',$RFC)
                ->count()>0){
            $info=GpoPrope::where('periodo',$request->get('periodo'))
                ->where('docente',$RFC)->select('materia','grupo','id')
                ->orderBy('materia','ASC')
                ->get();
            return view('prope.actas3')->with(compact('periodo','tipo','info'));
        }else{
            $leyenda="no cuenta con materias marcadas para el propedéutico.";
            return view('prope.noprocede5')->with(compact('leyenda'));
        }
    }
    public function actas4(Request $request){
        if(Prope::where('periodo',$request->get('periodo'))
                ->where('materia',(int)$request->get('cual'))
                ->count()>0){
            $periodo=$request->get('periodo');
            $inscritos=Prope::where('materia',(int)$request->get('cual'))
                ->leftJoin('sol_ficha_examen',function ($join) use($periodo){
                    $join->on('propes.ficha','=','sol_ficha_examen.no_solicitud');
                    $join->on('propes.periodo','=','sol_ficha_examen.periodo');
                    $join->on('propes.periodo','=',DB::raw("'".$periodo."'"));
                })
                ->select('propes.ficha','apellido_paterno','apellido_materno','nombre_aspirante','propes.eval')
                ->orderBy('apellido_paterno','asc')
                ->orderBy('apellido_materno','asc')
                ->orderBy('nombre_aspirante','asc')
                ->get();
            $nombre_mat=GpoPrope::where('periodo',$periodo)
                ->where('id',(int)$request->get('cual'))
                ->first();
            if(is_null($nombre_mat->docente)){
                $doc="Por asignar";
            }else{
                $ndocente=Docente::where('rfc',$nombre_mat->docente)
                    ->select('appat','apmat','nombre')->first();
                $doc=$ndocente->appat." ".$ndocente->apmat." ".$ndocente->nombre;
            }
            $data=[
                'alumnos'=>$inscritos,
                'docente'=>$doc,
                'nmateria'=>$nombre_mat
            ];
            $pdf = PDF::loadView('prope.pdf_acta', $data);
            return $pdf->download('lista.pdf');
        }else{
            $leyenda="no tiene ningún alumno inscrito";
            return view('prope.noprocede5')->with(compact('leyenda'));
        }
    }
}
