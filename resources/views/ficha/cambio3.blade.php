@extends('layout')

@section('menu')
<h1>
    Modifica
    <small>Aspirante</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-wpforms"></i>Modifica</a></li>
    <li class="active">Aspirante</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h2>Modificación de datos para aspirante</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('ficha.update6')}}" method="post" role="form">
            @csrf
            <legend>Los valores aqui mostrados, son los registrados en la base de datos de fichas</legend>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="appat">Apellido Paterno</label>
                    <input type="text" class="form-control" name="appat" id="appat" value="{{utf8_encode($ficha->apellido_paterno)}}" onblur="this.value=this.value.toUpperCase();">
                </div>
                <div class="form-group col-md-4">
                    <label for="apmat">Apellido Materno</label>
                    <input type="text" class="form-control" name="apmat" id="apmat" value="{{utf8_encode($ficha->apellido_materno)}}" onblur="this.value=this.value.toUpperCase();" required>
                </div>
                <div class="form-group col-md-4">
                    <label for="nombre">Nombre del aspirante</label>
                    <input type="text" class="form-control" name="nombre" id="nombre" value="{{utf8_encode($ficha->nombre_aspirante)}}" onblur="this.value=this.value.toUpperCase();" required>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="nficha">No ficha</label>
                    <input type="number" class="form-control" name="nficha" id="nficha" value="{{$ficha->no_solicitud}}" readonly>
                </div>
                <div class="form-group col-md-6">
                    <label for="carrera">Carrera Solicitada</label>
                    <select name="carrera" id="carrera" class="form-control" required>
                        @foreach($carreras as $carr)
                            <option value="{{trim($carr->carrera)}}" {{trim($carr->carrera)==trim($ficha->carrera_opcion_1)?" selected":""}}>{{utf8_encode($carr->nombre_reducido)}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="curp">CURP</label>
                    <input type="text" class="form-control" name="curp" id="curp" value="{{$ficha->curp}}" onblur="this.value=this.value.toUpperCase();" required>
                </div>
                <!--<div class="form-group col-md-4">
                    <label for="correo">Correo ITE asignado</label>
                    <input type="email" class="form-control" name="correo" id="correo" value="{{"asp".substr($periodo,'-3')."_".$registro."@ite.edu.mx"}}" readonly>
                </div> -->
                <div class="form-group col-md-6">
                    <label for="correo_alta">Correo que utilizó para el registro de la ficha</label>
                    <input type="email" class="form-control" name="correo_alta" id="correo_alta" value="{{$ficha->correo_electronico}}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="acceso">Cambiar contraseña de acceso a plataforma de ficha</label>
                    <input type="password" class="form-control" name="acceso" id="acceso">
                </div>
                <div class="form-group col-md-6">
                    <label for="contra2">Confirme el cambio de contraseña de acceso a plataforma de ficha</label>
                    <input type="password" class="form-control" name="contra2" id="contra2">
                </div>
            </div>
            <input type="hidden" name="periodo" id="periodo" value="{{$periodo}}">
            <button type="submit" class="btn btn-primary">Continuar</button>
        </form>
        <div class="card bg-fuchsia-active">
            <div class="card-body">
                <ol>
                    <li>No puede modificar la contraseña del correo ITE; únicamente lo puede
                        realizar el Centro de Cómputo</li>
                    <li>El usuario a la plataforma de aspirante, debe ser el correo asignado por la escuela.</li>
                </ol>
            </div>
        </div>
    @endif
@endsection
