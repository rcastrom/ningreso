@extends('layout')

@section('menu')
<h1>
    Captura
    <small>Datos Personales</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-wpforms"></i>Captura</a></li>
    <li class="active">Datos Personales</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        @if($bandera==1)
            @if(!$pcampo)
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
                <form action="{{ route('ficha.create1') }}" method="post" role="form">
                    @csrf
                    <legend>Datos generales</legend>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="apellido_paterno">Apellido Paterno</label>
                            <input type="text" name="apellido_paterno" id="apellido_paterno" 
                            class="form-control" onblur="this.value=this.value.toUpperCase();">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="apellido_materno">Apellido Materno</label>
                            <input type="text" name="apellido_materno" id="apellido_materno" 
                            class="form-control" onblur="this.value=this.value.toUpperCase();">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nombre_aspirante">Nombre</label>
                            <input type="text" name="nombre_aspirante" id="nombre_aspirante" 
                            class="form-control" onblur="this.value=this.value.toUpperCase();">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="fecha_nacimiento">Fecha de nacimiento</label>
                            <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" 
                            class="form-control">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="sexo">Sexo</label>
                            <select name="sexo" id="sexo" class="form-control" required>
                                <option value="" selected>--Seleccione--</option>
                                <option value="M">Masculino</option>
                                <option value="F">Femenino</option>
                            </select>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="nacionalidad">País de nacimiento</label>
                            <select name="nacionalidad" id="nacionalidad" class="form-control">
                                @foreach ($paises as $pais)
                                    @if($pais->codigo=="303")
                                        <option value="{{ $pais->codigo }}" selected>{{ $pais->pais }}</option>
                                    @else
                                        <option value="{{ $pais->codigo }}">{{ $pais->pais }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="edo_nacimiento">Estado de nacimiento (en caso de ser mexicano)</label>
                            <select name="edo_nacimiento" id="edo_nacimiento" class="form-control">
                                <option value="" selected>--Seleccione--</option>
                                @foreach ($estados as $estado)
                                    <option value="{{ $estado->entidad_federativa }}">{{ utf8_encode($estado->nombre_entidad) }}</option>
                                @endforeach
                            </select>
                        </div>            
                        <div class="form-group col-md-6">
                            <label for="comunidad_ind">Comunidad Indígena (si aplica)</label>
                            <select name="comunidad_ind" id="comunidad_ind" class="form-control">
                                <option value="00" selected>--No pertenezco--</option>
                                    @foreach ($etnias as $etnia)
                                        <option value="{{ $etnia->id }}">{{ $etnia->etnia }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="curp">CURP</label>
                            <input type="text" name="curp" id="curp" maxlength="18" size="18" 
                            class="form-control" onblur="this.value=this.value.toUpperCase();">
                        </div>            
                        <div class="form-group col-md-6">
                            <label for="carrera_opcion_1">Carrera a ingresar</label>
                            <select name="carrera_opcion_1" id="carrera_opcion_1" class="form-control" required>
                                <option value="" selected>--Seleccione--</option>
                                    @foreach ($carreras as $carrera)
                                        <option value="{{ $carrera->carrera }}">{{ utf8_encode($carrera->nombre_ofertar) }}</option>
                                    @endforeach
                            </select>
                        </div>
                    </div>
                    <legend>Domicilio actual</legend>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="telefono">Teléfono</label>
                                <input type="text" name="telefono" id="telefono" 
                                class="form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="calle_no">Calle y Numero</label>
                                <input type="text" name="calle_no" id="calle_no" 
                                class="form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="colonia_aspirante">Colonia</label>
                                <input type="text" name="colonia_aspirante" id="colonia_aspirante" 
                                class="form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="entidad_federativa">Entidad Federativa</label>
                                <select name="entidad_federativa" id="entidad_federativa" class="form-control" required>
                                    <option value="" selected>--Seleccione--</option>
                                        @foreach ($estados as $estado)
                                            <option value="{{ $estado->entidad_federativa }}">{{ utf8_encode($estado->nombre_entidad) }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="municipio">Municipio</label>
                                <input type="text" name="municipio" id="municipio" 
                                class="form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="codigo_postal">Código Postal</label>
                                <input type="numeric" name="codigo_postal" id="codigo_postal" maxlength="5" 
                                class="form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                        </div> 
                    <legend>Familiares</legend>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="apellido_paterno_padre">Apellido Paterno Padre</label>
                                <input type="text" name="apellido_paterno_padre" id="apellido_paterno_padre" 
                                class="form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="apellido_materno_padre">Apellido Materno Padre</label>
                                <input type="text" name="apellido_materno_padre" id="apellido_materno_padre" 
                                class="form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="nombre_padre_aspirante">Nombre Padre</label>
                                <input type="text" name="nombre_padre_aspirante" id="nombre_padre_aspirante" 
                                class="form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="vive_padre">¿Aún vive?</label>
                                <select name="vive_padre" id="vive_padre" class="form-control">
                                    <option value="" selected>--Indique</option>
                                    <option value="S">Sí vive</option>
                                    <option value="N">No vive</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="apellido_paterno_madre">Apellido Paterno Madre</label>
                                <input type="text" name="apellido_paterno_madre" id="apellido_paterno_madre" 
                                class="form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="apellido_materno_madre">Apellido Materno Madre</label>
                                <input type="text" name="apellido_materno_madre" id="apellido_materno_madre" 
                                class="form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="nombre_padre_aspirante">Nombre Madre</label>
                                <input type="text" name="nombre_madre_aspirante" id="nombre_madre_aspirante" 
                                class="form-control" onblur="this.value=this.value.toUpperCase();">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="vive_madre">¿Aún vive?</label>
                                <select name="vive_madre" id="vive_madre" class="form-control">
                                    <option value="" selected>--Indique</option>
                                    <option value="S">Sí vive</option>
                                    <option value="N">No vive</option>
                                </select>
                            </div>
                        </div>
                    <legend>Situación actual</legend>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="estado_civil">Estado Civil</label>
                                <select name="estado_civil" id="estado_civil" class="form-control">
                                    <option value="S" selected>Soltero(a)</option>
                                    <option value="C" >Casado(a)</option>
                                    <option value="D" >Divorciado(a)</option>
                                    <option value="U" >Unión Libre</option>
                                    <option value="V" >Viudo(a)</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="capacidad_diferente">Capacidad Diferente</label>
                                <select name="capacidad_diferente" id="capacidad_diferente" class="form-control" required>
                                    <option value="N" selected>No</option>
                                    <option value="S" >Sí</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tienes_beca">¿Cuenta con Beca?</label>
                                <select name="tienes_beca" id="tienes_beca" class="form-control">
                                    <option value="N" selected>No</option>
                                    <option value="S" >Sí</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="zona_procedencia">Zona de procedencia</label>
                                <select name="zona_procedencia" id="zona_procedencia" class="form-control">
                                    <option value="U" selected>Urbano</option>
                                    <option value="I" >Indígena</option>
                                    <option value="R" >Rural</option>
                                    <option value="M" >Urbano Marginado</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="programa_oportunidades">¿Tu familia pertenece al programa Prospera?</label>
                                <select name="programa_oportunidades" id="programa_oportunidades" class="form-control">
                                    <option value="N" selected>No</option>
                                    <option value="S" >Sí</option>
                                </select>
                            </div>
                        </div>
                        <input type="hidden" name="periodo" value="{{ $periodo }}">
                        <input type="hidden" name="pre" value="{{ $id }}">
                        <button type="submit" class="btn btn-primary">Continuar</button>
                </form>
            @else 
                <h2>Datos Personales capturados</h2>
                <p>No es necesario se vuelva a registrar esta sección</p>
            @endif  
            @else 
                <h2>Período fuera de tiempo</h2>
                <p>Por el momento, el período de solicitud de ficha ha sido cerrado</p>
            @endif
    @endif
@endsection
