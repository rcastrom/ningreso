@extends('layout')

@section('menu')
    <h1>
        Inicio
        <small>Solicitud de pre-ficha</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>Inicio</a></li>
        <li class="active">Inicio</li>
    </ol>
@endsection

@section('content')

    @if( auth()->check() )
        <h2>Panel administrativo</h2>
        <p>Módulo de cambio para aspirantes</p>
    @endif

@endsection
