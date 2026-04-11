<!DOCTYPE html>
<html lang="es">

    <head> 
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}"> 
    </head> 
    
    <body class="d-flex flex-column min-vh-100">


        @include('menu')

            <div class="container mt-5">
                <div class="alert alert-success" role="alert">
                    <p>BIENVENIDO</p>
                </div>
            </div>

        @include('piedepagina')

        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 

    </body>

</html>