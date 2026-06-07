<!DOCTYPE html>
<html lang="es">

@include('plantillas.head', ['titulo' => 'Contacto'])

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
    
    <div class="container my-5">
        
        <div class="text-center mb-5">
            <h2 class="fw-bold text-rosado">Contactate con nosotros</h2>
            <p class="text-muted">Completá el formulario o comunicate a través de nuestros canales de atención.</p>
        </div>

        <div class="row g-5">
            
            <div class="col-lg-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body p-4 p-md-5">
                        <h4 class="mb-4 text-rosado"><strong>Envianos un mensaje</strong></h4>

                        {{-- SI EL USUARIO INICIÓ SESIÓN, VE EL FORMULARIO --}}
                        @auth
                            <form action="/informacion-de-contacto" method="POST">
                                @csrf

                                {{-- Campos bloqueados que se autocompletan con los datos de la sesión --}}
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre completo</label>
                                    <input type="text" class="form-control text-muted" id="nombre" value="{{ Auth::user()->nombreCompleto }}" readonly style="background-color: #e9ecef;">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo electrónico</label>
                                    <input type="email" class="form-control text-muted" id="email" value="{{ Auth::user()->correo }}" readonly style="background-color: #e9ecef;">
                                </div>

                                {{-- Campos editables (Asunto y Mensaje) --}}
                                <div class="mb-3">
                                    <label for="asunto" class="form-label">Asunto</label>
                                    <input type="text" class="form-control" id="asunto" name="asunto" placeholder="¿En qué te podemos ayudar?" pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$" required>
                                </div>
                                
                                <div class="mb-4">
                                    <label for="mensaje" class="form-label">Mensaje</label>
                                    <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="Escribí tu mensaje acá..." required></textarea>
                                </div>
                                
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-lg fondo-rosado text-white">Enviar Mensaje</button>
                                </div>
                            </form>
                        @endauth

                        {{-- SI ES UN INVITADO (GUEST), LE PEDIMOS QUE INICIE SESIÓN --}}
                        @guest
                            <div class="alert alert-warning text-center p-4 rounded-3" role="alert">
                                <i class="bi bi-person-lock fs-1 text-warning d-block mb-3"></i>
                                <h5 class="fw-bold text-dark mb-2">¡Ups! Sesión requerida</h5>
                                <p class="text-muted mb-4">Para poder enviarnos una consulta o reclamo, necesitás ingresar a tu cuenta.</p>
                                <a href="/login" class="btn fondo-rosado text-white fw-bold px-4 rounded-pill">Iniciar Sesión</a>
                            </div>
                        @endguest

                    </div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card shadow-sm border-0 h-100">
                    <div class="card-body p-4 p-md-5">
                        
                        <div class="mb-4">
                            <h5 class="fw-bold d-flex align-items-center">
                                <i class="bi bi-headset fs-4 text-primary me-2 text-morado"></i> Atención al cliente
                            </h5>
                            <p class="fs-5 mb-1"><strong>0800 122 0338</strong></p>
                            <p class="fs-5 mb-1"><strong>0810 999 3728</strong></p>
                            <p class="text-muted small mb-0">LUNES A VIERNES de 09:00 a 18:00</p>
                            <p class="text-muted small">SÁBADOS de 9:00 a 13:00</p>
                        </div>

                        <hr class="text-muted opacity-25">

                        <div class="mb-4">
                            <h5 class="fw-bold d-flex align-items-center">
                                <i class="bi bi-telephone fs-4 text-primary me-2 text-morado"></i> Venta telefónica
                            </h5>
                            <p class="fs-5 mb-1"><strong>0810 333 8700</strong></p>
                            <p class="text-muted small mb-0">LUNES A VIERNES de 8:00 a 20:00</p>
                            <p class="text-muted small">SÁBADOS-Feriados 9:00 a 21:00</p>
                        </div>

                        <hr class="text-muted opacity-25">

                        <div class="row mb-4">
                            <div class="col-md-6 mb-3 mb-md-0">
                                <h6 class="fw-bold d-flex align-items-center">
                                    <i class="bi bi-envelope text-primary me-2 text-morado"></i> Cobranza de créditos
                                </h6>
                                <p class="mb-0">cobranzas@fravega.com.ar</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold d-flex align-items-center">
                                    <i class="bi bi-building text-primary me-2 text-morado"></i> Servicios a empresas
                                </h6>
                                <p class="mb-0">Ventas corporativas</p>
                            </div>
                        </div>

                        <div class="mt-5 pt-3 border-top">
                            <h6 class="fw-bold mb-3">Seguinos en nuestras redes:</h6>
                            <div class="d-flex gap-3">
                                <a href="https://www.facebook.com/fravegaonline" target="_blank" rel="noopener noreferrer" class="text-secondary text-decoration-none fs-3 hover-primary">
                                    <i class="bi bi-facebook text-morado"></i>
                                </a>
                                <a href="https://www.instagram.com/fravegaonline" target="_blank" rel="noopener noreferrer" class="text-secondary text-decoration-none fs-3 hover-primary">
                                    <i class="bi bi-instagram text-morado"></i>
                                </a>
                                <a href="https://www.youtube.com/user/fravegaonline" target="_blank" rel="noopener noreferrer" class="text-secondary text-decoration-none fs-3 hover-primary">
                                    <i class="bi bi-youtube text-morado"></i>
                                </a>
                                <a href="https://x.com/fravegaonline" target="_blank" rel="noopener noreferrer" class="text-secondary text-decoration-none fs-3 hover-primary">
                                    <i class="bi bi-twitter-x text-morado"></i>
                                </a>
                                <a href="https://www.linkedin.com/company/fravega-saciei" target="_blank" rel="noopener noreferrer" class="text-secondary text-decoration-none fs-3 hover-primary">
                                    <i class="bi bi-linkedin text-morado"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    @if(session('success'))
    <div class="fondo-desenfocado">
        <div class="toast show shadow-lg border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header bg-white">
                <i class="bi bi-check-circle-fill text-success me-2 text-rosado"></i>
                <strong class="me-auto fs-5 text-rosado">Mensaje enviado</strong>
            </div>
            
            <div class="toast-body bg-white text-center p-4">
                <p class="fs-6 mb-4">¡Gracias por contactarte! Responderemos a la brevedad.</p>
                
                <div class="mt-3 pt-3 border-top d-flex justify-content-center gap-2">
                    <a href="/" class="btn fondo-rosado text-white">Aceptar y continuar</a>
                </div>
            </div>
        </div>
    </div>
    @endif

    @include('plantillas.piedepagina')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 
</body>
</html>