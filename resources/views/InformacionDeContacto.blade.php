<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}"> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="/css/paleta_colores.css">
    <title>Contacto</title>
</head> 

<body class="d-flex flex-column min-vh-100 bg-light">

    @include('menu')
    
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


                        <form action="/informacion-de-contacto" method="POST">
                                
                                @csrf

                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre completo</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ingresá tu nombre">
                                </div>
                                
                                <div class="mb-3">
                                    <label for="email" class="form-label">Correo electrónico</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="nombre@ejemplo.com">
                                </div>

                                <div class="mb-3">
                                    <label for="asunto" class="form-label">Asunto</label>
                                    <input type="text" class="form-control" id="asunto" name="asunto" placeholder="¿En qué te podemos ayudar?">
                                </div>
                                
                                <div class="mb-4">
                                    <label for="mensaje" class="form-label">Mensaje</label>
                                    <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="Escribí tu mensaje acá..."></textarea>
                                </div>
                                
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-lg fondo-rosado">Enviar Mensaje</button>
                                </div>
                            </form>
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
                                <a href="https://www.facebook.com/fravegaonline" class="text-secondary text-decoration-none fs-3 hover-primary">
                                    <i class="bi bi-facebook text-morado"></i>
                                </a>
                                <a href="https://www.instagram.com/fravegaonline text-morado" class="text-secondary text-decoration-none fs-3 hover-primary">
                                    <i class="bi bi-instagram text-morado"></i>
                                </a>
                                <a href="https://www.youtube.com/user/fravegaonline" class="text-secondary text-decoration-none fs-3 hover-primary">
                                    <i class="bi bi-youtube text-morado"></i>
                                </a>
                                <a href="https://x.com/fravegaonline" class="text-secondary text-decoration-none fs-3 hover-primary">
                                    <i class="bi bi-twitter-x text-morado"></i>
                                </a>
                                <a href="https://www.linkedin.com/company/fravega-saciei" class="text-secondary text-decoration-none fs-3 hover-primary">
                                    <i class="bi bi-linkedin text-morado"></i>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('piedepagina')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 

</body>
</html>