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
            <legend>Destrucción universal</legend>
                <div class="form-group col-md-6">
                    <label for="curp">Indique el CURP ha ser destrozado</label>
                    <input type="text" name="curp" id="curp" class="form-control"
                           required onchange="this.value=this.v.toUpperCase();" maxlength="18">
                </div>
            <br>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
        </form>
    @endif
@endsection
