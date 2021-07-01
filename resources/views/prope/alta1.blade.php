@extends('layout')

@section('menu')
<h1>
    Propedéutico
    <small>Creación de grupo</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-wpforms"></i>Propedéutico</a></li>
    <li class="active">Creación de grupo</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h2>Alta de materias para propedéutico</h2>
        <p>El siguiente módulo, es para crear las materias que se cursarán durante el curso
            propedéutico. Debe dar de alta tanto la materia así como el grupo para cada carrera.
        </p>
        <div class="card bg-primary text-info">
            <div class="card-body">El sistema no vigilará si existen empalmes</div>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('prope.alta')}}" method="post" role="form">
            @csrf
            <legend>Datos generales</legend>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" name="nmateria" id="nmateria" class="form-control"
                           onblur="this.value=this.value.toUpperCase();" required>
                    <label for="nmateria" class="form-label">Nombre completo de la materia</label>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="ncorto" id="ncorto" class="form-control"
                           onblur="this.value=this.value.toUpperCase();" required>
                    <label for="ncorto" class="form-label">Nombre corto</label>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="gpo" id="gpo"
                           class="form-control" onblur="this.value=this.value.toUpperCase();" required>
                    <label for="gpo" class="form-label">Grupo</label>
                </div>
            </div>
            <legend>Horario de entrada</legend>
            <div class="form-row">
                <?php
                    $entradas=array(
                        "e1"=>"Lunes","e2"=>"Martes","e3"=>"Miércoles",
                        "e4"=>"Jueves","e5"=>"Viernes","e6"=>"Sábado");
                ?>
                @foreach($entradas as $entrada=>$leyenda)
                    <div class="form-group col-md-2">
                        <input type="time" name="{{$entrada}}" class="form-control">
                        <label for="{{$entrada}}" class="form-label">{{$leyenda}}</label>
                    </div>
                @endforeach
            </div>
            <legend>Horario de salida</legend>
            <div class="form-row">
                <?php
                $salidas=array(
                    "s1"=>"Lunes","s2"=>"Martes","s3"=>"Miércoles",
                    "s4"=>"Jueves","s5"=>"Viernes","s6"=>"Sábado");
                ?>
                @foreach($salidas as $entrada=>$leyenda)
                    <div class="form-group col-md-2">
                        <input type="time" name="{{$entrada}}" class="form-control">
                        <label for="{{$entrada}}" class="form-label">{{$leyenda}}</label>
                    </div>
                @endforeach
            </div>
            <button type="submit" class="btn btn-primary">Continuar</button>
        </form>
    @endif
@endsection
