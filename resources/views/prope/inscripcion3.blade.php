@extends('layout')

@section('menu')
<h1>
    Propedéutico
    <small>Inscripción</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-wpforms"></i>Propedéutico</a></li>
    <li class="active">Inscripción</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h2>Asignación de materias para propedéutico</h2>
        Del siguiente listado, seleccione las materias que llevará el estudiante.
        <br>
        <h4>Estudiante: {{utf8_encode($datos->apellido_paterno)}} {{utf8_encode($datos->apellido_materno)}} {{utf8_encode($datos->nombre_aspirante)}}</h4>
        <hr>
        @if($cant==0)
            <h3>No hay materias activadas</h3>
            No es posible realizar el registro porque no existen materias creadas
        @else
            <form action="{{route('prope.inscribir2')}}" method="post" role="form">
                @csrf
                @foreach($info as $value)
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" name="materias[]"
                               value="{{$value->id}}"
                            @if($inscrito>0)
                                <?php
                                  if(App\Prope::where('periodo',$periodo)
                                  ->where('ficha',(int)$datos->no_solicitud)
                                  ->where('materia',(int)$value->id)->count()>0){
                                      echo 'checked';
                                  }
                                  ?>
                            @endif
                        >
                        <label for="materias[]" class="form-check-label">{{utf8_encode($value->materia)}} Gpo {{$value->grupo}}</label>
                        @if(is_null($value->docente))
                            <i>Docente por asignar</i>
                        @else
                            <?php $doc=App\Docente::where('rfc',$value->docente)->first(); ?>
                            Docente: {{$doc->appat}} {{$doc->apmat}} {{$doc->nombre}}
                        @endif
                    </div>
                @endforeach
                <input type="hidden" name="ficha" value="{{$datos->no_solicitud}}">
                <input type="hidden" name="periodo" value="{{$periodo}}">
                <input type="hidden" name="inscrito" value="{{$inscrito}}">
                <button type="submit" class="btn btn-primary">Continuar</button>
            </form>
        @endif
    @endif
@endsection
