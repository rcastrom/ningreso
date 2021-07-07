@extends('layout')

@section('menu')
<h1>
    Propedéutico
    <small>Listas</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-wpforms"></i>Propedéutico</a></li>
    <li class="active">Listas</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h4>Por favor, complete la información solicitada</h4>
        <form action="{{route('prope.listas1')}}" method="post" role="form">
            @csrf
            <legend>Obtención de listas</legend>
            <div class="row">
                <div class="form-group col-md-4">
                    <label for="tipo">¿Qué tipo de lista desea generar?</label>
                    <select name="tipo" id="tipo" required class="form-control">
                        <option value="" selected>--Seleccione--</option>
                        <option value="1">Para docente</option>
                        <option value="2">Para alguna materia/grupo</option>
                    </select>
                </div>
            </div>
                <button type="submit" class="btn btn-primary">Continuar</button>
        </form>
    @endif
@endsection
