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
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Nombre</th>
                <th scope="col">Apellidos</th>
                <th scope="col">CURP</th>
                <th scope="col">Ficha(*)</th>
                <th scope="col">No. Ficha</th>
                <th scope="col">Carrera</th>
            </tr>
            </thead>
            @foreach ($info as $key=>$value)
                @if($key!=0)
                <tr>
                    <td>{{ $value["nombre"] }}</td>
                    <td>{{ $value["apellidos"] }}</td>
                    <td>{{ $value["curp"] }}</td>
                    <td>{{ $value["ficha"] }}</td>
                    <td>{{ $value["no_ficha"] }}</td>
                    <td>{{ utf8_encode($value["carrera"]) }}</td>
                </tr>
                @endif
            @endforeach
        </table>
        <p>La columna Ficha representa que en la base de datos, el aspirante además de haber realizado su
        registro, también ha capturado la información correspondiente a la ficha (como estudios socioeconómicos, etc). </p>
    @endif
@endsection
