<!DOCTYPE html>
<html lang="es">

@include('plantillas.head', ['titulo' => 'ProductosAdmin'])

<body class="d-flex flex-column min-vh-100" style="background-color: #F4F6F9;">

    @include('plantillas.menu')

    <div class="container-fluid flex-grow-1 py-4 px-4">
        <div class="row h-100">
            
            <div class="col-md-3 col-lg-2 mb-4">
                @include('plantillas.menuAdmin') 
            </div>

            <div class="col-md-9 col-lg-10">
                <div class="p-4 rounded h-100 bg-white border shadow-sm">
                    
                    <div class="mb-4 border-bottom pb-3">
                        <h2 class="fw-bold mb-1">Gestión de productos</h2>
                        <p class="text-muted mb-0">Administración del catálogo de e-commerce</p>
                    </div>

                    {{-- CONSULTA DINÁMICA DE CONTADORES POR CATEGORÍA (Solo activos) --}}
                    @php
                        $cantTelefonos = \App\Models\Producto::where('ID_categoria', 1)->where('activo', true)->count();
                        $cantComputadoras = \App\Models\Producto::where('ID_categoria', 2)->where('activo', true)->count();
                        $cantLavarropas = \App\Models\Producto::where('ID_categoria', 3)->where('activo', true)->count();
                        $cantHeladeras = \App\Models\Producto::where('ID_categoria', 4)->where('activo', true)->count();
                    @endphp

                    {{-- RESUMEN DE CATEGORÍAS --}}
                    <div class="row g-3 mb-4 pb-4 border-bottom">
                        <div class="col-md-3"><div class="p-3 border rounded bg-light shadow-sm d-flex justify-content-between align-items-center"><h6 class="fw-bold mb-0 text-dark">Teléfonos</h6><span class="badge bg-secondary bg-opacity-25 text-dark rounded-pill">{{ $cantTelefonos }} prod.</span></div></div>
                        <div class="col-md-3"><div class="p-3 border rounded bg-light shadow-sm d-flex justify-content-between align-items-center"><h6 class="fw-bold mb-0 text-dark">Computadoras</h6><span class="badge bg-secondary bg-opacity-25 text-dark rounded-pill">{{ $cantComputadoras }} prod.</span></div></div>
                        <div class="col-md-3"><div class="p-3 border rounded bg-light shadow-sm d-flex justify-content-between align-items-center"><h6 class="fw-bold mb-0 text-dark">Lavarropas</h6><span class="badge bg-secondary bg-opacity-25 text-dark rounded-pill">{{ $cantLavarropas }} prod.</span></div></div>
                        <div class="col-md-3"><div class="p-3 border rounded bg-light shadow-sm d-flex justify-content-between align-items-center"><h6 class="fw-bold mb-0 text-dark">Heladeras</h6><span class="badge bg-secondary bg-opacity-25 text-dark rounded-pill">{{ $cantHeladeras }} prod.</span></div></div>
                    </div>

                    {{-- ALERTAS DE ÉXITO --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    {{-- BARRA DE BÚSQUEDA Y BOTÓN CREAR --}}
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex gap-3 w-50">
                            <input type="text" class="form-control rounded-pill" placeholder="Buscar producto..." style="background-color: #F8F9FA; border: 1px solid #dee2e6;">
                            <select class="form-select rounded-pill" style="background-color: #F8F9FA; border: 1px solid #dee2e6;">
                                <option selected>Todas las categorías</option>
                            </select>
                        </div>
                        <button class="btn text-white rounded-pill px-4 fw-semibold" style="background-color: #7828D8;" data-bs-toggle="modal" data-bs-target="#modalCrearProducto">
                            Crear producto
                        </button>
                    </div>

                    {{-- TABLA DINÁMICA DE PRODUCTOS --}}
                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-0 border-bottom">
                            <thead class="border-bottom">
                                <tr>
                                    <th class="text-muted fw-normal pb-3">Imagen</th>
                                    <th class="text-muted fw-normal pb-3">Producto</th>
                                    <th class="text-muted fw-normal pb-3">Categoría</th>
                                    <th class="text-muted fw-normal pb-3 text-center">Stock</th>
                                    <th class="text-muted fw-normal pb-3">Precio</th>
                                    <th class="text-muted fw-normal pb-3 text-end">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productos as $producto)
                                <tr class="border-bottom">
                                    <td class="pt-3 pb-3">
                                        <div class="rounded d-flex align-items-center justify-content-center fw-bold" style="width: 45px; height: 45px; background-color: #F8EDDF; color: #b4835a;">
                                            {{ substr($producto->nombre, 0, 2) }}
                                        </div>
                                    </td>
                                    <td class="fw-semibold text-dark">{{ $producto->nombre }}</td>
                                    <td class="text-muted">{{ $producto->categoria->nombre ?? 'N/A' }}</td>
                                    <td class="text-center">{{ $producto->stock }}</td>
                                    <td>$ {{ number_format($producto->precio, 0, ',', '.') }}</td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-end">
                                            {{-- BOTÓN EDITAR (Abre modal específico de este producto) --}}
                                            <button type="button" class="btn btn-sm rounded px-3 fw-semibold" style="background-color: #e0e7ff; color: #4f46e5; border: none;" data-bs-toggle="modal" data-bs-target="#modalEditarProducto{{ $producto->id }}">Editar</button>
                                            
                                            {{-- FORMULARIO PARA BAJA LÓGICA --}}
                                            <form action="/admin/productos/{{ $producto->id }}/baja" method="POST" class="m-0" onsubmit="return confirm('¿Seguro que deseas dar de baja este producto?');">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm rounded px-3 fw-semibold" style="background-color: #ffe4e6; color: #e11d48; border: none;">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>

                                {{-- MODAL DE EDICIÓN PARA ESTE PRODUCTO ESPECÍFICO --}}
                                <div class="modal fade" id="modalEditarProducto{{ $producto->id }}" tabindex="-1">
                                    <div class="modal-dialog">
                                        <div class="modal-content border-0 shadow">
                                            <div class="modal-header bg-light border-0">
                                                <h5 class="modal-title fw-bold" style="color: #4f46e5;">Editar Producto</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <form action="/admin/productos/{{ $producto->id }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="modal-body p-4">
                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">Nombre del producto</label>
                                                        <input type="text" name="nombre" class="form-control rounded" value="{{ $producto->nombre }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label class="form-label fw-semibold">Categoría</label>
                                                        <select name="ID_categoria" class="form-select rounded" required>
                                                            <option value="1" {{ $producto->ID_categoria == 1 ? 'selected' : '' }}>Teléfonos</option>
                                                            <option value="2" {{ $producto->ID_categoria == 2 ? 'selected' : '' }}>Computadoras</option>
                                                            <option value="3" {{ $producto->ID_categoria == 3 ? 'selected' : '' }}>Lavarropas</option>
                                                            <option value="4" {{ $producto->ID_categoria == 4 ? 'selected' : '' }}>Heladeras</option>
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-6 mb-3">
                                                            <label class="form-label fw-semibold">Stock</label>
                                                            <input type="number" name="stock" class="form-control rounded" value="{{ $producto->stock }}" required min="0">
                                                        </div>
                                                        <div class="col-6 mb-3">
                                                            <label class="form-label fw-semibold">Precio ($)</label>
                                                            <input type="number" step="0.01" name="precio" class="form-control rounded" value="{{ $producto->precio }}" required min="0">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer bg-light border-top-0">
                                                    <button type="button" class="btn btn-light fw-semibold border" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn text-white fw-semibold" style="background-color: #4f46e5;">Actualizar</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('plantillas.piedepagina')

    <div class="modal fade" id="modalCrearProducto" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow">
                <div class="modal-header text-white" style="background-color: #7828D8;">
                    <h5 class="modal-title fw-bold">Nuevo Producto</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="/admin/productos" method="POST">
                    @csrf
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nombre del producto</label>
                            <input type="text" name="nombre" class="form-control rounded" placeholder="Ej: Smart TV Samsung 50''" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Categoría</label>
                            <select name="ID_categoria" class="form-select rounded" required>
                                <option value="" selected disabled>Seleccionar categoría...</option>
                                <option value="1">Teléfonos</option>
                                <option value="2">Computadoras</option>
                                <option value="3">Lavarropas</option>
                                <option value="4">Heladeras</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-6 mb-3">
                                <label class="form-label fw-semibold">Stock</label>
                                <input type="number" name="stock" class="form-control rounded" placeholder="0" required min="0">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label fw-semibold">Precio</label>
                                <input type="number" step="0.01" name="precio" class="form-control rounded" placeholder="0.00" required min="0">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer bg-light border-top-0">
                        <button type="button" class="btn btn-light fw-semibold border" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn text-white fw-semibold" style="background-color: #7828D8;">Guardar Producto</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>