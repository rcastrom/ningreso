@extends('layout')

@section('menu')
<h1>
    Parámetros
    <small>Validar Aspirante</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-asterisk"></i>Parámetros</a></li>
    <li class="active">Validar Aspirante</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h2>Validar Aspirante a Ficha</h2>
        <p>La ficha ha sido creada</p>
    @endif
@endsection
