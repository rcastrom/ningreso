@extends('layout')

@section('menu')
    <h1>
        Propedéutico
        <small>Listas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-wpforms"></i>Propedéutico</a></li>
        <li class="active">Listas</li>
    </ol>
@endsection

@section('content')
    <h1>Error</h1>
    <p>No se pudo realizar lo solicitado, ya que {{$leyenda}} </p>
@endsection
