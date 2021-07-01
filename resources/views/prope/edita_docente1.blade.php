@extends('layout')

@section('menu')
<h1>
    Propedéutico
    <small>Alta de docente</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-wpforms"></i>Propedéutico</a></li>
    <li class="active">Edición de docente</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h2>Edición de docente para propedéutico</h2>
        <p>El siguiente módulo, es para dar modificar algún dato del docente que haya seleccionado. El usuario
            (correo electrónico) no es un dato modificable; por lo que, de haber realizado un error, deberá
            eliminar al docente y volverlo a crear.
        </p>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('docente.datos')}}" method="post" role="form">
            @csrf
            <legend>Datos generales</legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" name="appat" id="appat" class="form-control"
                           onblur="this.value=this.value.toUpperCase();" required value="{{$info->appat}}">
                    <label for="appat" class="form-label">Primer apellido</label>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="apmat" id="apmat" class="form-control"
                           onblur="this.value=this.value.toUpperCase();" value="{{$info->apmat}}">
                    <label for="apmat" class="form-label">Segundo apellido</label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" name="nombre" id="nombre" class="form-control"
                           onblur="this.value=this.value.toUpperCase();" required value="{{$info->nombre}}">
                    <label for="nombre">Nombre(s)</label>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" name="rfc" id="rfc" class="form-control"
                           onblur="this.value=this.value.toUpperCase();" required size="13"
                           maxlength="13" value="{{$info->rfc}}">
                    <label for="rfc" class="form-label">RFC</label>
                </div>
            </div>
            <div class="form-row">
                <label for="correoe">Correo electrónico registrado</label>
                <input type="email" class="form-control" readonly value="{{$correo->email}}">
            </div>
            <input type="hidden" name="docente" value="{{$info->id}}">
            <button type="submit" class="btn btn-primary">Continuar</button>
        </form>
        <hr>
        En caso de solamente querer modificar la contraseña para el docente
        <form action="{{route('docente.contra')}}" method="post" role="form">
            @csrf
            <legend>Únicamente si va a modificar la contraseña de acceso</legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="password" name="pass1" id="pass1" class="form-control"
                           required>
                    <label for="pass1" class="form-label">Contraseña</label>
                </div>
                <div class="form-group col-md-6">
                    <input type="password" name="pass2" id="pass2" class="form-control"
                           required>
                    <label for="pass2" class="form-label">Confirmar contraseña</label>
                </div>
            </div>
            <input type="hidden" name="docente" value="{{$info->clave}}">
            <button type="submit" class="btn btn-primary">Continuar</button>
        </form>
    @endif
@endsection
