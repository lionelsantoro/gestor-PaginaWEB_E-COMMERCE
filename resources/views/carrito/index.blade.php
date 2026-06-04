<!DOCTYPE html>
<html lang="es">

@include('plantillas.head', ['titulo' => 'Mi Carrito'])

<body class="d-flex flex-column min-vh-100">

    @include('plantillas.menu')

    <div class="container my-5 flex-grow-1">
        <h1 class="text-center mb-4 fw-bold" style="color: #7828D8;">🛒 Mi Carrito</h1>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(!$pedido || $pedido->items->isEmpty())

            {{-- CARRITO VACÍO --}}
            <div class="text-center py-5">
                <i class="bi bi-cart-x" style="font-size: 5rem; color: #ccc;"></i>
                <h3 class="mt-3 text-muted">Tu carrito está vacío</h3>
                <a href="/catalogo"
                   class="btn text-white fw-bold mt-3 px-5"
                   style="background-color: #7828D8; border-radius: 8px;">
                    Ver catálogo
                </a>
            </div>

        @else

            {{-- TABLA --}}
            <div class="table-responsive shadow-sm rounded">
                <table class="table table-striped align-middle mb-0">
                    <thead class="text-white" style="background-color: #7828D8;">
                        <tr>
                            <th class="py-3 ps-4">Producto</th>
                            <th class="py-3 text-center">Precio unitario</th>
                            <th class="py-3 text-center">Cantidad</th>
                            <th class="py-3 text-center">Subtotal</th>
                            <th class="py-3 text-center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pedido->items as $item)
                        <tr>
                            <td class="ps-4">
                                <div class="d-flex align-items-center gap-3">
                                    <img src="{{ $item->producto->url_image }}"
                                         alt="{{ $item->producto->nombre }}"
                                         style="width: 60px; height: 60px; object-fit: contain;">
                                    <span class="fw-semibold">{{ $item->producto->nombre }}</span>
                                </div>
                            </td>

                            <td class="text-center">
                                ${{ number_format($item->precioUnitario, 0, ',', '.') }}
                            </td>

                            <td class="text-center">
                                <form action="/carrito/actualizar/{{ $item->id }}"
                                      method="POST"
                                      class="form-actualizar-cantidad"
                                      data-stock="{{ $item->producto->stock }}"
                                      data-nombre="{{ $item->producto->nombre }}">
                                    @csrf
                                    <div class="d-flex justify-content-center align-items-center gap-2">
                                        <input type="number"
                                               name="cantidad"
                                               value="{{ $item->cantidad }}"
                                               min="1"
                                               max="{{ $item->producto->stock }}"
                                               class="form-control form-control-sm text-center input-cantidad fw-bold"
                                               style="width: 75px;">
                                        <button type="submit"
                                                class="btn btn-sm fw-semibold text-white"
                                                style="background-color: #7828D8;">
                                            Actualizar
                                        </button>
                                    </div>
                                    <small class="text-muted d-block mt-1" style="font-size: 0.75rem;">
                                        Disponible: {{ $item->producto->stock }}
                                    </small>
                                </form>
                            </td>

                            <td class="text-center fw-bold" style="color: #7828D8;">
                                ${{ number_format($item->cantidad * $item->precioUnitario, 0, ',', '.') }}
                            </td>

                            <td class="text-center">
                                <button type="button"
                                        class="btn btn-sm btn-danger fw-semibold btn-eliminar"
                                        data-url="/carrito/eliminar/{{ $item->id }}"
                                        data-nombre="{{ $item->producto->nombre }}">
                                    <i class="bi bi-trash3"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>

                    <tfoot>
                        <tr class="table-light">
                            <td colspan="3" class="text-end fw-bold fs-5 pe-4">Total:</td>
                            <td class="text-center fw-bold fs-5" style="color: #7828D8;">
                                ${{ number_format($pedido->total, 0, ',', '.') }}
                            </td>
                            <td></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            {{-- FORMULARIO DE PAGO --}}
            <div class="card border-0 shadow-sm mt-4 p-4">
                <h4 class="fw-bold mb-4" style="color: #7828D8;">
                    <i class="bi bi-credit-card-2-front me-2"></i>Finalizar compra
                </h4>

                <form id="formPago" action="/carrito/pagar" method="POST" class="row g-3">
                    @csrf

                    {{-- Dirección --}}
                    <div class="col-12">
                        <h6 class="fw-bold text-muted text-uppercase mb-2"
                            style="font-size: 0.75rem; letter-spacing: 1px;">
                            Datos de entrega
                        </h6>
                    </div>
                    <div class="col-12">
                        <label for="direccion" class="form-label fw-semibold">
                            <i class="bi bi-geo-alt me-1"></i>Dirección de entrega
                        </label>
                        <input type="text"
                               name="direccion"
                               id="direccion"
                               class="form-control"
                               placeholder="Ej: Av. Corrientes 1234, Corrientes">
                    </div>

                    {{-- Datos de pago --}}
                    <div class="col-12 mt-2">
                        <h6 class="fw-bold text-muted text-uppercase mb-2"
                            style="font-size: 0.75rem; letter-spacing: 1px;">
                            Datos de pago
                        </h6>
                    </div>

                    <div class="col-12">
                        <label for="nroTarjeta" class="form-label fw-semibold">
                            Número de tarjeta
                        </label>
                        <div class="input-group">
                            <span class="input-group-text" style="border-right: 0;">
                                <i class="bi bi-credit-card" id="iconoTarjeta"></i>
                            </span>
                            <input type="text"
                                   id="nroTarjeta"
                                   class="form-control"
                                   placeholder="0000 0000 0000 0000"
                                   maxlength="19"
                                   style="border-left: 0; letter-spacing: 2px;">
                        </div>
                    </div>

                    <div class="col-12">
                        <label for="titular" class="form-label fw-semibold">
                            Nombre del titular
                        </label>
                        <input type="text"
                               id="titular"
                               class="form-control text-uppercase"
                               placeholder="TAL COMO FIGURA EN LA TARJETA">
                    </div>

                    <div class="col-md-6">
                        <label for="vencimiento" class="form-label fw-semibold">
                            Vencimiento
                        </label>
                        <input type="text"
                               id="vencimiento"
                               class="form-control"
                               placeholder="MM/AA"
                               maxlength="5">
                    </div>

                    <div class="col-md-6">
                        <label for="cvv" class="form-label fw-semibold">
                            CVV
                            <i class="bi bi-question-circle text-muted ms-1"
                               data-bs-toggle="tooltip"
                               title="Los 3 dígitos del dorso de tu tarjeta"></i>
                        </label>
                        <input type="password"
                               id="cvv"
                               class="form-control"
                               placeholder="•••"
                               maxlength="4">
                    </div>

                    <div class="col-12 mt-3">
                        <button type="submit"
                                id="btnConfirmar"
                                class="btn text-white fw-bold w-100 py-3"
                                style="background: linear-gradient(135deg, #28a745, #20c997);
                                       border-radius: 10px;
                                       font-size: 1.1rem;
                                       border: none;
                                       box-shadow: 0 4px 15px rgba(40,167,69,0.3);">
                            <i class="bi bi-bag-check-fill me-2"></i>
                            Confirmar compra · ${{ number_format($pedido->total, 0, ',', '.') }}
                        </button>
                    </div>
                </form>
            </div>

            {{-- SEGUIR COMPRANDO --}}
            <div class="mt-4 text-center">
                <a href="/catalogo" class="btn-seguir-comprando">
                    <span class="btn-seguir-inner">
                        <i class="bi bi-arrow-left-circle-fill me-2"></i>
                        Seguir comprando
                    </span>
                </a>
            </div>

        @endif
    </div>

    {{-- ══════════════════ MODAL: ELIMINAR ══════════════════ --}}
    <div class="modal fade" id="modalEliminar" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
                <div class="py-4 text-center text-white"
                     style="background: linear-gradient(135deg, #dc3545, #c82333);">
                    <i class="bi bi-trash3-fill" style="font-size: 2.8rem;"></i>
                    <h5 class="fw-bold mt-2 mb-0">¿Eliminar producto?</h5>
                </div>
                <div class="modal-body text-center px-4 py-4">
                    <p class="text-muted mb-1">Estás por quitar del carrito:</p>
                    <p id="modalEliminarNombre" class="fw-bold fs-5 mb-3" style="color: #7828D8;"></p>
                    <p class="text-muted" style="font-size: 0.9rem;">Esta acción no se puede deshacer.</p>
                </div>
                <div class="modal-footer border-0 px-4 pb-4 gap-2 justify-content-center">
                    <button type="button"
                            class="btn btn-outline-secondary fw-semibold px-4"
                            data-bs-dismiss="modal">
                        <i class="bi bi-x-lg me-1"></i>Cancelar
                    </button>
                    <a href="#"
                       id="btnConfirmarEliminar"
                       class="btn text-white fw-bold px-4"
                       style="background: linear-gradient(135deg, #dc3545, #c82333); border-radius: 8px;">
                        <i class="bi bi-trash3 me-1"></i>Sí, eliminar
                    </a>
                </div>
            </div>
        </div>
    </div>

    {{-- ══════════════════ MODAL: STOCK ══════════════════ --}}
    <div class="modal fade" id="modalStock" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 16px; overflow: hidden;">
                <div class="py-4 text-center text-white"
                     style="background: linear-gradient(135deg, #fd7e14, #e55a00);">
                    <i class="bi bi-exclamation-triangle-fill" style="font-size: 2.8rem;"></i>
                    <h5 class="fw-bold mt-2 mb-0">Stock insuficiente</h5>
                </div>
                <div class="modal-body text-center px-4 py-4">
                    <p id="modalStockTexto" class="text-muted mb-0"></p>
                </div>
                <div class="modal-footer border-0 justify-content-center pb-4">
                    <button type="button"
                            class="btn text-white fw-bold px-5"
                            data-bs-dismiss="modal"
                            style="background-color: #7828D8; border-radius: 8px;">
                        Entendido
                    </button>
                </div>
            </div>
        </div>
    </div>

    {{-- ══════════════════ MODAL: COMPRA EXITOSA ══════════════════ --}}
    {{-- data-bs-backdrop="static" → no se cierra haciendo clic afuera --}}
    <div class="modal fade" id="modalCompraExitosa" tabindex="-1"
         data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg" style="border-radius: 20px; overflow: hidden;">

                {{-- Franja verde animada --}}
                <div class="py-5 text-center text-white"
                     style="background: linear-gradient(135deg, #28a745, #20c997);">
                    <div class="icono-exito-wrapper mb-3">
                        <div class="icono-exito">
                            <i class="bi bi-check-lg" style="font-size: 2.5rem;"></i>
                        </div>
                    </div>
                    <h4 class="fw-bold mb-1">¡Compra confirmada!</h4>
                    <p class="mb-0" style="opacity: 0.9;">Tu pedido fue registrado con éxito</p>
                </div>

                <div class="modal-body text-center px-4 py-4">
                    <p class="text-muted mb-0">
                        Nos contactaremos para coordinar la entrega a tu domicilio.
                        ¡Gracias por elegirnos!
                    </p>
                </div>

                <div class="modal-footer border-0 justify-content-center pb-4">
                    <button type="button"
                            id="btnIrAlCatalogo"
                            class="btn text-white fw-bold px-5 py-2"
                            style="background: linear-gradient(135deg, #7828D8, #a855f7);
                                   border-radius: 10px;
                                   font-size: 1rem;
                                   border: none;
                                   box-shadow: 0 4px 15px rgba(120,40,216,0.3);">
                        <i class="bi bi-shop me-2"></i>Ir al catálogo
                    </button>
                </div>

            </div>
        </div>
    </div>

    @include('plantillas.piedepagina')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <style>
        /* ─── Botón Seguir Comprando ─── */
        .btn-seguir-comprando { display: inline-block; text-decoration: none; }
        .btn-seguir-inner {
            display: inline-flex;
            align-items: center;
            padding: 12px 28px;
            font-weight: 700;
            font-size: 1rem;
            color: #7828D8;
            background: white;
            border: 2px solid #7828D8;
            border-radius: 50px;
            transition: all 0.25s ease;
            box-shadow: 0 4px 12px rgba(120,40,216,0.15);
        }
        .btn-seguir-comprando:hover .btn-seguir-inner {
            background: #7828D8;
            color: white;
            box-shadow: 0 6px 20px rgba(120,40,216,0.35);
            transform: translateY(-2px);
        }

        /* ─── Animación del ícono de éxito ─── */
        .icono-exito-wrapper {
            display: flex;
            justify-content: center;
        }
        .icono-exito {
            width: 75px;
            height: 75px;
            border-radius: 50%;
            background: rgba(255,255,255,0.25);
            display: flex;
            align-items: center;
            justify-content: center;
            animation: popIn 0.45s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards;
        }
        @keyframes popIn {
            0%   { transform: scale(0); opacity: 0; }
            70%  { transform: scale(1.15); }
            100% { transform: scale(1); opacity: 1; }
        }

        /* ─── Hover botón Confirmar ─── */
        #btnConfirmar:hover {
            opacity: 0.92;
            transform: translateY(-1px);
            transition: all 0.2s ease;
        }

        /* ─── Fuente monoespaciada en tarjeta ─── */
        #nroTarjeta { font-family: 'Courier New', monospace; }
    </style>

    <script>
        // ── Tooltips ──────────────────────────────────────────────────────────
        document.querySelectorAll('[data-bs-toggle="tooltip"]')
                .forEach(el => new bootstrap.Tooltip(el));

        // ── Modal eliminar ────────────────────────────────────────────────────
        const modalEliminarBS = new bootstrap.Modal(document.getElementById('modalEliminar'));

        document.querySelectorAll('.btn-eliminar').forEach(function (btn) {
            btn.addEventListener('click', function () {
                document.getElementById('modalEliminarNombre').textContent = this.dataset.nombre;
                document.getElementById('btnConfirmarEliminar').setAttribute('href', this.dataset.url);
                modalEliminarBS.show();
            });
        });

        // ── Modal stock ───────────────────────────────────────────────────────
        const modalStockBS = new bootstrap.Modal(document.getElementById('modalStock'));

        function mostrarModalStock(texto) {
            document.getElementById('modalStockTexto').textContent = texto;
            modalStockBS.show();
        }

        document.querySelectorAll('.form-actualizar-cantidad').forEach(function (form) {
            form.addEventListener('submit', function (e) {
                const stock    = parseInt(this.dataset.stock);
                const nombre   = this.dataset.nombre;
                const input    = this.querySelector('.input-cantidad');
                const cantidad = parseInt(input.value);

                if (isNaN(cantidad) || cantidad < 1) {
                    e.preventDefault();
                    mostrarModalStock('La cantidad mínima es 1 unidad.');
                    input.value = 1;
                    return;
                }
                if (cantidad > stock) {
                    e.preventDefault();
                    mostrarModalStock(
                        `Solo hay ${stock} unidad${stock === 1 ? '' : 'es'} disponible${stock === 1 ? '' : 's'} de "${nombre}". Se ajustó al máximo.`
                    );
                    input.value = stock;
                }
            });
        });

        document.querySelectorAll('.input-cantidad').forEach(function (input) {
            input.addEventListener('change', function () {
                const stock = parseInt(this.closest('.form-actualizar-cantidad').dataset.stock);
                let val     = parseInt(this.value);
                if (isNaN(val) || val < 1) { this.value = 1;     return; }
                if (val > stock)            { this.value = stock; return; }
            });
        });

        // ── Modal compra exitosa ──────────────────────────────────────────────
        const modalExitoBS = new bootstrap.Modal(document.getElementById('modalCompraExitosa'));

        // Al hacer clic en "Ir al catálogo" → redirige
        document.getElementById('btnIrAlCatalogo').addEventListener('click', function () {
            window.location.href = '/catalogo';
        });

        // ── Interceptar submit del formulario de pago ─────────────────────────
        const formPago     = document.getElementById('formPago');
        const btnConfirmar = document.getElementById('btnConfirmar');

        formPago.addEventListener('submit', function (e) {
            e.preventDefault();

            // Validar campos visualmente
            const campos = [
                document.getElementById('direccion'),
                document.getElementById('nroTarjeta'),
                document.getElementById('titular'),
                document.getElementById('vencimiento'),
                document.getElementById('cvv'),
            ];

            let valido = true;
            campos.forEach(campo => {
                if (!campo.value.trim()) {
                    campo.classList.add('is-invalid');
                    valido = false;
                } else {
                    campo.classList.remove('is-invalid');
                }
            });

            if (!valido) return;

            // Spinner en el botón
            btnConfirmar.disabled = true;
            btnConfirmar.innerHTML =
                '<span class="spinner-border spinner-border-sm me-2"></span>Procesando pago...';

            const formData = new FormData(this);

            fetch('/carrito/pagar', {
                method: 'POST',
                headers: {
                    'Accept':           'application/json',
                    'X-Requested-With': 'XMLHttpRequest',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: formData
            })
            .then(r => r.json())
            .then(data => {
                if (data.status === 'success') {
                    modalExitoBS.show();
                }
            })
            .catch(() => {
                // Si falla el fetch, submit normal como fallback
                formPago.submit();
            })
            .finally(() => {
                btnConfirmar.disabled = false;
                btnConfirmar.innerHTML =
                    '<i class="bi bi-bag-check-fill me-2"></i>Confirmar compra';
            });
        });

        // ── Formateo número de tarjeta ────────────────────────────────────────
        document.getElementById('nroTarjeta').addEventListener('input', function () {
            let val = this.value.replace(/\D/g, '').substring(0, 16);
            this.value = val.match(/.{1,4}/g)?.join(' ') || val;
        });

        // ── Formateo MM/AA ────────────────────────────────────────────────────
        document.getElementById('vencimiento').addEventListener('input', function () {
            let val = this.value.replace(/\D/g, '').substring(0, 4);
            if (val.length >= 3) val = val.substring(0, 2) + '/' + val.substring(2);
            this.value = val;
        });

        // ── Solo números en CVV ───────────────────────────────────────────────
        document.getElementById('cvv').addEventListener('input', function () {
            this.value = this.value.replace(/\D/g, '').substring(0, 4);
        });
    </script>

</body>
</html>