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
                        
                        <form action="/admin/productos" method="GET" class="d-flex gap-3 w-50 m-0">
                            <div class="input-group">
                                <input type="text" name="buscar" value="{{ request('buscar') }}" class="form-control rounded-start-pill" placeholder="Buscar producto..." style="background-color: #F8F9FA; border: 1px solid #dee2e6;">
                                <button class="btn btn-secondary rounded-end-pill" type="submit">Buscar</button>
                            </div>
                            <select name="categoria" class="form-select rounded-pill" style="background-color: #F8F9FA; border: 1px solid #dee2e6;" onchange="this.form.submit()">
                                <option value="" {{ request('categoria') == '' ? 'selected' : '' }}>Todas las categorías</option>
                                <option value="1" {{ request('categoria') == '1' ? 'selected' : '' }}>Teléfonos</option>
                                <option value="2" {{ request('categoria') == '2' ? 'selected' : '' }}>Computadoras</option>
                                <option value="3" {{ request('categoria') == '3' ? 'selected' : '' }}>Lavarropas</option>
                                <option value="4" {{ request('categoria') == '4' ? 'selected' : '' }}>Heladeras</option>
                            </select>
                        </form>

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
                                    <th class="text-muted fw-normal pb-3 text-center">Stock Bajo</th>
                                    <th class="text-muted fw-normal pb-3">Precio</th>
                                    <th class="text-muted fw-normal pb-3 text-end">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($productos as $producto)
                                <tr class="border-bottom">
                                    {{-- COLUMNA DE IMAGEN CORREGIDA --}}
                                    <td class="pt-3 pb-3">
                                        @if($producto->url_image)
                                            <img src="{{ $producto->url_image }}" alt="Foto de {{ $producto->nombre }}" class="rounded shadow-sm" style="width: 45px; height: 45px; object-fit: cover; border: 1px solid #dee2e6;">
                                        @else
                                            <div class="rounded d-flex align-items-center justify-content-center fw-bold" style="width: 45px; height: 45px; background-color: #F8EDDF; color: #b4835a;">
                                                {{ substr($producto->nombre, 0, 2) }}
                                            </div>
                                        @endif
                                    </td>
                                    
                                    <td class="fw-semibold text-dark">{{ $producto->nombre }}</td>
                                    <td class="text-muted">{{ $producto->categoria->nombre ?? 'N/A' }}</td>
                                    
                                    <td class="text-center">
                                        @if($producto->stock <= $producto->stock_bajo)
                                            <span class="text-danger fw-bold" title="Stock bajo (Mínimo requerido: {{ $producto->stock_bajo }})">
                                                {{ $producto->stock }}
                                            </span>
                                        @else
                                            <span class="text-success fw-semibold">
                                                {{ $producto->stock }}
                                            </span>
                                        @endif
                                    </td>

                                    <td class="text-center text-muted fw-semibold">
                                        {{ $producto->stock_bajo }}
                                    </td>
                                    
                                    <td>$ {{ number_format($producto->precio, 0, ',', '.') }}</td>
                                    <td>
                                        <div class="d-flex gap-2 justify-content-end">
                                            <button type="button" class="btn btn-sm rounded px-3 fw-semibold" style="background-color: #e0e7ff; color: #4f46e5; border: none;" data-bs-toggle="modal" data-bs-target="#modalEditarProducto{{ $producto->id }}">Editar</button>
                                            
                                            <form action="/admin/productos/{{ $producto->id }}/baja" method="POST" class="m-0" onsubmit="return confirm('¿Seguro que deseas dar de baja este producto?');">
                                                @csrf
                                                @method('PATCH')
                                                <button type="submit" class="btn btn-sm rounded px-3 fw-semibold" style="background-color: #ffe4e6; color: #e11d48; border: none;">Eliminar</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODALES DE EDICIÓN (Colocados FUERA de la tabla para que funcione el botón Actualizar) --}}
    @foreach($productos as $producto)
    <div class="modal fade" id="modalEditarProducto{{ $producto->id }}" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-light border-0">
                    <h5 class="modal-title fw-bold" style="color: #4f46e5;">Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="/admin/productos/{{ $producto->id }}" method="POST" class="form-editar">
                    @csrf
                    @method('PUT')
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nombre del producto</label>
                            <input type="text" name="nombre" class="form-control rounded" value="{{ $producto->nombre }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Dirección de la imagen (URL)</label>
                            <input type="text" name="url_image" class="form-control rounded" value="{{ $producto->url_image }}" placeholder="Ej: /Imagenes/foto.jpg">
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
                                <label class="form-label fw-semibold">Stock Actual</label>
                                <input type="number" name="stock" class="form-control rounded" value="{{ $producto->stock }}" required min="0">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label fw-semibold">Alerta Stock Bajo</label>
                                <input type="number" name="stock_bajo" class="form-control rounded" value="{{ $producto->stock_bajo }}" required min="0">
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label fw-semibold">Precio ($)</label>
                                <input type="number" step="0.01" name="precio" class="form-control rounded" value="{{ $producto->precio }}" required min="0">
                            </div>
                            
                            <div class="col-12 mb-3">
                                <label class="form-label fw-semibold">Descripción</label>
                                <textarea class="form-control rounded desc-visual" rows="4">{{ strip_tags(str_replace(['<br>', '<br/>', '<br >'], "\n", $producto->descripcion)) }}</textarea>
                                <input type="hidden" name="descripcion" class="desc-oculta">
                                <small class="text-muted">Escribe cada característica en una línea separada usando el formato "Clave: Valor".</small>
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

    @include('plantillas.piedepagina')

    {{-- MODAL CREAR PRODUCTO --}}
    <div class="modal fade" id="modalCrearProducto" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-0 shadow">
                <div class="modal-header text-white" style="background-color: #7828D8;">
                    <h5 class="modal-title fw-bold">Nuevo Producto</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                
                <form action="/admin/productos" method="POST" id="formCrearProducto">
                    @csrf
                    
                    <input type="hidden" name="descripcion" id="descripcionFinal">

                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nombre del producto</label>
                            <input type="text" name="nombre" class="form-control rounded" placeholder="Ej: Smart TV Samsung 50''" required>
                        </div>
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Dirección de la imagen (URL)</label>
                            <input type="text" name="url_image" class="form-control rounded" placeholder="Ej: /Imagenes Celulares/foto.jpg o https://...">
                        </div>

                        <div class="row">
                            <div class="col-4 mb-3">
                                <label class="form-label fw-semibold">Stock</label>
                                <input type="number" name="stock" class="form-control rounded" placeholder="0" required min="0">
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label fw-semibold">Stock Bajo</label>
                                <input type="number" name="stock_bajo" class="form-control rounded" placeholder="5" value="5" required min="0">
                            </div>
                            <div class="col-4 mb-3">
                                <label class="form-label fw-semibold">Precio</label>
                                <input type="number" step="0.01" name="precio" class="form-control rounded" placeholder="0.00" required min="0">
                            </div>
                        </div>

                        <hr class="my-4">

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Categoría</label>
                            <select name="ID_categoria" id="categoriaSelect" class="form-select rounded" required>
                                <option value="" selected disabled>Seleccionar categoría...</option>
                                <option value="1">Teléfonos</option>
                                <option value="2">Computadoras</option>
                                <option value="3">Lavarropas</option>
                                <option value="4">Heladeras</option>
                            </select>
                        </div>

                        <div id="contenedorAtributos" class="p-3 bg-light border rounded mb-3">
                            <p class="text-muted mb-0" id="mensajeVacio">Seleccione una categoría para agregar especificaciones...</p>

                            {{-- 1: Teléfonos --}}
                            <div id="dinamicos-1" class="d-none dinamico-group row g-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold text-secondary">RAM</label>
                                    <input type="text" class="form-control input-dinamico" data-label="RAM" placeholder="Ej: 12 GB">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold text-secondary">Almacenamiento</label>
                                    <input type="text" class="form-control input-dinamico" data-label="Almacenamiento" placeholder="Ej: 512 GB">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold text-secondary">Batería</label>
                                    <input type="text" class="form-control input-dinamico" data-label="Batería" placeholder="Ej: 5000 mAh">
                                </div>
                            </div>

                            {{-- 2: Computadoras --}}
                            <div id="dinamicos-2" class="d-none dinamico-group row g-3">
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold text-secondary">Procesador</label>
                                    <input type="text" class="form-control input-dinamico" data-label="Procesador" placeholder="Ej: Intel Core i9-14900HX">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label fw-semibold text-secondary">RAM</label>
                                    <input type="text" class="form-control input-dinamico" data-label="RAM" placeholder="Ej: 32 GB DDR5">
                                </div>
                                <div class="col-4">
                                    <label class="form-label fw-semibold text-secondary">Almacenamiento</label>
                                    <input type="text" class="form-control input-dinamico" data-label="Almacenamiento" placeholder="Ej: 2 TB SSD">
                                </div>
                            </div>

                            {{-- 3: Lavarropas --}}
                            <div id="dinamicos-3" class="d-none dinamico-group row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-secondary">Capacidad de lavado</label>
                                    <input type="text" class="form-control input-dinamico" data-label="Capacidad de lavado" placeholder="Ej: 8 kg">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-secondary">Programas de lavado</label>
                                    <input type="number" class="form-control input-dinamico" data-label="Programas de lavado" placeholder="Ej: 14">
                                </div>
                            </div>

                            {{-- 4: Heladeras --}}
                            <div id="dinamicos-4" class="d-none dinamico-group row g-3">
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-secondary">Capacidad</label>
                                    <input type="text" class="form-control input-dinamico" data-label="Capacidad" placeholder="Ej: 382 Litros">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label fw-semibold text-secondary">No Frost</label>
                                    <select class="form-select input-dinamico" data-label="No Frost">
                                        <option value="Sí">Sí</option>
                                        <option value="No">No</option>
                                    </select>
                                </div>
                            </div>

                            {{-- ATRIBUTOS COMUNES A TODAS LAS CATEGORÍAS --}}
                            <div id="dinamicos-comunes" class="d-none row g-3 mt-1 border-top pt-2">
                                <div class="col-12">
                                    <label class="form-label fw-semibold text-secondary">Envío</label>
                                    <input type="text" class="form-control input-comun" data-label="Envío" placeholder="Ej: Gratis o Costo" value="Gratis">
                                </div>
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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // --- LÓGICA PARA EL MODAL DE CREAR ---
            const selectCategoria = document.getElementById('categoriaSelect');
            const mensajeVacio = document.getElementById('mensajeVacio');
            const dinamicoGroups = document.querySelectorAll('.dinamico-group');
            const dinamicosComunes = document.getElementById('dinamicos-comunes');
            const formCrearProducto = document.getElementById('formCrearProducto');
            const descripcionFinal = document.getElementById('descripcionFinal');

            if(selectCategoria) {
                selectCategoria.addEventListener('change', function() {
                    const categoriaId = this.value;
                    mensajeVacio.classList.add('d-none');
                    dinamicoGroups.forEach(grupo => grupo.classList.add('d-none'));

                    if (categoriaId) {
                        const grupoActivo = document.getElementById('dinamicos-' + categoriaId);
                        if (grupoActivo) grupoActivo.classList.remove('d-none');
                        dinamicosComunes.classList.remove('d-none');
                    } else {
                        mensajeVacio.classList.remove('d-none');
                        dinamicosComunes.classList.add('d-none');
                    }
                });
            }

            if(formCrearProducto) {
                formCrearProducto.addEventListener('submit', function(e) {
                    e.preventDefault(); 
                    
                    const categoriaId = selectCategoria.value;
                    let descripcionArmada = '';

                    if (categoriaId) {
                        const grupoActivo = document.getElementById('dinamicos-' + categoriaId);
                        const inputsActivos = grupoActivo.querySelectorAll('.input-dinamico');
                        
                        inputsActivos.forEach(input => {
                            const valor = input.value.trim();
                            if (valor !== '') {
                                const etiqueta = input.getAttribute('data-label');
                                descripcionArmada += `<strong>${etiqueta}:</strong> ${valor}<br>`;
                            }
                        });

                        const inputsComunes = document.querySelectorAll('.input-comun');
                        inputsComunes.forEach(input => {
                            const valor = input.value.trim();
                            if (valor !== '') {
                                const etiqueta = input.getAttribute('data-label');
                                descripcionArmada += `<strong>${etiqueta}:</strong> ${valor}<br>`;
                            }
                        });
                    }

                    descripcionFinal.value = descripcionArmada;
                    HTMLFormElement.prototype.submit.call(this);
                });
            }

            // --- LÓGICA PARA LOS MODALES DE EDICIÓN ---
            const formsEditar = document.querySelectorAll('.form-editar');
            
            formsEditar.forEach(form => {
                // Al hacer submit interceptamos solo para llenar el input oculto y dejamos que continúe.
                form.addEventListener('submit', function() {
                    const visualText = this.querySelector('.desc-visual').value;
                    const hiddenInput = this.querySelector('.desc-oculta');
                    
                    if(visualText && hiddenInput) {
                        const lineas = visualText.split('\n');
                        const htmlProcesado = lineas.map(linea => {
                            const separadorIndex = linea.indexOf(':');
                            if (separadorIndex !== -1) {
                                const clave = linea.substring(0, separadorIndex + 1);
                                const valor = linea.substring(separadorIndex + 1);
                                return `<strong>${clave}</strong>${valor}`;
                            }
                            return linea; 
                        }).filter(linea => linea.trim() !== '').join('<br>');
                        
                        hiddenInput.value = htmlProcesado;
                    }
                });
            });
        });
    </script>
</body>
</html>