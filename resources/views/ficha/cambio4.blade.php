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
        <div class="card bg-aqua-gradient">
            <div class="card-body">
                El aspirante no cuenta con registro de ficha, únicamente realizó el registro pero no
                ha generado el resto de la información correspondiente, por lo que solo puede cambiarle
                la contraseña para acceder al sistema.
            </div>
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
        <form action="{{route('ficha.update7')}}" method="post" role="form">
            @csrf
            <legend>Los valores aqui mostrados, son los registrados en la base de datos de fichas</legend>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="correo">Correo ITE asignado</label>
                    <input type="email" class="form-control" name="correo" id="correo" value="{{"asp".substr($periodo,'-3')."_".$registro."@ite.edu.mx"}}" readonly>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="acceso">Cambiar contraseña de acceso a plataforma de ficha</label>
                    <input type="password" class="form-control" name="acceso" id="acceso" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="contra2">Confirme el cambio de contraseña de acceso a plataforma de ficha</label>
                    <input type="password" class="form-control" name="contra2" id="contra2" required>
                </div>
            </div>
            <input type="hidden" name="periodo" id="periodo" value="{{$periodo}}">
            <button type="submit" class="btn btn-primary">Continuar</button>
        </form>
        <hr>
        <div class="card">
            <div class="card-body">
                <form action="{{route('ficha.cuello3')}}" method="post" role="form">
                    <legend>Anular registro</legend>
                    @csrf
                    Si desea cancelar éste registro para que el estudiante vuelva a iniciar
                    DESDE CERO, seleccione ésta opción <br>
                    <input type="hidden" name="asp" id="asp" value="{{$registro}}">
                    <input type="hidden" name="periodo" id="periodo" value="{{$periodo}}">
                    <button type="submit" class="btn btn-danger">Eliminar registro</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="card bg-fuchsia-active">
            <div class="card-body">
                <ol>
                    <li>No puede modificar la contraseña del correo ITE; únicamente lo puede
                        realizar el Centro de Cómputo</li>
                    <li>El usuario a la plataforma de fichas, debe ser el correo asignado por la escuela.</li>
                </ol>
            </div>
        </div>
    @endif
@endsection
