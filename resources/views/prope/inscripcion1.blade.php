@extends('layout')

@section('menu')
<h1>
    Propedéutico
    <small>Inscripción</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-wpforms"></i>Propedéutico</a></li>
    <li class="active">Inscripción</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <h4>Por favor, complete la información solicitada</h4>
        Este módulo le permitirá realizar la inscripción de un estudiante hacia grupos propedéuticos.
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('prope.inscribir1')}}" method="post" role="form">
            @csrf
            <legend>Inscripción a propedéutico</legend>
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
