@extends('layout')

@section('menu')
<h1>
    Parámetros
    <small>Cancelar Ficha</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-asterisk"></i>Parámetros</a></li>
    <li class="active">Cancelar Ficha</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h2>Cancelar registro</h2>
        <h4>Se emplea el módulo cuando es necesario eliminar completamente el registro de un aspirante</h4>
        <form action="{{route('ficha.cuello2')}}" method="post" role="form">
            @csrf
            <legend>Cancelar</legend>
                <h5>Confirme que la persona a ser borrada en su registro es: {{utf8_encode($prevalue->apellido_paterno)}} {{utf8_encode($prevalue->apellido_materno)}} {{$prevalue->nombre_aspirante}}</h5>
            <br>
            <input type="hidden" name="id" value="{{$prevalue->no_solicitud}}">
            <input type="hidden" name="periodo" value="{{$prevalue->periodo}}">
                <div class="form-group">
                    <button type="submit" class="btn btn-danger">ELiminar ficha</button>
                </div>
        </form>
    @endif
@endsection
