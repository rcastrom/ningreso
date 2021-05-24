@extends('layout')

@section('menu')
<h1>
    Parámetros
    <small>Fichas</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-asterisk"></i>Parámetros</a></li>
    <li class="active">Fichas</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h2>Período de entrega de fichas</h2>
        <h4>Seleccione la fecha de inicio así como final para entregar fichas</h4>
        <form action="{{ route('ficha.nficha2') }}" method="post" role="form">
            @csrf
            <legend>Datos generales</legend>
                <div class="form-group col-md-6">
                    <label for="finicio">Inicia entrega de fichas</label>
                    <input type="date" name="finicio" id="finicio" 
                    class="form-control" value="{{ $finicio }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="ffin">Termina entrega de fichas</label>
                    <input type="date" name="ffin" id="ffin" 
                    class="form-control" value="{{ $ffin }}">
                </div>
                <span class="label-info">La fecha de término siempre debe ser posterior
                    a la planeada
                </span>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>  
        </form>
    @endif
@endsection
