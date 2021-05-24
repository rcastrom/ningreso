@extends('layout')

@section('menu')
<h1>
    Corroborar
    <small>Modificar</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-check-circle-o"></i>Corroborar</a></li>
    <li class="active">Actualizar</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        @if($bandera==1)
            @if($pcampo)
                <h2>Registro de datos personales</h2>
                <h4>Por favor, completa la información solicitada</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('ficha.modifica') }}" method="post" role="form">
                    @csrf
                    @method('PUT')
                    <legend>Datos generales</legend>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="apellido_paterno">Apellido Paterno</label>
                                <input type="text" name="apellido_paterno" id="apellido_paterno" 
                                class="form-control" placeholder="{{ utf8_encode($usuario[0]->apellido_paterno) }}" 
                                value="{{ old('apellido_paterno',utf8_encode($usuario[0]->apellido_paterno)) }}"
                                onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="apellido_materno">Apellido Materno</label>
                                <input type="text" name="apellido_materno" id="apellido_materno" 
                                placeholder="{{ utf8_encode($usuario[0]->apellido_materno) }}"
                                value="{{ old('apellido_materno',utf8_encode($usuario[0]->apellido_materno)) }}" 
                                class="form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nombre_aspirante">Nombre</label>
                                <input type="text" name="nombre_aspirante" id="nombre_aspirante"
                                placeholder="{{ utf8_encode($usuario[0]->nombre_aspirante) }}"
                                value="{{ old('nombre_aspirante',utf8_encode($usuario[0]->nombre_aspirante)) }}" 
                                class="form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="curp">CURP</label>
                                <input type="text" name="curp" id="curp" maxlength="18" size="18"
                                placeholder="{{ $usuario[0]->curp }}"
                                value="{{ old('curp',$usuario[0]->curp) }}" 
                                class="form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>            
                            <div class="form-group col-md-6">
                                <label for="carrera_opcion_1">Carrera a ingresar</label>
                                <select name="carrera_opcion_1" id="carrera_opcion_1" class="form-control" required>
                                        @foreach ($carreras as $carrera)
                                            @if(trim($usuario[0]->carrera_opcion_1)==trim($carrera->carrera))
                                                <option value="{{ $carrera->carrera }}" selected>{{ utf8_encode($carrera->nombre_ofertar) }}</option>
                                            @else
                                                <option value="{{ $carrera->carrera }}">{{ utf8_encode($carrera->nombre_ofertar) }}</option>
                                            @endif
                                        @endforeach
                                </select>
                            </div>
                        </div>
                    <input type="hidden" name="periodo" value="{{ $periodo }}">
                    <input type="hidden" name="pre" value="{{ $id }}">
                    <button type="submit" class="btn btn-primary">Continuar</button>
                </form>
            @else 
                <h2>Sin registro de información</h2>
                <p>No has registrado información, por lo que no hay nada que corregir o actualizar</p>
            @endif  
        @else 
            <h2>Período fuera de tiempo</h2>
            <p>Por el momento, el período de solicitud de ficha ha sido cerrado</p>
        @endif
    @endif
@endsection
