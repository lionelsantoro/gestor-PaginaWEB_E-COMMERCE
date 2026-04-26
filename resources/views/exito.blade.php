<!DOCTYPE html>
<html lang="es">
<head> 
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}"> 
    <link rel="stylesheet" href="/css/paleta_colores.css">
</head> 

<body class="d-flex flex-column min-vh-100">
      
    @include('menu')

    <div class="container mt-5 flex-grow-1">
        <div class="alert shadow-sm fondo-rosado" role="alert">
            <h4 class="alert-heading">¡Mensaje enviado con éxito!</h4>
            <p>Recibimos tu mensaje. Un asesor comercial se comunicará contigo a la brevedad. ¡Muchas gracias!</p>
            <hr>
            <a href="/informacion-de-contacto" class="btn fondo-morado">Aceptar</a>
        </div>
    </div>
    
    @include('piedepagina')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 
    
</body>
</html>