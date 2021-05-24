@extends('layout')

@section('menu')
<h1>
    Parámetros
    <small>Listado</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-asterisk"></i>Parámetros</a></li>
    <li class="active">Listado</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h2>Generación de listado de aspirantes registrados</h2>
        <form action="{{route('ficha.preficha')}}" method="post" role="form">
            @csrf
            <legend>Seleccione el tipo de listado a ser generado</legend>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="carrera">Seleccione la carrera para generar el listado</label>
                    <select name="carrera" id="carrera" class="form-control" required>
                        @foreach($carreras as $carr)
                            <option value="{{trim($carr->carrera)}}">{{utf8_encode($carr->nombre_reducido)}}</option>
                        @endforeach
                            <option value="T" selected>Sin importar la carrera</option>
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="vista">Medio para generar el listado</label>
                    <select name="vista" id="vista" class="form-control" required>
                        <option value="E" selected>Generar a Excel (toda la información)</option>
                        <option value="P">Vista en pantalla (información abreviada)</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Continuar</button>
        </form>
        <h3>Indicaciones:</h3>
        <h4>Generación a Excel</h4>
        El sistema le proveerá un listado con la siguiente información:
        <ol>
            <li>Nombre</li>
            <li>Apellidos</li>
            <li>CURP</li>
            <li>Ficha (**)</li>
            <li>Carrera (si aplica, caso contrario es NA)</li>
            <li>No. ficha: Numero de ficha (si aplica; caso contrario es NA)</li>
            <li>Teléfono con el que se registró para la obtención de la ficha (S/I en caso de sin información)</li>
            <li>Correo personal (el que empleó para llevar a cabo el registro)</li>
            <li>Correo ITE: Es el correo que se le asignó al momento de llevar a cabo su registro.</li>

        </ol>
        <blockquote class="blockquote">
            <ul style="list-style-type: disc">
                <li>(*) Todos son datos con los que el aspirante se registró.</li>
                <li>(**) Ficha significa que existe el CURP con el que se registró en la base
                    de datos de fichas.
                    Si aparece NO significa que el CURP registrado
                    no ha capturado la información.
                </li>
            </ul>
        </blockquote>
        <div class="card bg-info text-white">
            <div class="card-body">Generar el archivo en Excel suele tardar un poco; por favor, sea
                paciente.
            </div>
        </div>
        <h4>Vista en pantalla</h4>
        EL sistema le proporcionará la siguiente información:
        <ol>
            <li>Nombre</li>
            <li>Apellidos</li>
            <li>CURP</li>
            <li>Ficha (**)</li>
            <li>Carrera</li>
        </ol>
        <blockquote class="blockquote">
            <ul>
                <li>(*) Todos son datos con los que el aspirante se registró.</li>
                <li>(**) Ficha significa que existe el CURP con el que se registró en la base
                    de datos de fichas.
                    Si aparece NO significa que el CURP registrado
                    no ha capturado la información.
                </li>
            </ul>
        </blockquote>
    @endif
@endsection
