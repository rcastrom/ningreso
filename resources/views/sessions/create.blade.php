<!doctype html>
<html lang="en" class="h-100">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v3.8.5">
    <title>Módulo administrativo nuevo ingreso ITE</title>

    <!-- Bootstrap core CSS -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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
    <form method="POST" action="/login">
        @csrf
        <div class="row">
            <div class="col-md-10 mb-4">
                <div class="card pink form-white">
                    <div class="card-body">
                        <h3 class="text-center white-text py-3"><i class="fa fa-user"></i> Ingresar:</h3>
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
                        <div class="text-center">
                            <button class="btn btn-outline-white waves-effect waves-light">next</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.4.1/js/mdb.min.js"></script>
</body>
</html>
