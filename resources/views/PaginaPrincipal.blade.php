<!DOCTYPE html> 
<html lang="es"> 

    <head> 
        <meta charset="UTF-8">
        <title>Página Principal</title>
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}"> 
    </head> 

    <body class="d-flex flex-column min-vh-100">
    
        @include('menu')

        <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">

            <div class="carousel-inner">

                <div class="carousel-item active">
                    <img src="/Imagenes inicio/foto1.png" class="d-block w-100" alt="...">
                </div>
                
                <div class="carousel-item">
                    <img src="/Imagenes inicio/foto2.png" class="d-block w-100" alt="...">
                </div>
            
            </div>

        </div>

        @include('piedepagina')

        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 

    </body>
    
</html>