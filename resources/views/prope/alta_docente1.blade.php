@extends('layout')

@section('menu')
<h1>
    Propedéutico
    <small>Alta de docente</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-wpforms"></i>Propedéutico</a></li>
    <li class="active">Alta de docente</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h2>Alta de docentes para propedéutico</h2>
        <p>El siguiente módulo, es para dar de alta a un docente a éste sistema, lo que le permitirá acceder a
            listas así como a captura de calificaciones.
        </p>
        <div class="card bg-info w-50">
            <div class="card-body ">
                <h5 class="card-title">Recomendación</h5>
                <p class="card-text">Una vez concluido el curso propedéutico, se le recomienda dar
                    de baja al docente de éste sistema.
                </p>
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
        <form action="{{route('docente.alta')}}" method="post" role="form">
            @csrf
            <legend>Datos generales</legend>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <input type="text" name="appat" id="appat" class="form-control"
                           onblur="this.value=this.value.toUpperCase();" required>
                    <label for="appat" class="form-label">Primer apellido</label>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="apmat" id="apmat" class="form-control"
                           onblur="this.value=this.value.toUpperCase();" >
                    <label for="apmat" class="form-label">Segundo apellido</label>
                </div>
                <div class="form-group col-md-4">
                    <input type="text" name="nombre" id="nombre" class="form-control"
                           onblur="this.value=this.value.toUpperCase();" required>
                    <label for="nombre">Nombre(s)</label>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <input type="text" name="rfc" id="rfc" class="form-control"
                           onblur="this.value=this.value.toUpperCase();" required size="13" maxlength="13">
                    <label for="rfc" class="form-label">RFC</label>
                </div>
                <div class="form-group col-md-6">
                    <input type="email" name="correoe" id="correoe" class="form-control"
                           onblur="this.value=this.value.toLowerCase();" required>
                    <label for="correoe" class="form-label">Correo electrónico (será el usuario)</label>
                </div>
            </div>
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
            <input type="hidden" name="type" value="doc">
            <button type="submit" class="btn btn-primary">Continuar</button>
        </form>
        <h4>Docentes activos hasta el momento</h4>
        @if($cant==0)
            Por el momento, no tiene docentes activos en el sistema
        @else
            <table class="table table-striped table-bordered" style="width: 100%">
                <thead>
                <tr>
                    <th>Docente</th>
                    <th colspan="2">Accion</th>
                </tr>
                </thead>
                <tbody>
                @foreach($info as $value)
                    <tr>
                        <td>{{$value->appat}} {{$value->apmat}} {{$value->nombre}} RFC {{$value->rfc}}</td>
                        <td><a href="/ficha/prope/edit?value={{$value->id}}"><i class="fa fa-pencil" aria-hidden="true"></i>
                             Editar</a></td>
                        <td><a href="/ficha/prope/delete?value={{$value->id}}"><i class="fa fa-trash" aria-hidden="true"></i>
                                Eliminar</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    @endif
@endsection
