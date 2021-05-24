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
        <h2>Listado de aspirantes</h2>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Solicitud</th>
                <th scope="col">Ficha?</th>
                <th scope="col">Nombre</th>
                <th scope="col">Carrera</th>
                <th scope="col">Correo</th>
                <th scope="col">Teléfono</th>
                <th scope="col">CURP</th>
            </tr>
        </thead>
        @foreach ($listado as $key)
        <tr>
            <td>
                {{ $key->solicitud }}
            </td>
            <td>
                {{ $key->ficha }}
            </td>
            <td>
                {{ utf8_encode($key->apaterno) }} {{ utf8_encode($key->amaterno) }}
                 {{ utf8_encode($key->nnombre) }}
            </td>
            <td>
                {{ utf8_encode($key->carrera) }}
            </td>
            <td>
                {{ $key->correoe }}
            </td>
            <td>
                {{ $key->tel }}
            </td>
            <td>
                {{ $key->curp }}
            </td>
        </tr>    
        @endforeach
    </table>
    @endif
@endsection
