@extends('layout')

@section('menu')
<h1>
    Modifica
    <small>Aspirante</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-wpforms"></i>Modifica</a></li>
    <li class="active">Aspirante</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h4>Por favor, complete la información solicitada</h4>
        Este módulo le permitirá cambiar (modificar) información de aspirantes o de solicitantes.
        <ul>
            <li>Es <i>aspirante</i> cuando únicamente ingresó al sistema, se le creó cuenta de correo
            pero no ha llenado la información de la ficha.
            </li>
            <li>Es <i>solicitante</i> cuando (adicional a lo anterior) ya realizó información correspondiente
            a la ficha. </li>
        </ul>
        <strong>NOTA: </strong> Un solicitante en términos reales se dice que tiene ficha cuando realizó el
        pago correspondiente.
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('ficha.update1') }}" method="post" role="form">
            @csrf
            <legend>Aspirante a modificar</legend>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="appat">Escriba SOLO UN apellido de la persona</label>
                    <input type="text" name="appat" id="appat" class="form-control" required onblur="this.value=this.value.toUpperCase();">
                </div>
            </div>
                <button type="submit" class="btn btn-primary">Continuar</button>
        </form>
    @endif
@endsection
