<!DOCTYPE html>
<html lang="es">
<head> 
    <meta charset="UTF-8">
    <title>Página Principal</title>
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}"> 
</head> 
<body>
    
    @include('menu')

    <div class="container mt-4"> 
        <div class="card">
            <div class="card-body">
                <h1 class="card-title">BIENVENIDO</h1>
                <p>Contenido de tu página aquí...</p>
            </div>
        </div>
    </div>

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 
</body>
</html>