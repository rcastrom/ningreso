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
        <form action="{{route('prope.listas3')}}" method="post" role="form">
            @csrf
            <legend>Obtención de listas</legend>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="doc">Seleccione a la materia/gpo para imprimir la lista</label>
                    <select name="cual" id="cual" required class="form-control">
                        <option value="" selected>--Seleccione--</option>
                        @foreach($info as $value)
                            <option value="{{$value->id}}">{{utf8_encode($value->materia)}} {{$value->grupo}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="hidden" name="tipo" value="{{$tipo}}">
            <input type="hidden" name="periodo" value="{{$periodo}}">
            <button type="submit" class="btn btn-primary">Continuar</button>
        </form>
    @endif
@endsection
