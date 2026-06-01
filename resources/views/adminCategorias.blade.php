<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Categorías - Administración</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100" style="background-color: #F4F6F9;">

    @include('menu')

    <div class="container-fluid flex-grow-1 py-4 px-4">
        <div class="row h-100">
            
            <!-- Menú Lateral -->
            <div class="col-md-3 col-lg-2 mb-4">
                @include('menuAdmin') 
            </div>

            <!-- Contenido Principal -->
            <div class="col-md-9 col-lg-10">
                
                <!-- Encabezado de la sección -->
                <div class="mb-4">
                    <h2 class="fw-bold mb-1">Categorías</h2>
                    <p class="text-muted">Prototipo visual interactivo para administración de e-commerce</p>
                </div>

                <!-- Contenedor Principal -->
                <div class="p-4 rounded h-100 bg-white border shadow-sm">
                    
                    <div class="d-flex justify-content-between align-items-center mb-4 pb-3 border-bottom">
                        <h4 class="fw-bold mb-0" style="color: #4A4A4A;">CRUD de categorías</h4>
                        <button class="btn text-white rounded-pill px-4 fw-semibold" style="background-color: #7828D8;" data-bs-toggle="modal" data-bs-target="#modalCrearCategoria">
                            Nueva categoría
                        </button>
                    </div>

                    <!-- Grilla de Categorías -->
                    <div class="row g-4">
                        
                        <!-- Categoría 1 -->
                        <div class="col-md-4">
                            <div class="p-4 border rounded bg-light h-100 d-flex flex-column justify-content-between shadow-sm">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="fw-bold mb-0 text-dark">Teléfonos</h5>
                                    <span class="badge bg-secondary bg-opacity-25 text-dark rounded-pill px-3 py-2">25 productos</span>
                                </div>
                                <div class="d-flex gap-2 w-100 mt-2">
                                    <button class="btn btn-sm rounded fw-semibold w-50" style="background-color: #e0e7ff; color: #4f46e5; border: none;" data-bs-toggle="modal" data-bs-target="#modalEditarCategoria">Editar</button>
                                    <button class="btn btn-sm rounded fw-semibold w-50" style="background-color: #ffe4e6; color: #e11d48; border: none;">Eliminar</button>
                                </div>
                            </div>
                        </div>

                        <!-- Categoría 2 -->
                        <div class="col-md-4">
                            <div class="p-4 border rounded bg-light h-100 d-flex flex-column justify-content-between shadow-sm">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="fw-bold mb-0 text-dark">Computadoras</h5>
                                    <span class="badge bg-secondary bg-opacity-25 text-dark rounded-pill px-3 py-2">14 productos</span>
                                </div>
                                <div class="d-flex gap-2 w-100 mt-2">
                                    <button class="btn btn-sm rounded fw-semibold w-50" style="background-color: #e0e7ff; color: #4f46e5; border: none;" data-bs-toggle="modal" data-bs-target="#modalEditarCategoria">Editar</button>
                                    <button class="btn btn-sm rounded fw-semibold w-50" style="background-color: #ffe4e6; color: #e11d48; border: none;">Eliminar</button>
                                </div>
                            </div>
                        </div>

                        <!-- Categoría 3 -->
                        <div class="col-md-4">
                            <div class="p-4 border rounded bg-light h-100 d-flex flex-column justify-content-between shadow-sm">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="fw-bold mb-0 text-dark">Lavarropas</h5>
                                    <span class="badge bg-secondary bg-opacity-25 text-dark rounded-pill px-3 py-2">8 productos</span>
                                </div>
                                <div class="d-flex gap-2 w-100 mt-2">
                                    <button class="btn btn-sm rounded fw-semibold w-50" style="background-color: #e0e7ff; color: #4f46e5; border: none;" data-bs-toggle="modal" data-bs-target="#modalEditarCategoria">Editar</button>
                                    <button class="btn btn-sm rounded fw-semibold w-50" style="background-color: #ffe4e6; color: #e11d48; border: none;">Eliminar</button>
                                </div>
                            </div>
                        </div>

                        <!-- Categoría 4 -->
                        <div class="col-md-4">
                            <div class="p-4 border rounded bg-light h-100 d-flex flex-column justify-content-between shadow-sm">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="fw-bold mb-0 text-dark">Heladeras</h5>
                                    <span class="badge bg-secondary bg-opacity-25 text-dark rounded-pill px-3 py-2">12 productos</span>
                                </div>
                                <div class="d-flex gap-2 w-100 mt-2">
                                    <button class="btn btn-sm rounded fw-semibold w-50" style="background-color: #e0e7ff; color: #4f46e5; border: none;" data-bs-toggle="modal" data-bs-target="#modalEditarCategoria">Editar</button>
                                    <button class="btn btn-sm rounded fw-semibold w-50" style="background-color: #ffe4e6; color: #e11d48; border: none;">Eliminar</button>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('piedepagina')

    <!-- ========================================== -->
    <!-- ZONA DE MODALES -->
    <!-- ========================================== -->

    <!-- Modal CREAR Categoría -->
    <div class="modal fade" id="modalCrearCategoria" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow">
                <div class="modal-header text-white" style="background-color: #7828D8;">
                    <h5 class="modal-title fw-bold">Nueva Categoría</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nombre de la categoría</label>
                        <input type="text" class="form-control rounded" placeholder="Ej: Pequeños Electrodomésticos">
                    </div>
                </div>
                <div class="modal-footer bg-light border-top-0">
                    <button type="button" class="btn btn-light fw-semibold border" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn text-white fw-semibold" style="background-color: #7828D8;">Guardar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal EDITAR Categoría -->
    <div class="modal fade" id="modalEditarCategoria" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold" style="color: #4A4A4A;">Editar Categoría</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nombre de la categoría</label>
                        <input type="text" class="form-control rounded" value="Teléfonos">
                    </div>
                </div>
                <div class="modal-footer bg-light border-top-0">
                    <button type="button" class="btn btn-light fw-semibold border" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn text-white fw-semibold" style="background-color: #4f46e5;">Actualizar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>