<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">

    <style type="text/css">
        @font-face {
            font-family: 'Montserrat';
            src: url({{ storage_path('fonts\Montserrat-Medium.ttf') }}) format("truetype");
        }
        body{
            font-family: Montserrat, sans-serif;
            font-size: 9pt;
        }
        h3,h4{
            font-family: Nunito, sans-serif;
            font-size: large;
        }
        .bottom-three {
            margin-bottom: 2cm;
        }
        .adicional td{
            font-family: Helvetica;
            font-size: 6pt;
        }
        .adicional2 td{
            font-family: Helvetica;
            font-size: 7pt;
            padding: 0 1.25in;
        }
    </style>
    <title>Acta</title>
</head>
<?php
$hoy=date('m');
switch ($hoy){
    case "01": $mes="enero"; break;
    case "02": $mes="febrero"; break;
    case "03": $mes="marzo"; break;
    case "04": $mes="abril"; break;
    case "05": $mes="mayo"; break;
    case "06": $mes="junio"; break;
    case "07": $mes="julio"; break;
    case "08": $mes="agosto"; break;
    case "09": $mes="septiembre"; break;
    case "10": $mes="octubre"; break;
    case "11": $mes="noviembre"; break;
    case "12": $mes="diciembre"; break;
}
?>
<body>
<div class="container">
    <table width="100%" align="center">
        <tr>
            <td width="15%"><img src="{{asset('img/tecnm.jpg')}}" width="55px" height="55px" ></td>
            <td width="70%" align="center"><h4>Instituto Tecnológico de Ensenada</h4></td>
            <td width="15%"><img src="{{asset('img/escudo_tec.jpg')}}" width="55px" height="50px" ></td>
        </tr>
    </table>
</div>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            Acta de calificación del período 2021-2 curso propedéutico
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            Materia {{utf8_encode($nmateria->materia)}} Gpo {{$nmateria->grupo}}
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-12">
            Docente {{$docente}}
        </div>
    </div>
</div>
<span style="margin-bottom: 2cm;">&nbsp;</span>
<div class="container">
    <div class="row">
        <div class="col-12">
            <table border="1" width="100%" class="adicional">
                <thead>
                <tr>
                    <th width="7%">No</th>
                    <th width="15%">Ficha</th>
                    <th width="37%">Nombre</th>
                    <th width="7%">Calif</th>
                    <td colspan="16"></td>
                </tr>
                </thead>
                <tbody>
                <?php $j=1; ?>
                @foreach($alumnos as $alumno)
                    <tr>
                        <td>{{$j}}</td>
                        <td>{{$alumno->ficha}}</td>
                        <td>{{utf8_encode($alumno->apellido_paterno)}} {{utf8_encode($alumno->apellido_materno)}} {{utf8_encode($alumno->nombre_aspirante)}}</td>
                        <td>{{is_null($alumno->eval)?0:$alumno->eval}}</td>
                        @for($i=1;$i<=16;$i++)
                            <td></td>
                        @endfor
                    </tr>
                    <?php $j++;?>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<span style="margin-bottom: 2cm;">&nbsp;</span>
<div class="container">
    <div class="row">
        <div class="col-md-12 bottom-three">
            Ensenada B.C. a {{date('d')}} de {{$mes}} del {{date('Y')}}
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <table align="center" class="adicional2">
        <tr>
            <td>____________________________</td>
            <td>____________________________</td>
        </tr>
        <tr>
            <td>{{$docente}} <br>
            DOCENTE</td>
            <td>SERRATO RIVERA AURORA <br>
                JEFA DEL DEPARTAMENTO <BR>
                DE DESARROLLO ACADÉMICO
            </td>
        </tr>
    </table>
</div>
<script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>
