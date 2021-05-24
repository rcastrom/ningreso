@extends('layout')

@section('menu')
<h1>
    Convocatoria
    <small>Nuevo Ingreso</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-info-circle"></i>Convocatoria</a></li>
    <li class="active">Información</li>
</ol>
@endsection

@section('content')
    <h1>Error</h1>
    <p>La ficha de pago no puede ser generada debido a que aún no es proceso 
        de pago; o bien, ya venció el período para la misma.</p>
@endsection
