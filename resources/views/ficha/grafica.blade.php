@extends('layout2')

@section('menu')
<h1>
    Estadística
    <small>Concentrado</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-wpforms"></i>Estadística</a></li>
    <li class="active">Concentrado</li>
</ol>
@endsection

@section('content')
    @if( auth()->check() )
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading my-2">Fichas registradas</div>
                        <div class="col-lg-8">
                            <canvas id="userChart" class="rounded shadow"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <table class="table table-condensed">
                    <thead>
                    <tr>
                        <th>Clave</th>
                        <th>Carrera</th>
                        <th>Conteo</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $suma=0; ?>
                    @foreach($ncarreras as $carr)
                        <tr>
                            <td>{{ $carr->carrera }}</td>
                            <td>{{ utf8_encode($carr->nombre_reducido) }}</td>
                            <td>
                                @foreach($groups as $key=>$value)
                                    @if($key==trim($carr->carrera))
                                        {{$value}} <?php $suma+=$value;?>
                                    @endif
                                @endforeach
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr>
                        <td></td>
                        <td></td>
                        <td>{{$suma}}</td>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="row">
                <div class="col-md-12">
                    Información que debe ser sujeta a revisión
                </div>
            </div>
        </div>
    @endif
@endsection

@section('scripts')
    <script>
        var ctx = document.getElementById('userChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',
// The data for our dataset
            data: {
                labels:  {!!json_encode($chart->labels)!!} ,
                datasets: [
                    {
                        label: 'Fichas',
                        backgroundColor: {!! json_encode($chart->colours)!!} ,
                        data:  {!! json_encode($chart->dataset)!!} ,
                    },
                ]
            },
// Configuration options go here
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function(value) {if (value % 1 === 0) {return value;}}
                        },
                        scaleLabel: {
                            display: false
                        }
                    }]
                },
                legend: {
                    labels: {
                        // This more specific font property overrides the global property
                        fontColor: '#122C4B',
                        fontFamily: "'Muli', sans-serif",
                        padding: 25,
                        boxWidth: 25,
                        fontSize: 14,
                    }
                },
                layout: {
                    padding: {
                        left: 10,
                        right: 10,
                        top: 0,
                        bottom: 10
                    }
                }
            }
        });
    </script>
@endsection
