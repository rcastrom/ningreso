@extends('layout')

@section('menu')
<h1>
    Impresión
    <small>Ficha de depósito</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-print"></i>Imprimir</a></li>
    <li class="active">Pagos</li>
</ol>
@endsection

@section('content')
    <form action="recibos.pdf.php" method="post" role="form">
        @csrf
        <legend>Generador de recibos de pagos</legend>
        <div class="row">
            <div class="form-group col-md-4">
                <label for="tpago">Indique el recibo que desea imprimir</label>
                <select name="tpago" id="tpago" required class="form-control">
		            <option value="" selected>--Seleccione--</option>
                    <option value="5001">FICHA EXAMEN SELECCIÓN</option>
                    <option value="3002">CURSO PROPEDÉUTICO</option>
                    <option value="1000">NUEVO INGRESO</option>
                    <option value="1006">NUEVO INGRESO SISTEMA A DISTANCIA</option>
                </select>
            </div>
            <div class="form-group col-md-4">
                <label for="flimite">Fecha límite de pago</label>
                <input type="date" name="flimite" id="flimite">
            </div>
            <div class="form-group col-md-4">
                <label for="ficha">Número de ficha</label>
                <input type="number" name="ficha" id="ficha">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Continuar</button>
    </form>
@endsection
