@extends('layout')

@section('menu')
<h1>
    Captura
    <small>Datos SocioEconómicos</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-wpforms"></i>Captura</a></li>
    <li class="active">Datos SocioEconómicos</li>
</ol>
@endsection

@section('content')

    @if( auth()->check() )
        @if($bandera==1)
            @if(!$tcampo)
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <h2>Información adicional</h2>
                    <h4>Por favor, completa la información solicitada</h4>
                    <form action="{{ route('ficha.create3') }}" method="post" role="form">
                        @csrf
                        <legend>Datos SocioEconómicos</legend>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="nivel_estudios_padre">Nivel máximo de estudios alcanzado por 
                                    el padre (aunque haya fallecido)</label>
                                    <select name="nivel_estudios_padre" id="nivel_estudios_padre" class="form-control">
                                        <option value="" selected>--Seleccione--</option>
                                        @foreach ($estudios as $estudio)
                                            <option value="{{ $estudio->nivel_estudios }}">{{ utf8_encode($estudio->descripcion) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="nivel_estudios_madre">Nivel máximo de estudios alcanzado por 
                                    la madre (aunque haya fallecido)</label>
                                    <select name="nivel_estudios_madre" id="nivel_estudios_madre" class="form-control">
                                        <option value="" selected>--Seleccione--</option>
                                            @foreach ($estudios as $estudio)
                                                <option value="{{ $estudio->nivel_estudios }}">{{ utf8_encode($estudio->descripcion) }}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="con_quien_vives">¿Con quién vives actualmente?<br>&nbsp;</label>
                                    <select name="con_quien_vives" id="con_quien_vives" class="form-control">
                                        <option value="" selected>--Seleccione--</option>
                                            @foreach ($vives as $habitas)
                                                <option value="{{ $habitas->con_quien_vives }}">{{ utf8_encode($habitas->descripcion) }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>  
                        <legend>Ingresos familiares mensuales</legend>          
                            <div class="row">
                                <div class="form-group col-md-3">
                                    <label for="ingresos_padre">Ingreso del Padre</label>
                                    <input type="number" name="ingresos_padre" id="ingresos_padre" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="ingresos_madre">Ingreso de la Madre</label>
                                    <input type="number" name="ingresos_madre" id="ingresos_madre" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="ingresos_hermanos">Ingreso de los Hermanos</label>
                                    <input type="number" name="ingresos_hermanos" id="ingresos_hermanos" class="form-control">
                                </div>
                                <div class="form-group col-md-3">
                                    <label for="ingresos_propios">Ingreso Propio</label>
                                    <input type="number" name="ingresos_propios" id="ingresos_propios" class="form-control">
                                </div>
                            </div>
                        <legend>¿Cuál es la ocupación o trabajo de tus padres o tutores?</legend>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="ocupacion_padre">Por el padre</label>
                                    <select name="ocupacion_padre" id="ocupacion_padre" class="form-control">
                                        <option value="" selected>--Seleccione--</option>
                                        @foreach ($ocupacion as $trabajo)
                                            <option value="{{ $trabajo->ocupacion }}">{{ utf8_encode($trabajo->descripcion) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="ocupacion_madre">Por la madre</label>
                                    <select name="ocupacion_madre" id="ocupacion_madre" class="form-control">
                                        <option value="" selected>--Seleccione--</option>
                                            @foreach ($ocupacion as $trabajo)
                                                <option value="{{ $trabajo->ocupacion }}">{{ utf8_encode($trabajo->descripcion) }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                        <legend>En cuanto al hogar</legend>
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label for="casa_vives">El lugar en donde vives es</label>
                                    <select name="casa_vives" id="casa_vives" class="form-control">
                                        <option value="" selected>--Seleccione--</option>
                                        <option value="P" >Propia</option>
                                        <option value="R" >Rentada</option>
                                        <option value="O" >Otro</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="de_quien_dependes">¿De quién dependes económicamente?</label>
                                    <select name="de_quien_dependes" id="de_quien_dependes" class="form-control">
                                        <option value="" selected>--Seleccione--</option>
                                            @foreach ($quien as $de_quien)
                                                <option value="{{ $de_quien->de_quien }}">{{ utf8_encode($de_quien->descripcion) }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-md-4">
                                    <label for="cuartos_casa">¿Cuántas habitaciones tiene la casa?<br>&nbsp;</label>
                                    <select name="cuartos_casa" id="cuartos_casa" class="form-control">
                                        <option value="1" selected>1</option>
                                        <?php
                                            for ($i=2; $i<=9 ; $i++){
                                                echo "<option value='$i'>$i</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="personas_casa">¿Cuántas personas viven en la casa?<br>
                                    &nbsp;</label>
                                    <select name="personas_casa" id="personas_casa" class="form-control">
                                        <option value="1" selected>1</option>
                                        <?php
                                            for ($i=2; $i<=9 ; $i++){
                                                echo "<option value='$i'>$i</option>";
                                            }
                                        ?>
                                        <option value="10">Más de 10</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="personas_dependen">¿Cuántas personas incluyéndote a tí, dependen 
                                        económicamente del principal apoyo o sustento?</label>
                                    <select name="personas_dependen" id="personas_dependen" class="form-control">
                                        <option value="1" selected>1</option>
                                        <?php
                                            for ($i=2; $i<=9 ; $i++){
                                                echo "<option value='$i'>$i</option>";
                                            }
                                        ?>
                                        <option value="10">Más de 10</option>
                                    </select>
                                </div>
			    </div>
			    <input type="hidden" name="periodo" value="{{ $periodo }}">
                            <input type="hidden" name="pre" value="{{ $id }}">
                            <button type="submit" class="btn btn-primary">Continuar</button>
                    </form>
                @else 
                    <h3>Datos SocioEconómicos capturados</h3>
                    <p>No es necesario volver a capturar la información</p>
                @endif
            @else 
                <h2>Período fuera de tiempo</h2>
                <p>Por el momento, el período de solicitud de ficha ha sido cerrado</p>
            @endif
    @endif
@endsection
