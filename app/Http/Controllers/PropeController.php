<?php


namespace App\Http\Controllers;

use App\User;
use App\Docente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\GpoPrope;
use Illuminate\Support\Facades\App;

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
}
