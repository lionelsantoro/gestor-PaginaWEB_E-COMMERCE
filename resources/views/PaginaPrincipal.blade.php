<!DOCTYPE html>
<html lang="es">

@include('plantillas.head', ['titulo' => 'PaginaPrincipal'])

<body class="d-flex flex-column min-vh-100">

    @include('plantillas.menu')

    <div class="container my-2">

        <!-- CARRUSEL DE BANNERS SUPERIOR -->
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

        <!-- SECCIÓN CONOCÉ FRÁVEGA -->
        <div class="row my-5 mx-0 rounded shadow-sm border-inicio">
            <div class="col-12 p-4 p-md-5">
                <h2 class="fw-bold mb-3" style="color: #7828D8;">Conocé Frávega</h2>
                <p class="fs-5 text-secondary mb-4">
                    Somos la empresa líder en Argentina con más de 100 años de trayectoria, dedicada a acercar la mejor tecnología y equipamiento a millones de hogares. Nuestro compromiso es brindarte calidad, innovación y una experiencia de compra excepcional, acompañándote en cada etapa de tu vida.
                </p>
                
                <h4 class="fw-bold mb-4 mt-2" style="color: #7828D8;">Nuestras Principales Categorías</h4>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="p-4 bg-white border rounded h-100 shadow-sm d-flex flex-column align-items-center text-center">
                            <span class="fs-1 mb-2">📱</span>
                            <h5 class="fw-bold">Tecnología</h5>
                            <p class="text-muted mb-0" style="font-size: 0.95rem;">Lo último en smartphones, notebooks y smart TVs. Todo lo que necesitás para estudiar, trabajar y mantenerte conectado.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 bg-white border rounded h-100 shadow-sm d-flex flex-column align-items-center text-center">
                            <span class="fs-1 mb-2">❄️</span>
                            <h5 class="fw-bold">Electrodomésticos</h5>
                            <p class="text-muted mb-0" style="font-size: 0.95rem;">Equipá tu casa con las mejores marcas en heladeras, lavarropas y línea blanca. Soluciones diseñadas para facilitar tu rutina.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 bg-white border rounded h-100 shadow-sm d-flex flex-column align-items-center text-center">
                            <span class="fs-1 mb-2">🛋️</span>
                            <h5 class="fw-bold">Hogar y Clima</h5>
                            <p class="text-muted mb-0" style="font-size: 0.95rem;">Aires acondicionados, calefacción y pequeños electrodomésticos. Garantizamos el máximo confort en tus espacios.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CÍRCULOS DE CATEGORÍAS (ENLACES DINÁMICOS ACTUALIZADOS) -->
        <div class="row justify-content-center text-center my-5">
            <div class="col-6 col-md-3 mb-3">
                <a href="/catalogo?categoria=1" class="btn-categoria text-decoration-none text-dark d-flex flex-column align-items-center">
                    <div class="circulo-categoria bg-white rounded-circle shadow-sm mb-2 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border: 2px solid transparent; transition: 0.3s;" onmouseover="this.style.borderColor='#7828D8'" onmouseout="this.style.borderColor='transparent'">
                        <img src="/Imagenes inicio/foto7.png" class="img-fluid" style="max-width: 60px; max-height: 60px; object-fit: contain;">
                    </div>
                    <span class="fw-bold" style="color: #7828D8;">Teléfonos</span>
                </a>
            </div>

            <div class="col-6 col-md-3 mb-3">
                <a href="/catalogo?categoria=2" class="btn-categoria text-decoration-none text-dark d-flex flex-column align-items-center">
                    <div class="circulo-categoria bg-white rounded-circle shadow-sm mb-2 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border: 2px solid transparent; transition: 0.3s;" onmouseover="this.style.borderColor='#7828D8'" onmouseout="this.style.borderColor='transparent'">
                        <img src="/Imagenes inicio/foto8.png" class="img-fluid" style="max-width: 60px; max-height: 60px; object-fit: contain;">
                    </div>
                    <span class="fw-bold" style="color: #7828D8;">Computadoras</span>
                </a>
            </div>

            <div class="col-6 col-md-3 mb-3">
                <a href="/catalogo?categoria=3" class="btn-categoria text-decoration-none text-dark d-flex flex-column align-items-center">
                    <div class="circulo-categoria bg-white rounded-circle shadow-sm mb-2 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border: 2px solid transparent; transition: 0.3s;" onmouseover="this.style.borderColor='#7828D8'" onmouseout="this.style.borderColor='transparent'">
                        <img src="/Imagenes inicio/foto9.png" class="img-fluid" style="max-width: 60px; max-height: 60px; object-fit: contain;">
                    </div>
                    <span class="fw-bold" style="color: #7828D8;">Lavarropas</span>
                </a>
            </div>

            <div class="col-6 col-md-3 mb-3">
                <a href="/catalogo?categoria=4" class="btn-categoria text-decoration-none text-dark d-flex flex-column align-items-center">
                    <div class="circulo-categoria bg-white rounded-circle shadow-sm mb-2 d-flex align-items-center justify-content-center" style="width: 80px; height: 80px; border: 2px solid transparent; transition: 0.3s;" onmouseover="this.style.borderColor='#7828D8'" onmouseout="this.style.borderColor='transparent'">
                        <img src="/Imagenes inicio/foto10.png" class="img-fluid" style="max-width: 60px; max-height: 60px; object-fit: contain;">
                    </div>
                    <span class="fw-bold" style="color: #7828D8;">Heladeras</span>
                </a>
            </div>
        </div>

        <!-- SECCIÓN: ÚLTIMO EN TECNOLOGÍA (REDISEÑADA) -->
        <div class="p-4 mt-5 relative rounded bg-white shadow-sm">
            <h3 class="fw-bold mb-4 text-uppercase" style="color: #7828D8;"><i class="bi bi-stars"></i> Último en tecnología</h3>

            <div id="carruselProductos" class="carousel slide px-md-5" data-bs-ride="carousel">
                <div class="carousel-inner pb-4">

                    <!-- SLIDE 1 -->
                    <div class="carousel-item active">
                        <div class="row row-cols-1 row-cols-md-4 g-4">
                            
                            <!-- CARD 1 -->
                            <div class="col">
                                <div class="card h-100 shadow border-0 p-2 card-producto" style="border-top: 4px solid #7828D8 !important; border-radius: 12px; position: relative;">
                                    <span class="badge position-absolute top-0 start-0 m-2 px-2 py-1 shadow-sm" style="background-color: #ffc107; color: #000; z-index: 2;"><i class="bi bi-lightning-fill"></i> LO MÁS NUEVO</span>
                                    <div class="bg-light d-flex justify-content-center align-items-center mb-2 rounded mt-4" style="height: 180px;">
                                        <img src="/Imagenes Celulares/FOTO2.webp" alt="iPhone 17 Pro Max" class="img-fluid p-2" style="max-height: 100%;">
                                    </div>
                                    <div class="card-body p-2 d-flex flex-column">
                                        <div class="mb-2">
                                            <span class="badge" style="background-color: rgba(120,40,216,0.1); color: #7828D8;">12 SIN INTERÉS</span>
                                        </div>
                                        <h6 class="card-title text-truncate fw-bold fs-5 mb-1">Apple iPhone 17 Pro Max</h6>
                                        <div class="mt-auto">
                                            <h4 class="fw-bold mb-2" style="color: #7828D8;">$3.100.000</h4>
                                            <small class="text-success fw-bold d-block mb-3"><i class="bi bi-truck"></i> Envío GRATIS</small>
                                            <button type="button" class="btn text-white w-100 fw-bold shadow-sm" style="background-color: #7828D8; border-radius: 8px;">
                                                <i class="bi bi-cart-plus"></i> AGREGAR
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CARD 2 -->
                            <div class="col">
                                <div class="card h-100 shadow border-0 p-2 card-producto" style="border-top: 4px solid #7828D8 !important; border-radius: 12px; position: relative;">
                                    <span class="badge position-absolute top-0 start-0 m-2 px-2 py-1 shadow-sm" style="background-color: #ffc107; color: #000; z-index: 2;"><i class="bi bi-lightning-fill"></i> LO MÁS NUEVO</span>
                                    <div class="bg-light d-flex justify-content-center align-items-center mb-2 rounded mt-4" style="height: 180px;">
                                        <img src="/Imagenes Computadoras/FOTO1.jpg" alt="MacBook Pro 16" class="img-fluid p-2" style="max-height: 100%;">
                                    </div>
                                    <div class="card-body p-2 d-flex flex-column">
                                        <div class="mb-2">
                                            <span class="badge" style="background-color: rgba(120,40,216,0.1); color: #7828D8;">12 SIN INTERÉS</span>
                                        </div>
                                        <h6 class="card-title text-truncate fw-bold fs-5 mb-1">MacBook Pro 16 (M3 Max)</h6>
                                        <div class="mt-auto">
                                            <h4 class="fw-bold mb-2" style="color: #7828D8;">$4.500.000</h4>
                                            <small class="text-success fw-bold d-block mb-3"><i class="bi bi-truck"></i> Envío GRATIS</small>
                                            <button type="button" class="btn text-white w-100 fw-bold shadow-sm" style="background-color: #7828D8; border-radius: 8px;">
                                                <i class="bi bi-cart-plus"></i> AGREGAR
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CARD 3 -->
                            <div class="col">
                                <div class="card h-100 shadow border-0 p-2 card-producto" style="border-top: 4px solid #7828D8 !important; border-radius: 12px; position: relative;">
                                    <span class="badge position-absolute top-0 start-0 m-2 px-2 py-1 shadow-sm" style="background-color: #ffc107; color: #000; z-index: 2;"><i class="bi bi-lightning-fill"></i> LO MÁS NUEVO</span>
                                    <div class="bg-light d-flex justify-content-center align-items-center mb-2 rounded mt-4" style="height: 180px;">
                                        <img src="/imagenes heladeras/foto16.webp" alt="Samsung Bespoke" class="img-fluid p-2" style="max-height: 100%;">
                                    </div>
                                    <div class="card-body p-2 d-flex flex-column">
                                        <div class="mb-2">
                                            <span class="badge" style="background-color: rgba(120,40,216,0.1); color: #7828D8;">12 SIN INTERÉS</span>
                                        </div>
                                        <h6 class="card-title text-truncate fw-bold fs-5 mb-1">Heladera Samsung Bespoke</h6>
                                        <div class="mt-auto">
                                            <h4 class="fw-bold mb-2" style="color: #7828D8;">$3.800.000</h4>
                                            <small class="text-success fw-bold d-block mb-3"><i class="bi bi-truck"></i> Envío GRATIS</small>
                                            <button type="button" class="btn text-white w-100 fw-bold shadow-sm" style="background-color: #7828D8; border-radius: 8px;">
                                                <i class="bi bi-cart-plus"></i> AGREGAR
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CARD 4 -->
                            <div class="col">
                                <div class="card h-100 shadow border-0 p-2 card-producto" style="border-top: 4px solid #7828D8 !important; border-radius: 12px; position: relative;">
                                    <span class="badge position-absolute top-0 start-0 m-2 px-2 py-1 shadow-sm" style="background-color: #ffc107; color: #000; z-index: 2;"><i class="bi bi-lightning-fill"></i> LO MÁS NUEVO</span>
                                    <div class="bg-light d-flex justify-content-center align-items-center mb-2 rounded mt-4" style="height: 180px;">
                                        <img src="/imagenes lavarropas/foto17.webp" alt="Samsung AI Control" class="img-fluid p-2" style="max-height: 100%;">
                                    </div>
                                    <div class="card-body p-2 d-flex flex-column">
                                        <div class="mb-2">
                                            <span class="badge" style="background-color: rgba(120,40,216,0.1); color: #7828D8;">AHORA 18</span>
                                        </div>
                                        <h6 class="card-title text-truncate fw-bold fs-5 mb-1">Lavarropas Samsung AI</h6>
                                        <div class="mt-auto">
                                            <h4 class="fw-bold mb-2" style="color: #7828D8;">$1.350.000</h4>
                                            <small class="text-success fw-bold d-block mb-3"><i class="bi bi-truck"></i> Envío GRATIS</small>
                                            <button type="button" class="btn text-white w-100 fw-bold shadow-sm" style="background-color: #7828D8; border-radius: 8px;">
                                                <i class="bi bi-cart-plus"></i> AGREGAR
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- SLIDE 2 -->
                    <div class="carousel-item">
                        <div class="row row-cols-1 row-cols-md-4 g-4">
                            
                            <!-- CARD 5 -->
                            <div class="col">
                                <div class="card h-100 shadow border-0 p-2 card-producto" style="border-top: 4px solid #7828D8 !important; border-radius: 12px; position: relative;">
                                    <span class="badge position-absolute top-0 start-0 m-2 px-2 py-1 shadow-sm" style="background-color: #ffc107; color: #000; z-index: 2;"><i class="bi bi-lightning-fill"></i> DESTACADO</span>
                                    <div class="bg-light d-flex justify-content-center align-items-center mb-2 rounded mt-4" style="height: 180px;">
                                        <img src="/Imagenes Celulares/FOTO1.webp" alt="Samsung S26 Ultra" class="img-fluid p-2" style="max-height: 100%;">
                                    </div>
                                    <div class="card-body p-2 d-flex flex-column">
                                        <div class="mb-2">
                                            <span class="badge" style="background-color: rgba(120,40,216,0.1); color: #7828D8;">12 SIN INTERÉS</span>
                                        </div>
                                        <h6 class="card-title text-truncate fw-bold fs-5 mb-1">Samsung Galaxy S26 Ultra</h6>
                                        <div class="mt-auto">
                                            <h4 class="fw-bold mb-2" style="color: #7828D8;">$2.800.000</h4>
                                            <small class="text-success fw-bold d-block mb-3"><i class="bi bi-truck"></i> Envío GRATIS</small>
                                            <button type="button" class="btn text-white w-100 fw-bold shadow-sm" style="background-color: #7828D8; border-radius: 8px;">
                                                <i class="bi bi-cart-plus"></i> AGREGAR
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CARD 6 -->
                            <div class="col">
                                <div class="card h-100 shadow border-0 p-2 card-producto" style="border-top: 4px solid #7828D8 !important; border-radius: 12px; position: relative;">
                                    <span class="badge position-absolute top-0 start-0 m-2 px-2 py-1 shadow-sm" style="background-color: #ffc107; color: #000; z-index: 2;"><i class="bi bi-lightning-fill"></i> DESTACADO</span>
                                    <div class="bg-light d-flex justify-content-center align-items-center mb-2 rounded mt-4" style="height: 180px;">
                                        <img src="/Imagenes Computadoras/FOTO2.jfif" alt="Lenovo Legion" class="img-fluid p-2" style="max-height: 100%;">
                                    </div>
                                    <div class="card-body p-2 d-flex flex-column">
                                        <div class="mb-2">
                                            <span class="badge" style="background-color: rgba(120,40,216,0.1); color: #7828D8;">9 SIN INTERÉS</span>
                                        </div>
                                        <h6 class="card-title text-truncate fw-bold fs-5 mb-1">Lenovo Legion Pro 7i</h6>
                                        <div class="mt-auto">
                                            <h4 class="fw-bold mb-2" style="color: #7828D8;">$3.800.000</h4>
                                            <small class="text-success fw-bold d-block mb-3"><i class="bi bi-truck"></i> Envío GRATIS</small>
                                            <button type="button" class="btn text-white w-100 fw-bold shadow-sm" style="background-color: #7828D8; border-radius: 8px;">
                                                <i class="bi bi-cart-plus"></i> AGREGAR
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CARD 7 -->
                            <div class="col">
                                <div class="card h-100 shadow border-0 p-2 card-producto" style="border-top: 4px solid #7828D8 !important; border-radius: 12px; position: relative;">
                                    <span class="badge position-absolute top-0 start-0 m-2 px-2 py-1 shadow-sm" style="background-color: #ffc107; color: #000; z-index: 2;"><i class="bi bi-lightning-fill"></i> DESTACADO</span>
                                    <div class="bg-light d-flex justify-content-center align-items-center mb-2 rounded mt-4" style="height: 180px;">
                                        <img src="/imagenes heladeras/foto12.webp" alt="Hisense Side by Side" class="img-fluid p-2" style="max-height: 100%;">
                                    </div>
                                    <div class="card-body p-2 d-flex flex-column">
                                        <div class="mb-2">
                                            <span class="badge" style="background-color: rgba(120,40,216,0.1); color: #7828D8;">12 SIN INTERÉS</span>
                                        </div>
                                        <h6 class="card-title text-truncate fw-bold fs-5 mb-1">Hisense Side by Side</h6>
                                        <div class="mt-auto">
                                            <h4 class="fw-bold mb-2" style="color: #7828D8;">$2.950.000</h4>
                                            <small class="text-secondary fw-bold d-block mb-3"><i class="bi bi-truck"></i> Envío $12.000</small>
                                            <button type="button" class="btn text-white w-100 fw-bold shadow-sm" style="background-color: #7828D8; border-radius: 8px;">
                                                <i class="bi bi-cart-plus"></i> AGREGAR
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- CARD 8 -->
                            <div class="col">
                                <div class="card h-100 shadow border-0 p-2 card-producto" style="border-top: 4px solid #7828D8 !important; border-radius: 12px; position: relative;">
                                    <span class="badge position-absolute top-0 start-0 m-2 px-2 py-1 shadow-sm" style="background-color: #ffc107; color: #000; z-index: 2;"><i class="bi bi-lightning-fill"></i> DESTACADO</span>
                                    <div class="bg-light d-flex justify-content-center align-items-center mb-2 rounded mt-4" style="height: 180px;">
                                        <img src="/imagenes lavarropas/foto4.webp" alt="LG Direct Drive" class="img-fluid p-2" style="max-height: 100%;">
                                    </div>
                                    <div class="card-body p-2 d-flex flex-column">
                                        <div class="mb-2">
                                            <span class="badge" style="background-color: rgba(120,40,216,0.1); color: #7828D8;">AHORA 24</span>
                                        </div>
                                        <h6 class="card-title text-truncate fw-bold fs-5 mb-1">Lavarropas LG Direct Drive</h6>
                                        <div class="mt-auto">
                                            <h4 class="fw-bold mb-2" style="color: #7828D8;">$1.450.000</h4>
                                            <small class="text-success fw-bold d-block mb-3"><i class="bi bi-truck"></i> Envío GRATIS</small>
                                            <button type="button" class="btn text-white w-100 fw-bold shadow-sm" style="background-color: #7828D8; border-radius: 8px;">
                                                <i class="bi bi-cart-plus"></i> AGREGAR
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>

                <!-- CONTROLES CARRUSEL -->
                <button class="carousel-control-prev btn-nav-productos w-auto" type="button"
                    data-bs-target="#carruselProductos" data-bs-slide="prev" style="left: -15px;">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-3 shadow" aria-hidden="true"></span>
                </button>
                <button class="carousel-control-next btn-nav-productos w-auto" type="button"
                    data-bs-target="#carruselProductos" data-bs-slide="next" style="right: -15px;">
                    <span class="carousel-control-next-icon bg-dark rounded-circle p-3 shadow" aria-hidden="true"></span>
                </button>
            </div>
        </div>

        <!-- CARRUSEL DE BANNERS INFERIOR -->
        <div id="carouselExampleSlidesOnlyBottom" class="carousel slide mt-5" data-bs-ride="carousel">
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

    @include('plantillas.piedepagina')

    <!-- Iconos de Bootstrap (Asegurate de tener esto en tu head.blade.php, si no está, dejalos acá) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>