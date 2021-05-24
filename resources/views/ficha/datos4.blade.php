@extends('layout')

@section('menu')
<h1>
    Captura
    <small>En caso de Emergencia</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-wpforms"></i>Captura</a></li>
    <li class="active">Datos Emergencia</li>
</ol>
@endsection

@section('content')

    @if( auth()->check() )
        @if($bandera==1)
            @if(!$ccampo)
                <h2>En caso de emergencia, ¿a quién podemos contactar?</h2>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h4>Por favor, completa la información solicitada</h4>
                <form action="{{ route('ficha.create4') }}" method="post" role="form">
                        @csrf
                        <legend>Información adicional</legend>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="tipo_sangre">Tipo de sangre</label>
                                    <select name="tipo_sangre" id="tipo_sangre" class="form-control">
                                        <option value="Z" selected>No lo sé</option>
                                        @foreach ($tsangre as $sangre)
                                            <option value="{{ $sangre->id }}">{{ $sangre->tsangre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="comunicar_con">Nombre de la persona con quien se puede 
                                        contactar en caso de emergencia
                                    </label>                            
                                    <input type="text" name="comunicar_con" id="comunicar_con" class="form-control"
                                    onblur="this.value=this.value.toUpperCase();">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="tipo_alergia">¿Presentas algún tipo de alergia?</label>
                                    <input type="text" name="tipo_alergia" id="tipo_alergia" 
                                    placeholder="Indicarlo solamente en caso de presentar, sino, dejarlo en blanco" 
                                    class="form-control" onblur="this.value=this.value.toUpperCase();">
                                </div>
                                <div class="form-group col-md-6">
                                        <label for="enfermedad">¿Presentas alguna enfermedad que requiera consideración particular?</label>
                                        <input type="text" name="enfermedad" id="enfermedad" 
                                        placeholder="Indicarlo solamente en caso de presentar, sino, dejarlo en blanco" 
                                        class="form-control" onblur="this.value=this.value.toUpperCase();">
                                    </div>
                            </div>
                        <legend>Domicilio de la persona para contactar en caso de emergencia</legend>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="calle_no">Calle y número</label>
                                    <input type="text" name="calle_no" id="calle_no" class="form-control"
                                    onblur="this.value=this.value.toUpperCase();">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="colonia">Colonia</label>
                                    <input type="text" name="colonia" id="colonia" class="form-control"
                                    onblur="this.value=this.value.toUpperCase();">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="codigo_postal">Código postal</label>
                                    <input type="text" name="codigo_postal" id="codigo_postal" class="form-control"
                                    onblur="this.value=this.value.toUpperCase();">
                                </div>
                            </div>  
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="entidad_federativa">Estado</label>
                                    <select name="entidad_federativa" id="entidad_federativa" class="form-control">
                                        <option value="" selected>--Seleccione--</option>
                                            @foreach ($estados as $estado)
                                                <option value="{{ $estado->entidad_federativa }}">{{ utf8_encode($estado->nombre_entidad) }}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="municipio">Municipio</label>
                                    <input type="text" name="municipio" id="municipio" class="form-control"
                                    onblur="this.value=this.value.toUpperCase();">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="telefono">Teléfono</label>
                                    <input type="tel" name="telefono" id="telefono" class="form-control"
                                    onblur="this.value=this.value.toUpperCase();">
                                </div>
                            </div>
                        <legend>Lugar de trabajo</legend>    
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="lugar_trabajo">¿Dónde trabaja la persona de contacto?</label>
                                    <input type="text" name="lugar_trabajo" id="lugar_trabajo" class="form-control"
                                    onblur="this.value=this.value.toUpperCase();">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="telefono_trabajo">Teléfono del trabajo</label>
                                    <input type="tel" name="telefono_trabajo" id="telefono_trabajo" class="form-control"
                                    onblur="this.value=this.value.toUpperCase();">
                                </div>
			    </div>  
			    <input type="hidden" name="periodo" value="{{ $periodo }}">
                            <input type="hidden" name="pre" value="{{ $id }}">
                            <button type="submit" class="btn btn-primary">Continuar</button>
                    </form>
                @else 
                    <h3>Información adicional capturada</h3>
                    <p>No es necesario volver a contestar la información</p>
                @endif
            @else 
                <h2>Período fuera de tiempo</h2>
                <p>Por el momento, el período de solicitud de ficha ha sido cerrado</p>
            @endif
    @endif
@endsection
