@extends('layout')

@section('menu')
<h1>
    Modifica
    <small>Aspirante</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-wpforms"></i>Modifica</a></li>
    <li class="active">Aspirante</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h2>Modificación de datos para aspirante</h2>
        Del siguiente listado, seleccione al aspirante que modificará la información.
        <div class="list-group">
            @foreach($aspirantes as $ficha)
                <a href="/ficha/aspirante/modificar?Id={{$ficha->no_solicitud}}&periodo={{$periodo}}" class="list-group-item list-group-item-action list-group-item-light">{{utf8_encode($ficha->apellido_paterno)}} {{utf8_encode($ficha->apellido_materno)}} {{utf8_encode($ficha->nombre_aspirante)}} {{$ficha->curp}}</a>
            @endforeach
        </div>
    @endif
@endsection
