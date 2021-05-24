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
        <h2>Conceptos de pago</h2>
        <p>Seleccione el concepto de pago a ser modificado; podrá cambiar monto así como fecha
            límite para los pagos. 
        </p>
        <p>Cuando el concepto va a ser modificado en caso de cambio de semestre, debe 
            establecerse tanto fecha de inicio como fecha final.</p>
        <form action="{{ route('ficha.paguitos') }}" method="post" role="form">
            @csrf
            <legend>Pagos</legend>
            <div class="row">
                <div class="form-group col-md-4">
                    <select name="concepto" id="concepto" required class="form-control">
                        <option value="" selected>--Seleccione uno--</option>
                        @foreach ($conceptos as $pagos)
                            <option value="{{ $pagos->clave }}">{{ $pagos->descripcion }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
                <button type="submit" class="btn btn-primary">Continuar</button>
        </form>
    @endif
@endsection
