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
        Del siguiente listado, seleccione al aspirante que dará de alta a un grupo.
        <div class="list-group">
            @foreach($aspirantes as $ficha)
                <a href="/ficha/prope/materias?ficha={{$ficha->no_solicitud}}&periodo={{$periodo}}" class="list-group-item list-group-item-action list-group-item-light">{{utf8_encode($ficha->apellido_paterno)}} {{utf8_encode($ficha->apellido_materno)}} {{utf8_encode($ficha->nombre_aspirante)}} {{$ficha->curp}}</a>
            @endforeach
        </div>
    @endif
@endsection
