<!DOCTYPE html>
<html lang="es">

@include('plantillas.head', ['titulo' => 'Catálogo Dinámico'])

<body class="d-flex flex-column min-vh-100">

    @include('plantillas.menu')

    <div class="container my-5">
        <h1 class="text-center mb-4 text-morado fw-bold">Nuestro Catálogo</h1>

        {{-- FILTROS --}}
        <div class="d-flex justify-content-center flex-wrap mb-5 gap-2">
            <a href="/catalogo?categoria=todas"
               class="btn {{ request('categoria') == 'todas' || !request()->has('categoria') ? 'btn-primary' : 'btn-outline-primary' }}"
               style="{{ request('categoria') == 'todas' || !request()->has('categoria') ? 'background-color:#7828D8;border-color:#7828D8;' : 'color:#7828D8;border-color:#7828D8;' }}">
                Todas
            </a>
            @foreach($categorias as $categoria)
                <a href="/catalogo?categoria={{ $categoria->id }}"
                   class="btn {{ request('categoria') == $categoria->id ? 'btn-primary' : 'btn-outline-primary' }}"
                   style="{{ request('categoria') == $categoria->id ? 'background-color:#7828D8;border-color:#7828D8;' : 'color:#7828D8;border-color:#7828D8;' }}">
                    {{ $categoria->nombre }}
                </a>
            @endforeach
        </div>

        {{-- GRILLA DE PRODUCTOS --}}
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse($productos as $producto)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 p-2 card-producto">
                        <div class="bg-light d-flex justify-content-center align-items-center mb-2 rounded"
                             style="height: 220px;">
                            <img src="{{ $producto->url_image }}"
                                 class="img-fluid p-2"
                                 alt="{{ $producto->nombre }}"
                                 style="max-height: 100%;">
                        </div>

                        <div class="card-body p-2 d-flex flex-column">
                            <h5 class="card-title fs-5 fw-bold text-truncate">{{ $producto->nombre }}</h5>
                            <h4 class="fw-bold mb-3 text-morado">
                                ${{ number_format($producto->precio, 0, ',', '.') }}
                            </h4>

                            <div class="card-text flex-grow-1" style="font-size: 0.9rem;">
                                {!! $producto->descripcion !!}
                                <br><br>
                                @if($producto->stock > 0)
                                    <span class="text-success fw-bold">
                                        <i class="bi bi-check-circle-fill me-1"></i>
                                        Stock: {{ $producto->stock }} unidades
                                    </span>
                                @else
                                    <span class="text-danger fw-bold">
                                        <i class="bi bi-x-circle-fill me-1"></i>
                                        Sin stock
                                    </span>
                                @endif
                            </div>

                            {{--
                                data-id      → ID del producto para el fetch
                                data-stock   → stock actual para validar antes del fetch
                                data-nombre  → nombre para mostrar en el modal
                                data-auth    → si el usuario está logueado
                            --}}
                            <button type="button"
                                    class="btn text-white w-100 fw-bold mt-3 btn-agregar-carrito"
                                    data-id="{{ $producto->id }}"
                                    data-stock="{{ $producto->stock }}"
                                    data-nombre="{{ $producto->nombre }}"
                                    data-auth="{{ Auth::check() ? 'true' : 'false' }}"
                                    style="background-color: #7828D8;
                                           {{ $producto->stock <= 0 ? 'opacity: 0.5;' : '' }}">
                                <i class="bi bi-cart-plus"></i> AGREGAR AL CARRITO
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center my-5">
                    <h3 class="text-muted">No se encontraron productos.</h3>
                </div>
            @endforelse
        </div>

        {{-- PAGINACIÓN --}}
        <div class="d-flex justify-content-center mt-5">
            {{ $productos->links() }}
        </div>
    </div>

    {{-- MODAL DE MENSAJES DEL CARRITO --}}
    <div class="modal fade" id="modalCarrito" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow">
                <div class="modal-body text-center p-5">
                    <div id="modalCarritoIcono" class="mb-3" style="font-size: 3.5rem;"></div>
                    <h5 id="modalCarritoTitulo" class="fw-bold mb-2"></h5>
                    <p id="modalCarritoTexto" class="text-muted mb-4"></p>
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

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <script>
        const modalCarritoBS = new bootstrap.Modal(document.getElementById('modalCarrito'));

        // Muestra el modal con ícono de éxito o error
        function mostrarModalCarrito(titulo, texto, tipo) {
            document.getElementById('modalCarritoTitulo').textContent = titulo;
            document.getElementById('modalCarritoTexto').textContent  = texto;
            document.getElementById('modalCarritoIcono').innerHTML = tipo === 'error'
                ? '<i class="bi bi-x-circle-fill text-danger"></i>'
                : '<i class="bi bi-check-circle-fill text-success"></i>';
            modalCarritoBS.show();
        }

        document.querySelectorAll('.btn-agregar-carrito').forEach(function (btn) {
            btn.addEventListener('click', function () {
                const idProducto = this.dataset.id;
                const stock      = parseInt(this.dataset.stock);
                const nombre     = this.dataset.nombre;
                const authed     = this.dataset.auth;

                // 1. Usuario no logueado → redirigir al login
                if (authed === 'false') {
                    window.location.href = '/login';
                    return;
                }

                // 2. Sin stock → popup de error, nada más
                if (stock <= 0) {
                    mostrarModalCarrito(
                        'Sin stock disponible',
                        `"${nombre}" no tiene unidades disponibles en este momento.`,
                        'error'
                    );
                    return;
                }

                // 3. Agregar al carrito vía fetch
                const boton = this;
                boton.disabled = true;
                boton.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Agregando...';

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
                        // El backend devuelve error (ej: se agotó el stock entre clicks)
                        mostrarModalCarrito('Sin stock', data.message, 'error');
                    } else {
                        mostrarModalCarrito(
                            '¡Producto agregado!',
                            `"${nombre}" fue agregado a tu carrito correctamente.`,
                            'success'
                        );
                        // Actualizar el badge del navbar si existe
                        const badge = document.querySelector('.badge.bg-danger');
                        if (badge) {
                            badge.textContent = parseInt(badge.textContent || '0') + 1;
                        }
                    }
                })
                .catch(() => {
                    mostrarModalCarrito(
                        'Error inesperado',
                        'No se pudo conectar con el servidor. Intentá de nuevo.',
                        'error'
                    );
                })
                .finally(() => {
                    boton.disabled = false;
                    boton.innerHTML = '<i class="bi bi-cart-plus"></i> AGREGAR AL CARRITO';
                });
            });
        });
    </script>

</body>
</html>