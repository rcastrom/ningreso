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
        <h4>Listado de materias / grupos hasta el momento</h4>
        @if($cant==0)
            Por el momento, no tiene materias activas en el sistema
        @else
            <table class="table table-striped table-bordered" style="width: 100%">
                <thead>
                <th>Materia/Gpo</th>
                <th colspan="3">Accion</th>
                </thead>
                <tbody>
                @foreach($info as $value)
                    <tr>
                        <td>{{utf8_encode($value->materia)}}/{{$value->grupo}}</td>
                        @if(is_null($value->docente))
                            <td>Sin docente asignado</td>
                            <td><a href="/ficha/prope/dmateria?value={{$value->id}}&periodo={{$periodo}}"><i class="fa fa-pencil" aria-hidden="true"></i>
                                    Asignar docente</a></td>
                            <td><a href="/ficha/prope/delmateria?value={{$value->id}}&periodo={{$periodo}}"><i class="fa fa-trash" aria-hidden="true"></i>
                                    Eliminar materia</a></td>
                        @else
                            <?php
                                $rfc=$value->docente;
                                $quien=\App\Docente::where('rfc',$rfc)->first();
                                $ndocente=$quien->appat." ".$quien->apmat." ".$quien->nombre;
                            ?>
                                <td>{{$ndocente}}</td>
                                <td><a href="/ficha/prope/dmateria?value={{$value->id}}&periodo={{$periodo}}"><i class="fa fa-pencil" aria-hidden="true"></i>
                                        Cambiar docente</a></td>
                                <td><a href="/ficha/prope/delmateria?value={{$value->id}}&periodo={{$periodo}}"><i class="fa fa-trash" aria-hidden="true"></i>
                                        Eliminar materia</a></td>
                        @endif
                    </tr>
                @endforeach
                </tbody>
            </table>
        @endif
    @endif
@endsection
