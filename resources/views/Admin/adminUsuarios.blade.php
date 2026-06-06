<!DOCTYPE html>
<html lang="es">

@include('plantillas.head', ['titulo' => 'UsuariosAdmin'])

<body class="d-flex flex-column min-vh-100" style="background-color: #F4F6F9;">

    @include('plantillas.menu')

    <div class="container-fluid flex-grow-1 py-4 px-4">
        <div class="row h-100">
            
            <div class="col-md-3 col-lg-2 mb-4">
                @include('plantillas.menuAdmin') 
            </div>

            <div class="col-md-9 col-lg-10">
                <div class="p-4 rounded h-100 bg-white border shadow-sm">
                    
                    <div class="mb-4">
                        <h2 class="fw-bold mb-1">Usuarios</h2>
                        <p class="text-muted">Visualización y gestión de cuentas del sistema</p>
                    </div>

                    {{-- ALERTAS DE ÉXITO --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="mb-4">
                        <form action="/admin/usuarios" method="GET" class="d-flex gap-3 w-50 m-0">
                            <div class="input-group">
                                <input type="text" name="buscar" value="{{ request('buscar') }}" class="form-control rounded-start-pill" placeholder="Buscar usuario..." style="background-color: #F8F9FA; border: 1px solid #dee2e6;">
                                <button class="btn btn-secondary rounded-end-pill" type="submit">Buscar</button>
                            </div>
                            <select name="rol" class="form-select rounded-pill" style="background-color: #F8F9FA; border: 1px solid #dee2e6; width: auto;" onchange="this.form.submit()">
                                <option value="" {{ request('rol') == '' ? 'selected' : '' }}>Todos los roles</option>
                                <option value="cliente" {{ request('rol') == 'cliente' ? 'selected' : '' }}>Clientes</option>
                                <option value="admin" {{ request('rol') == 'admin' ? 'selected' : '' }}>Administradores</option>
                            </select>
                        </form>
                    </div>

                    @php
                        // Lógica para mostrar/ocultar columnas según el filtro
                        $mostrarClientes = request('rol') == '' || request('rol') == 'cliente';
                        $mostrarAdmins = request('rol') == '' || request('rol') == 'admin';
                        $colWidth = ($mostrarClientes && $mostrarAdmins) ? 'col-md-6' : 'col-md-12';
                    @endphp

                    <div class="row g-4 mt-2">
                        
                        @if($mostrarClientes)
                        <div id="columnaClientes" class="{{ $colWidth }}">
                            <div class="p-4 border rounded bg-light h-100">
                                <h5 class="fw-bold mb-4" style="color: #4A4A4A;">Clientes registrados</h5>
                                
                                <ul class="list-group list-group-flush bg-transparent gap-2">
                                    @forelse($usuarios->where('rol', 'cliente') as $cliente)
                                        <li class="list-group-item bg-white border rounded d-flex justify-content-between align-items-center p-3 shadow-sm">
                                            <div>
                                                <h6 class="mb-0 fw-semibold text-dark">{{ $cliente->nombreCompleto }}</h6>
                                                <small class="text-muted">{{ $cliente->correo }}</small>
                                            </div>
                                            <span class="fw-semibold small" style="color: #7828D8;">Cliente</span>
                                        </li>
                                    @empty
                                        <li class="list-group-item bg-transparent border-0 text-muted px-0">No se encontraron clientes.</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        @endif

                        @if($mostrarAdmins)
                        <div id="columnaAdmins" class="{{ $colWidth }}">
                            <div class="p-4 border rounded bg-light h-100">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="fw-bold mb-0" style="color: #4A4A4A;">Administradores</h5>
                                    <button class="btn btn-sm text-white rounded-pill px-3 fw-semibold" style="background-color: #7828D8;" data-bs-toggle="modal" data-bs-target="#modalCrearAdmin">
                                        + Nuevo admin
                                    </button>
                                </div>
                                
                                <ul class="list-group list-group-flush bg-transparent gap-2">
                                    @forelse($usuarios->where('rol', 'admin') as $admin)
                                        <li class="list-group-item bg-white border rounded d-flex justify-content-between align-items-center p-3 shadow-sm {{ Auth::id() == $admin->id ? 'border-start border-4' : '' }}" style="{{ Auth::id() == $admin->id ? 'border-left-color: #7828D8 !important;' : '' }}">
                                            <div>
                                                <h6 class="mb-0 fw-semibold text-dark">{{ $admin->nombreCompleto }}</h6>
                                                <small class="text-muted">{{ $admin->correo }}</small>
                                            </div>
                                            
                                            {{-- Si es el usuario actual, mostramos "Tú", si no, los botones de acción --}}
                                            @if(Auth::id() == $admin->id)
                                                <span class="badge bg-secondary bg-opacity-25 text-dark rounded-pill px-3 py-2">Tú</span>
                                            @else
                                                <div class="d-flex gap-2">
                                                    <button class="btn btn-sm rounded px-3 fw-semibold" style="background-color: #e0e7ff; color: #4f46e5; border: none;" data-bs-toggle="modal" data-bs-target="#modalEditarAdmin{{ $admin->id }}">Editar</button>
                                                    
                                                    <form action="/admin/usuarios/{{ $admin->id }}/baja" method="POST" class="m-0" onsubmit="return confirm('¿Seguro que deseas dar de baja este administrador?');">
                                                        @csrf
                                                        @method('PATCH')
                                                        <button type="submit" class="btn btn-sm rounded px-3 fw-semibold" style="background-color: #ffe4e6; color: #e11d48; border: none;">Eliminar</button>
                                                    </form>
                                                </div>
                                            @endif
                                        </li>

                                        {{-- MODAL EDITAR Administrador (Solo se crea para los que no son el usuario actual) --}}
                                        @if(Auth::id() != $admin->id)
                                        <div class="modal fade" id="modalEditarAdmin{{ $admin->id }}" tabindex="-1">
                                            <div class="modal-dialog">
                                                <div class="modal-content border-0 shadow">
                                                    <div class="modal-header bg-light border-0">
                                                        <h5 class="modal-title fw-bold" style="color: #4A4A4A;">Editar Administrador</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                                    </div>
                                                    <form action="/admin/usuarios/{{ $admin->id }}" method="POST">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body p-4">
                                                            <div class="mb-3">
                                                                <label class="form-label fw-semibold">Nombre completo</label>
                                                                <input type="text" name="nombreCompleto" class="form-control rounded" value="{{ $admin->nombreCompleto }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label fw-semibold">Correo electrónico</label>
                                                                <input type="email" name="correo" class="form-control rounded" value="{{ $admin->correo }}" required>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label fw-semibold">Contraseña (Opcional)</label>
                                                                <input type="password" name="contrasena" class="form-control rounded" placeholder="Dejar en blanco para no cambiarla">
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer bg-light border-top-0">
                                                            <button type="button" class="btn btn-light fw-semibold border" data-bs-dismiss="modal">Cancelar</button>
                                                            <button type="submit" class="btn text-white fw-semibold" style="background-color: #4f46e5;">Actualizar Datos</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                    @empty
                                        <li class="list-group-item bg-transparent border-0 text-muted px-0">No se encontraron administradores.</li>
                                    @endforelse
                                </ul>
                            </div>
                        </div>
                        @endif

                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('plantillas.piedepagina')

    <div class="modal fade" id="modalCrearAdmin" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow">
                <div class="modal-header text-white" style="background-color: #7828D8;">
                    <h5 class="modal-title fw-bold">Nuevo Administrador</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="/admin/usuarios" method="POST">
                    @csrf
                    <div class="modal-body p-4">
                        <input type="hidden" name="rol" value="admin">
                        
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nombre completo</label>
                            <input type="text" name="nombreCompleto" class="form-control rounded" placeholder="Ingresá el nombre" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Correo electrónico</label>
                            <input type="email" name="correo" class="form-control rounded" placeholder="ejemplo@correo.com" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold">Contraseña</label>
                            <input type="password" name="contrasena" class="form-control rounded" placeholder="••••••••" required>
                        </div>
                    </div>
                    <div class="modal-footer bg-light border-top-0">
                        <button type="button" class="btn btn-light fw-semibold border" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn text-white fw-semibold" style="background-color: #7828D8;">Guardar Administrador</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>