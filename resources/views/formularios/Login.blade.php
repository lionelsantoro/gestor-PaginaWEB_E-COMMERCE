<!DOCTYPE html>
<html lang="es">

@include('plantillas.head', ['titulo' => 'InicioSesion'])

<head>
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

    @include('plantillas.menu')
    
    <div class="container flex-grow-1 d-flex justify-content-center align-items-center my-5">
        
        <div class="card shadow-sm border-0" style="width: 100%; max-width: 400px;">
            <div class="card-body p-4 p-md-5">
                
                <h4 class="text-center fw-bold mb-4 text-rosado">Iniciar Sesión</h4>
                
                <form action="/login" method="POST">
                    
                    @csrf
                    
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <!-- Se eliminó el pattern que bloqueaba la arroba. type="email" y required mantienen la validación nativa. -->
                        <input type="email" class="form-control" id="email" name="email" placeholder="nombre@ejemplo.com" pattern="^[^@\s]+@[^@\s]+\.com$" required>           
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-lg fondo-rosado text-white">Ingresar</button>
                    </div>
                    
                    <div class="text-center text-muted small">
                        ¿No tenés una cuenta? <a href="/registro" class="text-decoration-none text-rosado">Registrate acá</a>
                    </div>

                </form>
            </div>
        </div>

    </div>

    @if(session('success'))
    <div class="fondo-desenfocado">
        <div class="toast shadow-lg border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false" id="toastLogin">
            <div class="toast-header bg-white">
                <i class="bi bi-check-circle-fill text-success me-2 text-rosado"></i>
                <strong class="me-auto fs-5 text-rosado">Inicio de sesión exitoso</strong>
            </div>
            
            <div class="toast-body bg-white text-center p-4">
                <p class="fs-6 mb-4">¡Bienvenido de nuevo!</p>
                
                <div class="mt-3 pt-3 border-top d-flex justify-content-center gap-2">
                    <a href="/" class="btn fondo-rosado text-white">Aceptar y continuar</a>
                </div>
            </div>
        </div>
    </div>
    @endif

    @include('plantillas.piedepagina')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var toastElement = document.getElementById('toastLogin');
            if (toastElement) {
                var toast = new bootstrap.Toast(toastElement);
                toast.show();
            }
        });
    </script>

</body>
</html>