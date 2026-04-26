<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Registro | Mi E-Commerce</title>
</head> 

<body class="d-flex flex-column min-vh-100 bg-light">

    @include('menu')
    
    <div class="container flex-grow-1 d-flex justify-content-center align-items-center my-5">
        
        <div class="card shadow-sm border-0" style="width: 100%; max-width: 600px;">
            <div class="card-body p-4 p-md-5">
                
                <h4 class="text-center fw-bold mb-4">Crear una cuenta</h4>
                
                <form action="/registro" method="POST">
                    
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label">Nombre/s</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="ej. Lionel" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellido" class="form-label">Apellido/s</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="ej. Pérez" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="nombre@ejemplo.com" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Creá una contraseña segura" required>
                    </div>
                    
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn flag-primary btn-primary btn-lg">Registrarse</button>
                    </div>
                    
                    <div class="text-center text-muted small">
                        ¿Ya tenés una cuenta? <a href="/login" class="text-decoration-none">Iniciá sesión acá</a>
                    </div>

                </form>
            </div>
        </div>

    </div>

    @include('piedepagina')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 

</body>
</html>