<!DOCTYPE html> 
<html lang="es"> 

    <head> 
        <meta charset="UTF-8">
        <title>Página Principal</title>
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}"> 

        <style>
           .btn-categoria {
                border: 2px solid transparent; /* Borde transparente por defecto */
                border-radius: 16px; /* Cuadrado redondeado */
                padding: 15px 10px; /* Espacio interior para que el borde respire */
                transition: border-color 0.3s ease; /* Animación suave */
            }
            .btn-categoria:hover {
                border-color: #000 !important; /* Aparece el borde negro que envuelve todo */
            }
        </style>
    </head> 

    <body class="d-flex flex-column min-vh-100">
    
        @include('menu')

        <div class="container my-2">

            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/Imagenes inicio/foto4.png" class="d-block w-100" alt="Banner 1">
                    </div>
                    <div class="carousel-item">
                        <img src="/Imagenes inicio/foto5.png" class="d-block w-100" alt="Banner 2">
                    </div>
                    <div class="carousel-item">
                        <img src="/Imagenes inicio/foto6.png" class="d-block w-100" alt="Banner 3">
                    </div>
                </div>
            </div>

            <div class="row justify-content-center text-center my-5">
                
                <div class="col-6 col-md-3 mb-3">
                    <a href="/catalogo/telefonos" class="btn-categoria text-decoration-none text-dark d-flex flex-column align-items-center">
                        <div class="circulo-categoria bg-white rounded-circle shadow-sm mb-2 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <span class="text-muted small">Img</span>
                        </div>
                        <span class="fw-medium">Teléfonos</span>
                    </a>
                </div>

                <div class="col-6 col-md-3 mb-3">
                    <a href="/catalogo/computadoras" class="btn-categoria text-decoration-none text-dark d-flex flex-column align-items-center">
                        <div class="circulo-categoria bg-white rounded-circle shadow-sm mb-2 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <span class="text-muted small">Img</span>
                        </div>
                        <span class="fw-medium">Computadoras</span>
                    </a>
                </div>

                <div class="col-6 col-md-3 mb-3">
                    <a href="#" class="btn-categoria text-decoration-none text-dark d-flex flex-column align-items-center">
                        <div class="circulo-categoria bg-white rounded-circle shadow-sm mb-2 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <span class="text-muted small">Img</span>
                        </div>
                        <span class="fw-medium">Lavarropas</span>
                    </a>
                </div>

                <div class="col-6 col-md-3 mb-3">
                    <a href="#" class="btn-categoria text-decoration-none text-dark d-flex flex-column align-items-center">
                        <div class="circulo-categoria bg-white rounded-circle shadow-sm mb-2 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px;">
                            <span class="text-muted small">Img</span>
                        </div>
                        <span class="fw-medium">Heladeras</span>
                    </a>
                </div>

            </div>

            <div class="bg-ofertas p-4 mt-5 relative">
                <h3 class="fw-bold mb-4">Ofertas únicas</h3>

                <div id="carruselProductos" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner pb-2">
                        
                        <div class="carousel-item active">
                            <div class="row row-cols-1 row-cols-md-5 g-3">
                                
                                <div class="col"><div class="card h-100 card-producto p-2"><div class="bg-light text-center py-5 mb-2 rounded" style="height: 180px;"><span class="text-muted">Imagen</span></div><div class="card-body p-2 d-flex flex-column"><div><span class="badge bg-morado mb-2">3 SIN INTERÉS</span></div><h6 class="card-title text-truncate" style="font-size: 0.9rem;">Producto 1</h6><div class="mt-auto"><div class="d-flex align-items-center mb-1"><span class="precio-tachado me-2">$99.999</span><span class="badge-descuento">10% OFF</span></div><h5 class="fw-bold mb-3">$89.999</h5><small class="text-success fw-bold">Llega mañana</small></div></div></div></div>
                                <div class="col"><div class="card h-100 card-producto p-2"><div class="bg-light text-center py-5 mb-2 rounded" style="height: 180px;"><span class="text-muted">Imagen</span></div><div class="card-body p-2 d-flex flex-column"><div><span class="badge bg-morado mb-2">6 SIN INTERÉS</span></div><h6 class="card-title text-truncate" style="font-size: 0.9rem;">Producto 2</h6><div class="mt-auto"><div class="d-flex align-items-center mb-1"><span class="precio-tachado me-2">$120.000</span><span class="badge-descuento">15% OFF</span></div><h5 class="fw-bold mb-3">$102.000</h5><small class="text-success fw-bold">Envío GRATIS</small></div></div></div></div>
                                <div class="col"><div class="card h-100 card-producto p-2"><div class="bg-light text-center py-5 mb-2 rounded" style="height: 180px;"><span class="text-muted">Imagen</span></div><div class="card-body p-2 d-flex flex-column"><div><span class="badge bg-morado mb-2">12 SIN INTERÉS</span></div><h6 class="card-title text-truncate" style="font-size: 0.9rem;">Producto 3</h6><div class="mt-auto"><div class="d-flex align-items-center mb-1"><span class="precio-tachado me-2">$50.000</span><span class="badge-descuento">5% OFF</span></div><h5 class="fw-bold mb-3">$47.500</h5><small class="text-success fw-bold">Llega mañana</small></div></div></div></div>
                                <div class="col"><div class="card h-100 card-producto p-2"><div class="bg-light text-center py-5 mb-2 rounded" style="height: 180px;"><span class="text-muted">Imagen</span></div><div class="card-body p-2 d-flex flex-column"><div><span class="badge bg-morado mb-2">3 SIN INTERÉS</span></div><h6 class="card-title text-truncate" style="font-size: 0.9rem;">Producto 4</h6><div class="mt-auto"><div class="d-flex align-items-center mb-1"><span class="precio-tachado me-2">$200.000</span><span class="badge-descuento">20% OFF</span></div><h5 class="fw-bold mb-3">$160.000</h5><small class="text-success fw-bold">Envío GRATIS</small></div></div></div></div>
                                <div class="col"><div class="card h-100 card-producto p-2"><div class="bg-light text-center py-5 mb-2 rounded" style="height: 180px;"><span class="text-muted">Imagen</span></div><div class="card-body p-2 d-flex flex-column"><div><span class="badge bg-morado mb-2">AHORA 12</span></div><h6 class="card-title text-truncate" style="font-size: 0.9rem;">Producto 5</h6><div class="mt-auto"><div class="d-flex align-items-center mb-1"><span class="precio-tachado me-2">$80.000</span><span class="badge-descuento">10% OFF</span></div><h5 class="fw-bold mb-3">$72.000</h5><small class="text-success fw-bold">Retíralo YA!</small></div></div></div></div>
                                
                            </div>
                        </div>

                        <div class="carousel-item">
                            <div class="row row-cols-1 row-cols-md-5 g-3">
                                
                                <div class="col"><div class="card h-100 card-producto p-2"><div class="bg-light text-center py-5 mb-2 rounded" style="height: 180px;"><span class="text-muted">Imagen</span></div><div class="card-body p-2 d-flex flex-column"><div><span class="badge bg-morado mb-2">3 SIN INTERÉS</span></div><h6 class="card-title text-truncate" style="font-size: 0.9rem;">Producto 6</h6><div class="mt-auto"><div class="d-flex align-items-center mb-1"><span class="precio-tachado me-2">$45.000</span><span class="badge-descuento">5% OFF</span></div><h5 class="fw-bold mb-3">$42.750</h5><small class="text-success fw-bold">Llega mañana</small></div></div></div></div>
                                <div class="col"><div class="card h-100 card-producto p-2"><div class="bg-light text-center py-5 mb-2 rounded" style="height: 180px;"><span class="text-muted">Imagen</span></div><div class="card-body p-2 d-flex flex-column"><div><span class="badge bg-morado mb-2">6 SIN INTERÉS</span></div><h6 class="card-title text-truncate" style="font-size: 0.9rem;">Producto 7</h6><div class="mt-auto"><div class="d-flex align-items-center mb-1"><span class="precio-tachado me-2">$300.000</span><span class="badge-descuento">25% OFF</span></div><h5 class="fw-bold mb-3">$225.000</h5><small class="text-success fw-bold">Envío GRATIS</small></div></div></div></div>
                                <div class="col"><div class="card h-100 card-producto p-2"><div class="bg-light text-center py-5 mb-2 rounded" style="height: 180px;"><span class="text-muted">Imagen</span></div><div class="card-body p-2 d-flex flex-column"><div><span class="badge bg-morado mb-2">12 SIN INTERÉS</span></div><h6 class="card-title text-truncate" style="font-size: 0.9rem;">Producto 8</h6><div class="mt-auto"><div class="d-flex align-items-center mb-1"><span class="precio-tachado me-2">$150.000</span><span class="badge-descuento">10% OFF</span></div><h5 class="fw-bold mb-3">$135.000</h5><small class="text-success fw-bold">Retíralo YA!</small></div></div></div></div>
                                <div class="col"><div class="card h-100 card-producto p-2"><div class="bg-light text-center py-5 mb-2 rounded" style="height: 180px;"><span class="text-muted">Imagen</span></div><div class="card-body p-2 d-flex flex-column"><div><span class="badge bg-morado mb-2">3 SIN INTERÉS</span></div><h6 class="card-title text-truncate" style="font-size: 0.9rem;">Producto 9</h6><div class="mt-auto"><div class="d-flex align-items-center mb-1"><span class="precio-tachado me-2">$85.000</span><span class="badge-descuento">15% OFF</span></div><h5 class="fw-bold mb-3">$72.250</h5><small class="text-success fw-bold">Envío GRATIS</small></div></div></div></div>
                                <div class="col"><div class="card h-100 card-producto p-2"><div class="bg-light text-center py-5 mb-2 rounded" style="height: 180px;"><span class="text-muted">Imagen</span></div><div class="card-body p-2 d-flex flex-column"><div><span class="badge bg-morado mb-2">AHORA 12</span></div><h6 class="card-title text-truncate" style="font-size: 0.9rem;">Producto 10</h6><div class="mt-auto"><div class="d-flex align-items-center mb-1"><span class="precio-tachado me-2">$60.000</span><span class="badge-descuento">20% OFF</span></div><h5 class="fw-bold mb-3">$48.000</h5><small class="text-success fw-bold">Llega mañana</small></div></div></div></div>

                            </div>
                        </div>

                    </div>

                    <button class="carousel-control-prev btn-nav-productos" type="button" data-bs-target="#carruselProductos" data-bs-slide="prev" style="left: -10px;">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Anterior</span>
                    </button>
                    <button class="carousel-control-next btn-nav-productos" type="button" data-bs-target="#carruselProductos" data-bs-slide="next" style="right: -10px;">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Siguiente</span>
                    </button>
                </div>
            </div>

            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/Imagenes inicio/foto1.png" class="d-block w-100" alt="Banner 1">
                    </div>
                    <div class="carousel-item">
                        <img src="/Imagenes inicio/foto2.png" class="d-block w-100" alt="Banner 2">
                    </div>
                    <div class="carousel-item">
                        <img src="/Imagenes inicio/foto3.png" class="d-block w-100" alt="Banner 3">
                    </div>
                </div>
            </div>

        </div>

        @include('piedepagina')

        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 

    </body>
    
</html>