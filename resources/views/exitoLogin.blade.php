<!DOCTYPE html>
<html lang="es">

@include('plantillas.head', ['titulo' => 'InicioSesionExitoso'])

<body class="d-flex flex-column min-vh-100 bg-light">

    @include('plantillas.menu')
    
    <div class="container flex-grow-1 d-flex justify-content-center align-items-center my-5">
        
        <div class="toast shadow-lg border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false" id="toastLogin">
            <div class="toast-header bg-white">
                <i class="bi bi-check-circle-fill text-success me-2 text-rosado"></i>
                <strong class="me-auto fs-5 text-rosado">Inicio de sesión exitoso</strong>
            </div>
            
            <div class="toast-body bg-white text-center p-4">
                <p class="fs-6 mb-4">¡Bienvenido de nuevo!</p>
                
                <div class="mt-3 pt-3 border-top d-flex justify-content-center gap-2">
                    <a href="/" class="btn fondo-rosado">Aceptar y continuar</a>
                </div>
            </div>
        </div>

    </div>

    @include('plantillas.piedepagina')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var elementoToast = document.getElementById('toastLogin');
            var miToast = new bootstrap.Toast(elementoToast);
            miToast.show();
        });
    </script>

</body>
</html>