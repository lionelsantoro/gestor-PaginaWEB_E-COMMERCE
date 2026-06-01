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
                    
                    <!-- Encabezado de la sección -->
                    <div class="mb-4">
                        <h2 class="fw-bold mb-1">Usuarios</h2>
                        <p class="text-muted">Visualización y gestión de cuentas del sistema</p>
                    </div>

                    <!-- Barra de herramientas (Buscador y Filtro) -->
                    <div class="d-flex gap-3 mb-4 w-50">
                        <input type="text" class="form-control rounded-pill" placeholder="Buscar usuario..." style="background-color: #F8F9FA; border: 1px solid #dee2e6;">
                        
                        <select id="filtroRoles" class="form-select rounded-pill" style="background-color: #F8F9FA; border: 1px solid #dee2e6; width: auto;">
                            <option value="todos" selected>Todos los roles</option>
                            <option value="clientes">Clientes</option>
                            <option value="admins">Administradores</option>
                        </select>
                    </div>

                    <!-- Contenedor de las dos columnas -->
                    <div class="row g-4 mt-2">
                        
                        <!-- Columna CLIENTES -->
                        <div id="columnaClientes" class="col-md-6">
                            <div class="p-4 border rounded bg-light h-100">
                                <h5 class="fw-bold mb-4" style="color: #4A4A4A;">Clientes registrados</h5>
                                
                                <ul class="list-group list-group-flush bg-transparent gap-2">
                                    <li class="list-group-item bg-white border rounded d-flex justify-content-between align-items-center p-3 shadow-sm">
                                        <div>
                                            <h6 class="mb-0 fw-semibold text-dark">Juan Pérez</h6>
                                            <small class="text-muted">juan@email.com</small>
                                        </div>
                                        <span class="fw-semibold small" style="color: #7828D8;">Cliente</span>
                                    </li>
                                    <li class="list-group-item bg-white border rounded d-flex justify-content-between align-items-center p-3 shadow-sm">
                                        <div>
                                            <h6 class="mb-0 fw-semibold text-dark">Carlos Ruiz</h6>
                                            <small class="text-muted">carlos@email.com</small>
                                        </div>
                                        <span class="fw-semibold small" style="color: #7828D8;">Cliente</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- Columna ADMINISTRADORES -->
                        <div id="columnaAdmins" class="col-md-6">
                            <div class="p-4 border rounded bg-light h-100">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="fw-bold mb-0" style="color: #4A4A4A;">Administradores</h5>
                                    <button class="btn btn-sm text-white rounded-pill px-3 fw-semibold" style="background-color: #7828D8;" data-bs-toggle="modal" data-bs-target="#modalCrearAdmin">
                                        + Nuevo admin
                                    </button>
                                </div>
                                
                                <ul class="list-group list-group-flush bg-transparent gap-2">
                                    <!-- Admin 1 (Con el botón Editar configurado) -->
                                    <li class="list-group-item bg-white border rounded d-flex justify-content-between align-items-center p-3 shadow-sm">
                                        <div>
                                            <h6 class="mb-0 fw-semibold text-dark">María López</h6>
                                            <small class="text-muted">maria@email.com</small>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-sm rounded px-3 fw-semibold" style="background-color: #e0e7ff; color: #4f46e5; border: none;" data-bs-toggle="modal" data-bs-target="#modalEditarAdmin">Editar</button>
                                            <button class="btn btn-sm rounded px-3 fw-semibold" style="background-color: #ffe4e6; color: #e11d48; border: none;">Eliminar</button>
                                        </div>
                                    </li>
                                    <!-- Admin 2 (Tú) -->
                                    <li class="list-group-item bg-white border rounded d-flex justify-content-between align-items-center p-3 shadow-sm border-start border-4" style="border-left-color: #7828D8 !important;">
                                        <div>
                                            <h6 class="mb-0 fw-semibold text-dark">Lionel Santoro</h6>
                                            <small class="text-muted">lionel@admin.com</small>
                                        </div>
                                        <span class="badge bg-secondary bg-opacity-25 text-dark rounded-pill px-3 py-2">Tú</span>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('plantillas.piedepagina')

    <!-- ========================================== -->
    <!-- ZONA DE MODALES -->
    <!-- ========================================== -->

    <!-- 1. Modal CREAR Administrador -->
    <div class="modal fade" id="modalCrearAdmin" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow">
                <div class="modal-header text-white" style="background-color: #7828D8;">
                    <h5 class="modal-title fw-bold">Nuevo Administrador</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nombre completo</label>
                        <input type="text" class="form-control rounded" placeholder="Ingresá el nombre">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Correo electrónico</label>
                        <input type="email" class="form-control rounded" placeholder="ejemplo@correo.com">
                    </div>
                    <div class="mb-3">
                        <!-- Etiqueta corregida -->
                        <label class="form-label fw-semibold">Contraseña</label>
                        <input type="password" class="form-control rounded" placeholder="••••••••">
                    </div>
                </div>
                <div class="modal-footer bg-light border-top-0">
                    <button type="button" class="btn btn-light fw-semibold border" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn text-white fw-semibold" style="background-color: #7828D8;">Guardar Administrador</button>
                </div>
            </div>
        </div>
    </div>

    <!-- 2. Modal EDITAR Administrador -->
    <div class="modal fade" id="modalEditarAdmin" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold" style="color: #4A4A4A;">Editar Administrador</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nombre completo</label>
                        <input type="text" class="form-control rounded" value="María López">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Correo electrónico</label>
                        <input type="email" class="form-control rounded" value="maria@email.com">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Contraseña (Opcional)</label>
                        <input type="password" class="form-control rounded" placeholder="Dejar en blanco para no cambiarla">
                    </div>
                    <!-- Se eliminó el campo de Estado por completo -->
                </div>
                <div class="modal-footer bg-light border-top-0">
                    <button type="button" class="btn btn-light fw-semibold border" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn text-white fw-semibold" style="background-color: #4f46e5;">Actualizar Datos</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script de Filtro Visual -->
    <script>
        document.getElementById('filtroRoles').addEventListener('change', function() {
            let seleccion = this.value;
            let colClientes = document.getElementById('columnaClientes');
            let colAdmins = document.getElementById('columnaAdmins');

            if (seleccion === 'todos') {
                colClientes.classList.remove('d-none');
                colAdmins.classList.remove('d-none');
            } else if (seleccion === 'clientes') {
                colClientes.classList.remove('d-none');
                colAdmins.classList.add('d-none');
            } else if (seleccion === 'admins') {
                colClientes.classList.add('d-none');
                colAdmins.classList.remove('d-none');
            }
        });
    </script>
</body>
</html>