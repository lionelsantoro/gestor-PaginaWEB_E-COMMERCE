<!DOCTYPE html>
<html lang="es">
<head> 
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/paleta_colores.css">
</head> 

<body class="d-flex flex-column min-vh-100 bg-light">

    @include('menu')
    
    <div class="container flex-grow-1 d-flex justify-content-center align-items-center my-5">
        
        <div class="toast shadow-lg border-0" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false" id="toastMensaje">
            
            <div class="toast-header bg-white">
                <i class="bi bi-check-circle-fill text-success me-2 text-rosado"></i>
                <strong class="me-auto fs-5 text-rosado">¡Mensaje enviado con éxito!</strong>
            </div>
            
            <div class="toast-body bg-white text-center p-4">
                <p class="fs-6 mb-4">Recibimos tu mensaje. Un asesor comercial se comunicará contigo a la brevedad. ¡Muchas gracias!</p>
                
                <div class="mt-3 pt-3 border-top d-flex justify-content-center gap-2">
                    <a href="/informacion-de-contacto" class="btn fondo-rosado">Aceptar</a>
                </div>
            </div>
        </div>

    </div>

    @include('piedepagina')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 
    
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var elementoToast = document.getElementById('toastMensaje');
            var miToast = new bootstrap.Toast(elementoToast);
            miToast.show();
        });
    </script>

</body>
</html>