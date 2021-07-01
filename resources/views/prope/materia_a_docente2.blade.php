@extends('layout')

@section('menu')
<h1>
    Propedéutico
    <small>Asignación de docente</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-wpforms"></i>Propedéutico</a></li>
    <li class="active">Asignación de docente</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h2>Alta de docentes a grupos de propedéuticos</h2>
        <p>El siguiente módulo, es para asignar un docente a una materia - grupo de propedéutico
        </p>
        <h4>Materia {{$nmateria}} / Grupo {{$gpo}}</h4>
        @if($cant==0)
            Por el momento, no tiene docentes dados de alta en el sistema
        @else
            <form action="{{route('docente.asignar')}}" method="post" role="form">
                @csrf
                <div class="form-group">
                    <label for="docente">Del listado, seleccione al docente ha ser asignado</label>
                    <select name="docente" id="docente" class="form-control" required>
                        <option value="" selected>--Seleccione--</option>
                        @foreach($info as $value)
                            <option value="{{$value->id}}">{{$value->appat}} {{$value->apmat}} {{$value->nombre}}</option>
                        @endforeach
                    </select>
                </div>
                <input type="hidden" name="periodo" value="{{$periodo}}">
                <input type="hidden" name="materia" value="{{$materia}}">
                <button type="submit" class="btn btn-primary">Continuar</button>
            </form>
        @endif
    @endif
@endsection
