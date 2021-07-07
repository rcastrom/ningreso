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
        <h4 class="fc-title">Inscritos a propedéutico</h4>
        <table class="table table-light table-responsive">
            <thead>
            <tr>
                <th scope="col">Carrera</th>
                <th scope="col">Cantidad</th>
            </tr>
            </thead>
            <tbody> <?php $suma=0;?>
            @foreach($inscritos as $cant)
                <tr>
                    <td> <?php $est=\App\Carreras::where('carrera',$cant->carrera)->first(); ?>
                        {{utf8_encode($est->nombre_reducido)}}
                    </td>
                    <td>{{$cant->total}}</td>
                </tr>
                <?php $suma+=$cant->total;?>
            @endforeach
            </tbody>
            <tfooter>
                <tr>
                    <td>Total</td>
                    <td>{{$suma}}</td>
                </tr>
            </tfooter>
        </table>
    @endif
@endsection
