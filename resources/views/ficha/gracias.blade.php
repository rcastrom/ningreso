@extends('layout')

@section('menu')
<h1>
    Parámetros
    <small>Conceptos</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-asterisk"></i>Parámetros</a></li>
    <li class="active">Conceptos</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h2>Concepto modificado</h2>
       <p>Se cambio el dato solicitado</p>
    @endif
@endsection
