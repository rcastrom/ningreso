@extends('layout')

@section('menu')
<h1>
    Propedéutico
    <small>Actas</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-wpforms"></i>Propedéutico</a></li>
    <li class="active">Actas</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h4>Por favor, complete la información solicitada</h4>
        <form action="{{route('prope.actas2')}}" method="post" role="form">
            @csrf
            <legend>Obtención de actas</legend>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="quien">Seleccione al personal docente</label>
                    <select name="quien" id="quien" required class="form-control">
                        <option value="" selected>--Seleccione--</option>
                        @foreach($info as $value)
                            <option value="{{$value->id}}">{{$value->appat}} {{$value->apmat}} {{$value->nombre}}</option>
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
