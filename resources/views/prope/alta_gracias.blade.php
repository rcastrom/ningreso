@extends('layout')

@section('menu')
<h1>
    Propedéutico
    <small>Creación de grupo</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-asterisk"></i>Propedéutico</a></li>
    <li class="active">Creación de grupo</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h2>Materia añadida</h2>
       <p>Se dio de alta la materia y grupo</p>
    @endif
@endsection
