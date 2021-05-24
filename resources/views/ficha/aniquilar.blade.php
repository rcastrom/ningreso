@extends('layout')

@section('menu')
<h1>
    Parámetros
    <small>Matar Ficha</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-asterisk"></i>Parámetros</a></li>
    <li class="active">Matar Ficha</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h2>Aniquilar aspirante</h2>
        <h4>Se emplea el módulo cuando es necesario aniquilar completamente a un aspirante</h4>
        <form action="{{route('ficha.cuello2')}}" method="post" role="form">
            @csrf
            <legend>Destrucción universal</legend>
                <h5>Confirme que la persona a ser morida es: {{$prevalue->apellidos}} {{$prevalue->nombre}}</h5>
            <br>
            <input type="hidden" name="id" value="{{$prevalue->id}}">
            <input type="hidden" name="periodo" value="{{$prevalue->periodo}}">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Aniquilar sin piedad alguna</button>
                </div>
        </form>
    @endif
@endsection
