<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/paleta_colores.css">
    <title>Iniciar Sesión</title>
</head> 

<body class="d-flex flex-column min-vh-100 bg-light">

    @include('menu')
    
    <div class="container flex-grow-1 d-flex justify-content-center align-items-center my-5">
        
        <div class="card shadow-sm border-0" style="width: 100%; max-width: 400px;">
            <div class="card-body p-4 p-md-5">
                
                <h4 class="text-center fw-bold mb-4 text-rosado">Iniciar Sesión</h4>
                
                <form action="/login" method="POST">
                    
                    @csrf
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="nombre@ejemplo.com" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-lg fondo-rosado">Ingresar</button>
                    </div>
                    
                    <div class="text-center text-muted small">
                        ¿No tenés una cuenta? <a href="/registro" class="text-decoration-none text-rosado">Registrate acá</a>
                    </div>

                </form>
            </div>
        </div>

    </div>

    @include('piedepagina')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 

</body>
</html>