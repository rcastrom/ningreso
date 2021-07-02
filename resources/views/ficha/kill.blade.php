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
        <h2>Eliminar registro</h2>
        <h4>Se emplea el módulo cuando es necesario cancelar completamente el registro de un aspirante</h4>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('ficha.cuello')}}" method="post" role="form">
            @csrf
            <legend>Borrado de registro</legend>
                <div class="form-group col-md-6">
                    <label for="num_sol">Indique el número de ficha por eliminar</label>
                    <input type="number" name="num_sol" id="num_sol" class="form-control" required>
                </div>
            <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
        </form>
    @endif
@endsection
