<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Solicitud de registro nuevo ingreso ITE</title>

    <!-- Bootstrap core CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    {!! NoCaptcha::renderJs('es-419',true,'recaptchaCallback') !!}
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display&display=swap" rel="stylesheet">
    <!-- Custom styles for this template -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    
</head>
<body class="hm-gradient">
<!-- Begin page content -->
<main>
    <div class="container mt-4">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="POST" action="/register">
        @csrf
        <div class="col-md-10 mb-4">
            <div class="card indigo form-white">
                <div class="card-body">
                    <h3 class="text-center white-text py-3"><i class="fa fa-user"></i> Solicitud de cuenta nueva:</h3>
                                <!--Body-->
                        <div class="md-form">
                            <i class="fa fa-envelope prefix white-text"></i>
                            <input type="text" id="defaultForm-email1" name="email" class="form-control">
                            <label for="defaultForm-email1">Correo electrónico</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-lock prefix white-text"></i>
                            <input type="password" id="defaultForm-pass1" name="password" class="form-control">
                            <label for="defaultForm-pass1">Contraseña</label>
                        </div>
                        <div class="md-form">
                            <i class="fa fa-lock prefix white-text"></i>
                            <input type="password" id="defaultForm-pass2" name="password_confirmation" class="form-control">
                            <label for="defaultForm-pass2">Confirmar contraseña</label>
			</div>
			<input type="hidden" name="type" id="type" value="user">
                        {!! NoCaptcha::display() !!}
                        <div class="text-center">
                            <button class="btn btn-outline-white waves-effect waves-light">Continuar</button>
                        </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</main>
    <!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
<script src='https://www.google.com/recaptcha/api.js'></script>
</body>
</html>
