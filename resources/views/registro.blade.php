<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAUDI&GO</title>
    <link rel="stylesheet" href="{!! asset('../resources/css/app.css') !!}">
    <meta name="csrf_token" content="{{ csrf_token() }}" id="token">
</head>
<body>
<div class="container-login">
    <img src="img/login-pic/pic5.jpg" alt="algo a fallado">
    <h1>Bienvenido a Gaudi&Go</h1>
    <p>Con Gaudi&Go podras explorar los mejores puntos de interes de la ciudad condal con un solo click y descubrir miles de lugares magicos que esconde la ciudad</p>
    <form action="{{url('registerpost')}}" method="POST">
        @csrf
        <input type="text" name="name" id="name" placeholder="Name">
        <input type="text" name="email" id="email" placeholder="Username">
        <input type="password" name="password" id="password" placeholder="Password">
        <button type="submit" id="button" class="registrar">Registrar</button>
    </form>
</div>
<div class="texto-registrate-inicia">
    <p>Ya tienes cuenta?</p>
    <a href="index.html">Inicia Sesión</a>
</div>
</body>
</html>
