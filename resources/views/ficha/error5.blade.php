@extends('layout')

@section('menu')
<h1>
    Parámetros
    <small>Validar Aspirante</small>
</h1>
<ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-asterisk"></i>Parámetros</a></li>
    <li class="active">Validar Aspirante</li>
</ol>
@endsection

@section('content')
    <h1>Error</h1>
    <p>El aspirante ingresó a la página de pre - registro, la Institución le creó el correo
        {{$email}}, pero no ha ingresado al sitio https://aspirante.ensenada.tecnm.mx/register
        para dar de alta éste correo a fin de concluir con el registro.</p>
    <p>
        Favor de indicarle al aspirante que debe ingresar a esa página, use el correo {{$email}} como
        usuario, y que deberá crear una contraseña de acceso para el sistema.</p>
    <p>Por lo tanto, no es posible cambiarle la contraseña.</p>
    <h3>Importante</h3>
    <p>Los usuarios deben darse de alta al registro de la ficha <strong>con el correo "ITE";</strong> de no haberlo
    hecho así, no se puede restablecer la contraseña</p>
@endsection
