<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/paleta_colores.css">
    <title>Registro</title>

    <!-- Estilos para el fondo desenfocado (overlay) -->
    <style>
        .fondo-desenfocado {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            background-color: rgba(0, 0, 0, 0.4); 
            backdrop-filter: blur(8px); 
            z-index: 9999; 
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head> 

<body class="d-flex flex-column min-vh-100 bg-light">

    @include('menu')
    
    <div class="container flex-grow-1 d-flex justify-content-center align-items-center my-5">
        
        <div class="card shadow-sm border-0" style="width: 100%; max-width: 600px;">
            <div class="card-body p-4 p-md-5">
                
                <h4 class="text-center fw-bold mb-4 text-rosado">Crear una cuenta</h4>
                
                <form action="/registro" method="POST">
                    
                    @csrf
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nombre" class="form-label">Nombre/s</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="ej. Lionel" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="apellido" class="form-label">Apellido/s</label>
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="ej. Pérez" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$" required>
                        </div>
                    </div>
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="nombre@ejemplo.com" pattern="^[^@\s]+@[^@\s]+\.com$" required>
                    </div>

                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Creá una contraseña segura" required>
                    </div>
                    
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn flag-primary btn-lg fondo-rosado text-white">Registrarse</button>
                    </div>
                    
                    <div class="text-center text-muted small">
                        ¿Ya tenés una cuenta? <a href="/login" class="text-decoration-none text-rosado">Iniciá sesión acá</a>
                    </div>

                </form>
            </div>
        </div>

    </div>

    <!-- VISTA EMERGENTE (TOAST) CON FONDO DESENFOCADO -->
    @if(session('success'))
    <div class="fondo-desenfocado">
        <div class="toast shadow-lg border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false" id="toastRegistro">
            <div class="toast-header bg-white">
                <i class="bi bi-check-circle-fill text-success me-2 text-rosado"></i>
                <strong class="me-auto fs-5 text-rosado">Registro exitoso</strong>
            </div>
            
            <div class="toast-body bg-white text-center p-4">
                <p class="fs-6 mb-4">¡Tu cuenta ha sido creada correctamente!</p>
                
                <div class="mt-3 pt-3 border-top d-flex justify-content-center gap-2">
                    <a href="/" class="btn fondo-rosado text-white">Aceptar y continuar</a>
                </div>
            </div>
        </div>
    </div>
    @endif

    @include('piedepagina')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 

    <!-- Script para activar el toast automáticamente al cargar la página -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var toastElement = document.getElementById('toastRegistro');
            if (toastElement) {
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            }
        });
    </script>

</body>
</html>