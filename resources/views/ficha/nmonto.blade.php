@extends('layout')

@section('menu')
<h1>
    Parámetros
    <small>Conceptos</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-asterisk"></i>Parámetros</a></li>
    <li class="active">Conceptos</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h2>Concepto de pago a modificar</h2>
        <h3>{{ $datos[0]->descripcion }}</h3>
        <p>Cuando el concepto va a ser modificado en caso de cambio de semestre, debe 
            establecerse tanto fecha de inicio como fecha final.</p>
        <form action="{{ route('ficha.pagotes') }}" method="post" role="form">
            @csrf
            <legend>Pagos</legend>
            <div class="row">
                <div class="form-group col-sm-12 col-md-4 ">
                    <label for="costo" class="col-form-label">Costo</label>
                    <input type="number" name="costo" class="form-control"
                    id="costo" value="{{ $datos[0]->costo }}">
                </div>
                <div class="form-group col-sm-12 col-md-4">
                    <label for="finicio" class="label-form">Fecha de inicio</label>
                    <input type="date" name="finicio" class="form-control"
                    id="finicio" value="{{ $datos[0]->finicio }}">
                </div>
                <div class="form-group col-sm-12 col-md-4">
                    <label for="flimite" class="label-form">Fecha final</label>
                    <input type="date" name="flimite" class="form-control"
                    id="flimite" value="{{ $datos[0]->flimite }}">
                </div>
            </div>
            <input type="hidden" name="clave" id="clave" value="{{ $datos[0]->clave }}">
                <button type="submit" class="btn btn-primary">Continuar</button>
        </form>
    @endif
@endsection
