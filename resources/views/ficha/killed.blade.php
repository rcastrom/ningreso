@extends('layout')

@section('menu')
<h1>
    Parámetros
    <small>Cancelar Ficha</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-asterisk"></i>Parámetros</a></li>
    <li class="active">Cancelar Ficha</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h2>Eliminar registro</h2>
        <p>La ficha ha sido eliminada.</p>
    @endif
@endsection
