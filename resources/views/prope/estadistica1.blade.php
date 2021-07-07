@extends('layout')

@section('menu')
<h1>
    Propedéutico
    <small>Estadística</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-wpforms"></i>Propedéutico</a></li>
    <li class="active">Estadística</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        Este módulo le permite consultar algunos estadísticos.
        <form action="{{route('prope.estadistica1')}}" method="post" role="form">
            @csrf
            <legend>Seleccione el estadístico de consulta</legend>
            <div class="row">
                <div class="form-group col-md-6">
                    <select name="consulta" id="consulta" class="form-control" required>
                        <option value="" selected>--Seleccione--</option>
                        <option value="1">Número de inscritos</option>
                    </select>
                </div>
            </div>
                <button type="submit" class="btn btn-primary">Continuar</button>
        </form>
    @endif
@endsection
