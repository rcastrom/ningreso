@extends('layout')

@section('menu')
<h1>
    Propedéutico
    <small>Alta a docente</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-asterisk"></i>Propedéutico</a></li>
    <li class="active">Alta a docente</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h2>Materia / Grupo eliminado</h2>
       <p>Se eliminó a la materia / grupo indicado</p>
    @endif
@endsection
