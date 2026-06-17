<!DOCTYPE html>
<html lang="es">

@include('plantillas.head', ['titulo' => 'PaginaPrincipal'])

<body class="d-flex flex-column min-vh-100">

    @include('plantillas.menu')

    {{-- CÓDIGO PHP PARA TRAER 10 PRODUCTOS Y REVISAR EL CARRITO DEL USUARIO --}}
    @php
        // Traemos máximo 10 productos activos para el carrusel
        $productosCarrusel = \App\Models\Producto::where('activo', true)->take(10)->get();

        $cantidadesCarrito = [];
        if(Auth::check()){
            $carritoActivo = \App\Models\Pedido::where('ID_Usuario', Auth::id())->where('estado', 'pendientePago')->with('items')->first();
            if($carritoActivo){
                foreach($carritoActivo->items as $item) {
                    $cantidadesCarrito[$item->ID_Producto] = $item->cantidad;
                }
            }
        }
    @endphp

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
                            <p class="text-muted mb-0" style="font-size: 0.95rem;">Lo último en smartphones, notebooks y smart TVs.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 bg-white border rounded h-100 shadow-sm d-flex flex-column align-items-center text-center">
                            <span class="fs-1 mb-2">❄️</span>
                            <h5 class="fw-bold">Electrodomésticos</h5>
                            <p class="text-muted mb-0" style="font-size: 0.95rem;">Equipá tu casa con las mejores marcas en heladeras y lavarropas.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="p-4 bg-white border rounded h-100 shadow-sm d-flex flex-column align-items-center text-center">
                            <span class="fs-1 mb-2">🛋️</span>
                            <h5 class="fw-bold">Hogar y Clima</h5>
                            <p class="text-muted mb-0" style="font-size: 0.95rem;">Aires acondicionados, calefacción y pequeños electrodomésticos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center text-center my-5">
            <div class="col-6 col-md-3 mb-3">
                <a href="/catalogo?categoria=1" class="text-decoration-none text-dark d-flex flex-column align-items-center">
                    <div class="bg-white rounded-circle shadow-sm mb-2 d-flex align-items-center justify-content-center"
                         style="width:80px;height:80px;border:2px solid transparent;transition:0.3s;"
                         onmouseover="this.style.borderColor='#7828D8'"
                         onmouseout="this.style.borderColor='transparent'">
                        <img src="/Imagenes inicio/foto7.png" class="img-fluid" style="max-width:60px;max-height:60px;object-fit:contain;">
                    </div>
                    <span class="fw-bold" style="color:#7828D8;">Teléfonos</span>
                </a>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <a href="/catalogo?categoria=2" class="text-decoration-none text-dark d-flex flex-column align-items-center">
                    <div class="bg-white rounded-circle shadow-sm mb-2 d-flex align-items-center justify-content-center"
                         style="width:80px;height:80px;border:2px solid transparent;transition:0.3s;"
                         onmouseover="this.style.borderColor='#7828D8'"
                         onmouseout="this.style.borderColor='transparent'">
                        <img src="/Imagenes inicio/foto8.png" class="img-fluid" style="max-width:60px;max-height:60px;object-fit:contain;">
                    </div>
                    <span class="fw-bold" style="color:#7828D8;">Computadoras</span>
                </a>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <a href="/catalogo?categoria=3" class="text-decoration-none text-dark d-flex flex-column align-items-center">
                    <div class="bg-white rounded-circle shadow-sm mb-2 d-flex align-items-center justify-content-center"
                         style="width:80px;height:80px;border:2px solid transparent;transition:0.3s;"
                         onmouseover="this.style.borderColor='#7828D8'"
                         onmouseout="this.style.borderColor='transparent'">
                        <img src="/Imagenes inicio/foto9.png" class="img-fluid" style="max-width:60px;max-height:60px;object-fit:contain;">
                    </div>
                    <span class="fw-bold" style="color:#7828D8;">Lavarropas</span>
                </a>
            </div>
            <div class="col-6 col-md-3 mb-3">
                <a href="/catalogo?categoria=4" class="text-decoration-none text-dark d-flex flex-column align-items-center">
                    <div class="bg-white rounded-circle shadow-sm mb-2 d-flex align-items-center justify-content-center"
                         style="width:80px;height:80px;border:2px solid transparent;transition:0.3s;"
                         onmouseover="this.style.borderColor='#7828D8'"
                         onmouseout="this.style.borderColor='transparent'">
                        <img src="/Imagenes inicio/foto10.png" class="img-fluid" style="max-width:60px;max-height:60px;object-fit:contain;">
                    </div>
                    <span class="fw-bold" style="color:#7828D8;">Heladeras</span>
                </a>
            </div>
        </div>

        <div class="p-4 mt-5 rounded bg-white shadow-sm">
            <h3 class="fw-bold mb-4 text-uppercase" style="color: #7828D8;">
                <i class="bi bi-stars"></i> Último en tecnología
            </h3>

            <div id="carruselProductos" class="carousel slide px-md-5" data-bs-ride="carousel">
                <div class="carousel-inner pb-4">
                    
                    {{-- Dividimos los 10 productos en grupos de 4 para cada diapositiva --}}
                    @foreach($productosCarrusel->chunk(4) as $chunk)
                        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                            <div class="row row-cols-1 row-cols-md-4 g-4">
                                
                                @foreach($chunk as $producto)
                                    @php
                                        $enCarrito = $cantidadesCarrito[$producto->id] ?? 0;
                                        $stockReal = $producto->stock;
                                        $stockDisponibleParaAgregar = $stockReal - $enCarrito;
                                    @endphp
                                    
                                    <div class="col">
                                        <div class="card h-100 shadow border-0 p-2 card-producto" style="border-top:4px solid #7828D8 !important;border-radius:12px;position:relative;">
                                            <span class="badge position-absolute top-0 start-0 m-2 px-2 py-1 shadow-sm" style="background-color:#ffc107;color:#000;z-index:2;">
                                                <i class="bi bi-lightning-fill"></i> DESTACADO
                                            </span>
                                            
                                            <div class="bg-light d-flex justify-content-center align-items-center mb-2 rounded mt-4" style="height: 220px;">
                                                <img src="{{ $producto->url_image }}" class="img-fluid p-2" alt="{{ $producto->nombre }}" style="max-height: 100%;">
                                            </div>

                                            <div class="card-body p-2 d-flex flex-column">
                                                <h5 class="card-title fs-5 fw-bold text-truncate">{{ $producto->nombre }}</h5>
                                                <h4 class="fw-bold mb-3 text-morado">
                                                    ${{ number_format($producto->precio, 0, ',', '.') }}
                                                </h4>

                                                <div class="card-text flex-grow-1" style="font-size: 0.9rem;">
                                                    {!! $producto->descripcion !!}
                                                    <br><br>
                                                    
                                                    @if($stockReal > 0)
                                                        <span class="text-success fw-bold">
                                                            <i class="bi bi-check-circle-fill me-1"></i>
                                                            Stock de tienda: <span class="stock-numero">{{ $stockReal }}</span> unidades
                                                        </span>
                                                    @else
                                                        <span class="text-danger fw-bold">
                                                            <i class="bi bi-x-circle-fill me-1"></i>
                                                            Agotado
                                                        </span>
                                                    @endif
                                                </div>

                                                {{-- BOTÓN CON LÓGICA DE BLOQUEO DE STOCK RESTANTE --}}
                                                <button type="button" class="btn text-white w-100 fw-bold mt-3 btn-agregar-carrito"
                                                    data-id="{{ $producto->id }}" 
                                                    data-stock-disponible="{{ $stockDisponibleParaAgregar }}"
                                                    data-nombre="{{ $producto->nombre }}" 
                                                    data-auth="{{ Auth::check() ? 'true' : 'false' }}"
                                                    style="background-color: {{ $stockDisponibleParaAgregar > 0 ? '#7828D8' : '#6c757d' }};"
                                                    {{ $stockDisponibleParaAgregar <= 0 ? 'disabled' : '' }}>
                                                    
                                                    @if($stockReal <= 0)
                                                        <i class="bi bi-x-circle"></i> SIN STOCK
                                                    @elseif($stockDisponibleParaAgregar <= 0)
                                                        <i class="bi bi-cart-check"></i> MÁXIMO EN CARRITO
                                                    @else
                                                        <i class="bi bi-cart-plus"></i> AGREGAR AL CARRITO
                                                    @endif
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    @endforeach

                </div>

                <button class="carousel-control-prev w-auto" type="button"
                        data-bs-target="#carruselProductos" data-bs-slide="prev" style="left:-15px;">
                    <span class="carousel-control-prev-icon bg-dark rounded-circle p-3 shadow"></span>
                </button>
                <button class="carousel-control-next w-auto" type="button"
                        data-bs-target="#carruselProductos" data-bs-slide="next" style="right:-15px;">
                    <span class="carousel-control-next-icon bg-dark rounded-circle p-3 shadow"></span>
                </button>
            </div>
        </div>

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

    {{-- ══════════════════ MODAL: CARRITO ══════════════════ --}}
    <div class="modal fade" id="modalCarrito" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
                <div id="modalCarritoHeader" class="py-4 text-center text-white">
                    <div id="modalCarritoIcono" style="font-size: 2.8rem;"></div>
                    <h5 id="modalCarritoTitulo" class="fw-bold mt-2 mb-0"></h5>
                </div>
                <div class="modal-body text-center px-4 py-4">
                    <p id="modalCarritoTexto" class="text-muted mb-0"></p>
                </div>
                <div class="modal-footer border-0 justify-content-center pb-4">
                    <button type="button"
                            class="btn text-white fw-bold px-5"
                            data-bs-dismiss="modal"
                            style="background-color: #7828D8; border-radius: 8px;">
                        Aceptar
                    </button>
                </div>
            </div>
        </div>
    </div>

    @include('plantillas.piedepagina')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 

    <script>
        const modalCarritoBS = new bootstrap.Modal(document.getElementById('modalCarrito'));

        function mostrarModalCarrito(titulo, texto, tipo) {
            const header = document.getElementById('modalCarritoHeader');
            document.getElementById('modalCarritoTitulo').textContent = titulo;
            document.getElementById('modalCarritoTexto').textContent  = texto;

            if (tipo === 'error') {
                header.style.background = 'linear-gradient(135deg, #dc3545, #c82333)';
                document.getElementById('modalCarritoIcono').innerHTML =
                    '<i class="bi bi-x-circle-fill"></i>';
            } else {
                header.style.background = 'linear-gradient(135deg, #28a745, #20c997)';
                document.getElementById('modalCarritoIcono').innerHTML =
                    '<i class="bi bi-check-circle-fill"></i>';
            }
            modalCarritoBS.show();
        }

        document.querySelectorAll('.btn-agregar-carrito').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const boton = this;
                const idProducto = boton.dataset.id;
                let stockDisponible = parseInt(boton.dataset.stockDisponible);
                const nombre     = boton.dataset.nombre;
                const authed     = boton.dataset.auth;

                // No logueado → al login
                if (authed === 'false') {
                    window.location.href = '/login';
                    return;
                }
                
                if (stockDisponible <= 0) {
                    mostrarModalCarrito(
                        'Límite de stock',
                        `Ya agregaste todas las unidades disponibles de "${nombre}" a tu carrito.`,
                        'error'
                    );
                    return;
                }

                // Spinner
                boton.disabled = true;
                boton.innerHTML =
                    '<span class="spinner-border spinner-border-sm me-2"></span>Agregando...';

                fetch('/carrito/agregar/' + idProducto, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Content-Type': 'application/json',
                        'Accept':       'application/json'
                    }
                })
                .then(r => r.json())
                .then(data => {
                    if (data.status === 'unauthenticated') {
                        window.location.href = '/login';
                    } else if (data.status === 'error') {
                        mostrarModalCarrito('Error', data.message, 'error');
                    } else {
                        // Restamos localmente el stock para bloquear si intenta agregar más
                        stockDisponible -= 1;
                        boton.dataset.stockDisponible = stockDisponible;
                        
                        if (stockDisponible <= 0) {
                            boton.style.backgroundColor = '#6c757d';
                        }
                        
                        mostrarModalCarrito(
                            '¡Producto agregado!',
                            `"${nombre}" fue agregado a tu carrito.`,
                            'success'
                        );
                        // Actualizar badge del navbar
                        const badge = document.querySelector('.badge.bg-danger');
                        if (badge) badge.textContent = parseInt(badge.textContent || '0') + 1;
                    }
                })
                .catch(() => {
                    mostrarModalCarrito('Error', 'No se pudo conectar. Intentá de nuevo.', 'error');
                })
                .finally(() => {
                    if (stockDisponible > 0) {
                        boton.disabled = false;
                        boton.innerHTML = '<i class="bi bi-cart-plus"></i> AGREGAR AL CARRITO';
                    } else {
                        boton.disabled = true;
                        boton.innerHTML = '<i class="bi bi-cart-check"></i> MÁXIMO EN CARRITO';
                    }
                });
            });
        });
    </script>

</body>
</html>