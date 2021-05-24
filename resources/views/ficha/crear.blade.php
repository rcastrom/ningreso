@extends('layout')

@section('menu')
<h1>
    Parámetros
    <small>Validar Aspirante</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-asterisk"></i>Parámetros</a></li>
    <li class="active">Validar Aspirante</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h2>Validar Aspirante a Ficha</h2>
        <p>Cambia el estatus de aspirante a ficha; es decir, si se cuenta con el 
            comprobante de pago correspondiente, mediante éste módulo podrá cambiar
            la situación de aspirante a ficha registrada.  
        </p>
        <p><strong>No convierte al aspirante o ficha en aceptado(a)</strong>; únicamente
        es por si en el registro de aspirantes, no apareciera al solicitante como ficha.</p>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif    
        <form action="{{ route('ficha.nficha') }}" method="post" role="form">
            @csrf
            <legend>Indicar número de aspirante</legend>
                <div class="form-group col-md-4">
                    <input type="number" name="pficha" id="pficha" required class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Continuar</button>
        </form>
    @endif
@endsection
