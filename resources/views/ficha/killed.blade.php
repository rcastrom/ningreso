@extends('layout')

@section('menu')
<h1>
    Parámetros
    <small>Matar Ficha</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-asterisk"></i>Parámetros</a></li>
    <li class="active">Matar Ficha</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h2>Aniquilar aspirante</h2>
        <h4>Se emplea el módulo cuando es necesario aniquilar completamente a un aspirante</h4>
        <p>La pre-ficha ha sido eliminada.</p>
    @endif
@endsection
