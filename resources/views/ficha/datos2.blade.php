@extends('layout')

@section('menu')
<h1>
    Captura
    <small>Datos Preparatoria</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-wpforms"></i>Captura</a></li>
    <li class="active">Datos Preparatoria</li>
</ol>
@endsection

@section('content')

    @if( auth()->check() )
        @if($bandera==1)
            @if(!$scampo)
                <h2>Educación Media Superior (Preparatoria)</h2>
                <h4>Por favor, completa la información solicitada</h4>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('ficha.create2') }}" method="post" role="form">
                    @csrf
                    <legend>Estudios Previos</legend>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="entidad_federativa_prepa">Estado de Procedencia</label>
                                <select name="entidad_federativa_prepa" id="entidad_federativa_prepa" class="form-control" required>
                                    <option value="" selected>--Seleccione--</option>
                                        @foreach ($estados as $estado)
                                            <option value="{{ $estado->entidad_federativa }}">{{ utf8_encode($estado->nombre_entidad) }}</option>
                                        @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="clave_preparatoria">Escuela Preparatoria</label>
                                <select name="clave_preparatoria" id="clave_preparatoria" class="form-control" required>    
                                </select>
                            </div>
                        </div> 
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="agnio_egreso">Año de Egreso</label>
                                <select name="agnio_egreso" id="agnio_egreso" class="form-control" required>
                                    <option value="" selected>--Seleccione--</option>
                                        <?php
                                            $anio=date("Y");
                                            for($j=$anio-60;$j<=$anio;$j++){ 
                                                echo "<option value='$j'>$j</option>";      
                                            }
                                        ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="promedio_general">Promedio de egreso (escala del 60 al 100)</label>
                                <input type="number" name="promedio_general" id="promedio_general" 
                                class="form-control" onblur="this.value=this.value.toUpperCase();" maxlength="3">
                            </div>
                        </div>
                        <input type="hidden" name="periodo" value="{{ $periodo }}">
                        <input type="hidden" name="pre" value="{{ $id }}">
                        <button type="submit" class="btn btn-primary">Continuar</button>
                </form>
            @else
                <h2>Preparatoria capturada</h2>
                <p>No requieres volver a llenar la información ya registrada</p>
            @endif
        @else 
            <h2>Período fuera de tiempo</h2>
            <p>Por el momento, el período de solicitud de ficha ha sido cerrado</p>
        @endif
    @endif
@endsection
@section('scripts')
    <script type="text/javascript">
        $("#entidad_federativa_prepa").change(function(){
            $.ajax({
                url: "{{ route('fichas.municipios.estados') }}?estado_id=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#clave_preparatoria').html(data.html);
                }
            });
        });
    </script>
@endsection