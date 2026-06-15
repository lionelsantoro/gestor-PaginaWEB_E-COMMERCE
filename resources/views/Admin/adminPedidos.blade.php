<!DOCTYPE html>
<html lang="es">

@include('plantillas.head', ['titulo' => 'PedidosAdmin'])

<body class="d-flex flex-column min-vh-100" style="background-color: #F4F6F9;">

    @include('plantillas.menu')

    <div class="container-fluid flex-grow-1 py-4 px-4">
        <div class="row h-100">
            
            {{-- MENÚ LATERAL ADMIN --}}
            <div class="col-md-3 col-lg-2 mb-4">
                @include('plantillas.menuAdmin') 
            </div>

            {{-- CONTENIDO PRINCIPAL --}}
            <div class="col-md-9 col-lg-10">
                <div class="p-4 rounded h-100 bg-white border shadow-sm">
                    
                    {{-- ENCABEZADO --}}
                    <div class="mb-4">
                        <h2 class="fw-bold mb-1">Gestión de Pedidos</h2>
                        <p class="text-muted">Control y visualización de las ventas realizadas en la plataforma</p>
                    </div>

                    {{-- ALERTAS --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- Alerta de error agregada --}}
                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- BARRA DE BÚSQUEDA Y FILTRO --}}
                    <div class="d-flex gap-3 mb-4 w-50">
                        <input type="text" id="buscadorPedidos" class="form-control rounded-pill" placeholder="Buscar por N° de pedido o cliente..." style="background-color: #F8F9FA; border: 1px solid #dee2e6;">
                        
                        <select id="filtroEstados" class="form-select rounded-pill" style="background-color: #F8F9FA; border: 1px solid #dee2e6; width: auto;">
                            <option value="todos" selected>Todos los estados</option>
                            <option value="pendientePago">Pendiente de Pago</option>
                            <option value="pagada">Pagada</option>
                            <option value="cancelada">Cancelada</option>
                        </select>
                    </div>

                    {{-- TABLA DE PEDIDOS --}}
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-0 border-bottom">
                            <thead class="border-bottom text-muted">
                                <tr>
                                    <th class="fw-normal pb-3">Pedido</th>
                                    <th class="fw-normal pb-3">Cliente</th>
                                    <th class="fw-normal pb-3">Total</th>
                                    <th class="fw-normal pb-3 text-center">Estado</th>
                                    <th class="fw-normal pb-3 text-center">Envío</th> {{-- Columna nueva --}}
                                    <th class="fw-normal pb-3 text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($pedidos as $pedido)
                                    <tr class="border-bottom fila-pedido" data-estado="{{ $pedido->estado }}">
                                        <td class="fw-bold text-dark">#{{ $pedido->id }}</td>
                                        <td class="fw-semibold text-secondary">{{ $pedido->usuario->nombreCompleto ?? 'Usuario Eliminado' }}</td>
                                        <td class="fw-bold" style="color: #7828D8;">$ {{ number_format($pedido->total, 0, ',', '.') }}</td>
                                        <td class="text-center">
                                            @if($pedido->estado == 'pagada')
                                                <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-3 py-2">Pagada</span>
                                            @elseif($pedido->estado == 'pendientePago')
                                                <span class="badge bg-warning bg-opacity-10 text-warning rounded-pill px-3 py-2">Pendiente</span>
                                            @else
                                                <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-3 py-2">Cancelada</span>
                                            @endif
                                        </td>
                                        
                                        {{-- Visualización dinámica del estado del envío --}}
                                        <td class="text-center">
                                            @if($pedido->envio == 'enviado')
                                                <span class="badge bg-info bg-opacity-10 text-info rounded-pill px-3 py-2">Enviado</span>
                                            @elseif($pedido->envio == 'listo para retirar')
                                                <span class="badge bg-primary bg-opacity-10 text-primary rounded-pill px-3 py-2">Listo para retirar</span>
                                            @else
                                                <span class="badge bg-secondary bg-opacity-10 text-secondary rounded-pill px-3 py-2">No enviado</span>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            <button class="btn btn-sm text-white rounded-pill px-3 fw-semibold" 
                                                    style="background-color: #7828D8;" 
                                                    data-bs-toggle="modal" 
                                                    data-bs-target="#modalItems{{ $pedido->id }}">
                                                Ver detalle
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center py-5 text-muted">
                                            No hay pedidos registrados en el sistema.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>

        </div>
    </div>

    @include('plantillas.piedepagina')

    {{-- ========================================== --}}
    {{-- ZONA DE MODALES (FUERA DE LA TABLA)        --}}
    {{-- ========================================== --}}
    
    @foreach($pedidos as $pedido)
        <div class="modal fade" id="modalItems{{ $pedido->id }}" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
                <div class="modal-content border-0 shadow-lg" style="border-radius: 12px;">
                    <div class="modal-header text-white" style="background-color: #7828D8; border-top-left-radius: 12px; border-top-right-radius: 12px;">
                        <h5 class="modal-title fw-bold">Detalle del Pedido #{{ $pedido->id }}</h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                    </div>
                    
                    <div class="modal-body p-4 bg-light">
                        
                        {{-- SECCIÓN EDITAR ENVÍO (AGREGADA) --}}
                        <div class="card mb-3 border-0 shadow-sm rounded-3">
                            <div class="card-body bg-white p-3">
                                <form action="{{ route('admin.pedidos.actualizarEnvio', $pedido->id) }}" method="POST" class="d-flex align-items-center justify-content-between gap-3">
                                    @csrf
                                    <div>
                                        <label class="fw-bold mb-0 text-dark small d-block">Estado del Envío</label>
                                        @if($pedido->estado !== 'pagada')
                                            <small class="text-danger">* Solo modificable si el pedido está Pagado</small>
                                        @endif
                                    </div>
                                    <div class="d-flex gap-2 align-items-center">
                                        <select name="envio" class="form-select form-select-sm rounded-pill" style="width: 200px;" {{ $pedido->estado !== 'pagada' ? 'disabled' : '' }}>
                                            <option value="no enviado" {{ $pedido->envio == 'no enviado' ? 'selected' : '' }}>No enviado</option>
                                            <option value="enviado" {{ $pedido->envio == 'enviado' ? 'selected' : '' }}>Enviado</option>
                                            <option value="listo para retirar" {{ $pedido->envio == 'listo para retirar' ? 'selected' : '' }}>Listo para retirar</option>
                                        </select>
                                        <button type="submit" class="btn btn-sm btn-dark rounded-pill px-3" {{ $pedido->estado !== 'pagada' ? 'disabled' : '' }}>
                                            Actualizar
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="bg-white p-0 rounded border overflow-hidden">
                            <table class="table border-0 mb-0">
                                <thead class="table-light text-muted small">
                                    <tr>
                                        <th class="ps-4 py-3 fw-semibold">Producto</th>
                                        <th class="text-center py-3 fw-semibold">Cant.</th>
                                        <th class="text-end py-3 fw-semibold">Precio Unit.</th>
                                        <th class="text-end pe-4 py-3 fw-semibold">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pedido->items as $item)
                                        <tr class="border-bottom">
                                            <td class="ps-4 py-3 fw-semibold text-dark">{{ $item->producto->nombre ?? 'Producto Eliminado' }}</td>
                                            <td class="text-center py-3">{{ $item->cantidad }}</td>
                                            <td class="text-end py-3 text-secondary">$ {{ number_format($item->precioUnitario, 0, ',', '.') }}</td>
                                            <td class="text-end pe-4 py-3 fw-bold text-dark">
                                                $ {{ number_format($item->cantidad * $item->precioUnitario, 0, ',', '.') }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="modal-footer bg-white border-top-0 py-3 px-4">
                        <h5 class="me-auto fw-bold mb-0">Total: <span style="color: #7828D8;">$ {{ number_format($pedido->total, 0, ',', '.') }}</span></h5>
                        <button type="button" class="btn btn-light fw-semibold border" data-bs-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach

    {{-- SCRIPTS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    {{-- SCRIPT PARA FILTRO Y BUSCADOR --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const filtroEstados = document.getElementById('filtroEstados');
            const buscadorPedidos = document.getElementById('buscadorPedidos');
            const filas = document.querySelectorAll('.fila-pedido');

            function filtrarTabla() {
                const estadoSeleccionado = filtroEstados.value;
                // Agregamos .trim() para limpiar espacios al principio o final accidentalmente
                const textoBuscado = buscadorPedidos.value.toLowerCase().trim(); 

                filas.forEach(fila => {
                    const estadoFila = fila.getAttribute('data-estado');
                    
                    // Extraemos ESPECÍFICAMENTE el texto de la columna 1 (Pedido) y columna 2 (Cliente)
                    const idPedido = fila.querySelector('td:nth-child(1)').innerText.toLowerCase();
                    const nombreCliente = fila.querySelector('td:nth-child(2)').innerText.toLowerCase();

                    const coincideEstado = (estadoSeleccionado === 'todos' || estadoFila === estadoSeleccionado);
                    
                    // Validamos si el texto buscado coincide con el ID o con el nombre
                    const coincideTexto = idPedido.includes(textoBuscado) || nombreCliente.includes(textoBuscado);

                    if (coincideEstado && coincideTexto) {
                        fila.style.display = ''; 
                    } else {
                        fila.style.display = 'none'; 
                    }
                });
            }

            filtroEstados.addEventListener('change', filtrarTabla);
            buscadorPedidos.addEventListener('input', filtrarTabla);
        });
    </script>
</body>
</html>