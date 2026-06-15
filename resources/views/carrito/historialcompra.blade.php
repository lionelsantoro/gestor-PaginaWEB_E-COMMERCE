<!DOCTYPE html>
<html lang="es">

@include('plantillas.head', ['titulo' => 'Historial de compra'])

<body class="d-flex flex-column min-vh-100">

    @include('plantillas.menu')

    <div class="container my-5 flex-grow-1">
        <h1 class="text-center mb-4 fw-bold" style="color: #7828D8;">
            <i class="bi bi-clock-history me-2"></i>Historial de Compras
        </h1>

        {{-- SI NO HAY PEDIDOS --}}
        @if($pedidos->isEmpty())
            <div class="text-center py-5">
                <i class="bi bi-bag-x" style="font-size: 5rem; color: #ccc;"></i>
                <h3 class="mt-3 text-muted">Aún no tienes compras realizadas</h3>
                <a href="/catalogo" class="btn text-white fw-bold mt-3 px-5" style="background-color: #7828D8; border-radius: 8px;">
                    Ver catálogo
                </a>
            </div>
        @else
            {{-- TABLA PRINCIPAL DE PEDIDOS --}}
            <div class="table-responsive shadow-sm rounded mb-4">
                <table class="table table-striped table-hover align-middle mb-0">
                    <thead class="text-white" style="background-color: #7828D8;">
                        <tr>
                            <th class="py-3 ps-4">N° de Pedido</th>
                            <th class="py-3">Fecha</th>
                            <th class="py-3 text-center">Estado</th>
                            <th class="py-3">Dirección de entrega</th>
                            <th class="py-3 text-center">Total</th>
                            <th class="py-3 text-center">Productos</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- PRIMER BUCLE: Solo dibujamos las filas de la tabla --}}
                        @foreach($pedidos as $pedido)
                        <tr>
                            <td class="ps-4 fw-bold text-muted">#{{ str_pad($pedido->id, 5, '0', STR_PAD_LEFT) }}</td>
                            <td>{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                            <td class="text-center">
                                @if($pedido->estado == 'pagada')
                                    <span class="badge bg-success px-2 py-1">Pagada</span>
                                @elseif($pedido->estado == 'pendientePago')
                                    <span class="badge bg-warning text-dark px-2 py-1">Pendiente</span>
                                @elseif($pedido->estado == 'cancelada')
                                    <span class="badge bg-danger px-2 py-1">Cancelada</span>
                                @else
                                    <span class="badge bg-secondary px-2 py-1">{{ ucfirst($pedido->estado) }}</span>
                                @endif
                            </td>
                            
                            {{-- MODIFICACIÓN AQUÍ: --}}
                            <td>
                                @if($pedido->estado == 'pendientePago')
                                    {{-- No mostramos NADA --}}
                                @else
                                    {{ $pedido->direccion ?? '' }}
                                @endif
                            </td>
                            
                            <td class="text-center fw-bold" style="color: #7828D8;">
                                ${{ number_format($pedido->total, 0, ',', '.') }}
                            </td>
                            <td class="text-center">
                                {{-- BOTÓN QUE ABRE EL MODAL --}}
                                <button type="button" class="btn btn-sm text-white fw-semibold" style="background-color: #7828D8;" data-bs-toggle="modal" data-bs-target="#modalDetalle{{ $pedido->id }}">
                                    <i class="bi bi-eye me-1"></i> Ver detalles
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- SEGUNDO BUCLE: Dibujamos los modales completamente por fuera de la tabla --}}
            @foreach($pedidos as $pedido)
            <div class="modal fade" id="modalDetalle{{ $pedido->id }}" tabindex="-1" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        
                        {{-- Encabezado --}}
                        <div class="modal-header text-white" style="background-color: #7828D8;">
                            <h5 class="modal-title">Detalle del Pedido #{{ str_pad($pedido->id, 5, '0', STR_PAD_LEFT) }}</h5>
                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                        </div>
                        
                        {{-- Cuerpo --}}
                        <div class="modal-body p-4">
                            
                            <table class="table border">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th class="text-center">Cant.</th>
                                        <th class="text-end">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($pedido->items as $item)
                                    <tr>
                                        <td>{{ $item->producto->nombre }}</td>
                                        <td class="text-center">{{ $item->cantidad }}</td>
                                        <td class="text-end">$ {{ number_format($item->cantidad * $item->precioUnitario, 0, ',', '.') }}</td>
                                    </tr>
                                    @endforeach
                                    
                                    {{-- Fila del Total --}}
                                    <tr class="table-light">
                                        <td colspan="2" class="text-end fw-bold">Total Abonado:</td>
                                        <td class="text-end fw-bold" style="color: #7828D8;">$ {{ number_format($pedido->total, 0, ',', '.') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        
                        {{-- Pie --}}
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        </div>
                        
                    </div>
                </div>
            </div>
            @endforeach

        @endif
    </div>

    @include('plantillas.piedepagina')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>