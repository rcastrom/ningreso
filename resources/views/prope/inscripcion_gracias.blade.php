@extends('layout')

@section('menu')
<h1>
    Propedéutico
    <small>Inscripción</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-asterisk"></i>Propedéutico</a></li>
    <li class="active">Inscripción</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h2>ALta a grupo</h2>
       <p>Se inscribió al estudiante</p>
    @endif
@endsection
