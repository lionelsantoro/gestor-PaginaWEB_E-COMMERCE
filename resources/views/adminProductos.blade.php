<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Productos - Administración</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100" style="background-color: #F4F6F9;">

    @include('menu')

    <div class="container-fluid flex-grow-1 py-4 px-4">
        <div class="row h-100">
            
            <div class="col-md-3 col-lg-2 mb-4">
                @include('menuAdmin') 
            </div>

            <div class="col-md-9 col-lg-10">
                <div class="p-4 rounded h-100 bg-white border shadow-sm">
                    
                    <div class="mb-4">
                        <h2 class="fw-bold mb-1">Gestión de productos</h2>
                        <p class="text-muted">Administración del catálogo de e-commerce</p>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex gap-3 w-50">
                            <input type="text" class="form-control rounded-pill" placeholder="Buscar producto..." style="background-color: #F8F9FA; border: 1px solid #dee2e6;">
                            
                            <select class="form-select rounded-pill" style="background-color: #F8F9FA; border: 1px solid #dee2e6;">
                                <option selected>Todas las categorías</option>
                                <option value="telefonos">Teléfonos</option>
                                <option value="computadoras">Computadoras</option>
                                <option value="lavarropas">Lavarropas</option>
                                <option value="heladeras">Heladeras</option>
                            </select>
                        </div>
                        <button class="btn text-white rounded-pill px-4 fw-semibold" style="background-color: #7828D8;" data-bs-toggle="modal" data-bs-target="#modalCrearProducto">
                            Crear producto
                        </button>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-borderless align-middle mb-0 border-bottom">
                            <thead class="border-bottom">
                                <tr>
                                    <th class="text-muted fw-normal pb-3">Imagen</th>
                                    <th class="text-muted fw-normal pb-3">Producto</th>
                                    <th class="text-muted fw-normal pb-3">Categoría</th>
                                    <th class="text-muted fw-normal pb-3">Stock</th>
                                    <th class="text-muted fw-normal pb-3">Precio</th>
                                    <th class="text-muted fw-normal pb-3">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-bottom">
                                    <td class="pt-3 pb-3">
                                        <div class="rounded d-flex align-items-center justify-content-center fw-bold" style="width: 45px; height: 45px; background-color: #F8EDDF; color: #b4835a;">
                                            SG
                                        </div>
                                    </td>
                                    <td class="fw-semibold text-dark">Samsung Galaxy S23</td>
                                    <td class="text-muted">Teléfonos</td>
                                    <td>25</td>
                                    <td>$ 399.999</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-sm rounded px-3 fw-semibold" style="background-color: #e0e7ff; color: #4f46e5; border: none;">Editar</button>
                                            <button class="btn btn-sm rounded px-3 fw-semibold" style="background-color: #ffe4e6; color: #e11d48; border: none;">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="border-bottom">
                                    <td class="pt-3 pb-3">
                                        <div class="rounded d-flex align-items-center justify-content-center fw-bold" style="width: 45px; height: 45px; background-color: #F8EDDF; color: #b4835a;">
                                            LI
                                        </div>
                                    </td>
                                    <td class="fw-semibold text-dark">Lenovo IdeaPad 3</td>
                                    <td class="text-muted">Computadoras</td>
                                    <td>14</td>
                                    <td>$ 1.999.999</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-sm rounded px-3 fw-semibold" style="background-color: #e0e7ff; color: #4f46e5; border: none;">Editar</button>
                                            <button class="btn btn-sm rounded px-3 fw-semibold" style="background-color: #ffe4e6; color: #e11d48; border: none;">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="pt-3 pb-3">
                                        <div class="rounded d-flex align-items-center justify-content-center fw-bold" style="width: 45px; height: 45px; background-color: #F8EDDF; color: #b4835a;">
                                            DN
                                        </div>
                                    </td>
                                    <td class="fw-semibold text-dark">Drean Next 8kg</td>
                                    <td class="text-muted">Lavarropas</td>
                                    <td>8</td>
                                    <td>$ 729.999</td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-sm rounded px-3 fw-semibold" style="background-color: #e0e7ff; color: #4f46e5; border: none;">Editar</button>
                                            <button class="btn btn-sm rounded px-3 fw-semibold" style="background-color: #ffe4e6; color: #e11d48; border: none;">Eliminar</button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('piedepagina')

    <div class="modal fade" id="modalCrearProducto" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow">
                <div class="modal-header text-white" style="background-color: #7828D8;">
                    <h5 class="modal-title fw-bold">Nuevo Producto</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nombre del producto</label>
                        <input type="text" class="form-control rounded" placeholder="Ej: Smart TV Samsung 50''">
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Categoría</label>
                        
                        <select class="form-select rounded">
                            <option selected>Seleccionar categoría...</option>
                            <option value="telefonos">Teléfonos</option>
                            <option value="computadoras">Computadoras</option>
                            <option value="lavarropas">Lavarropas</option>
                            <option value="heladeras">Heladeras</option>
                        </select>
                        
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label fw-semibold">Stock</label>
                            <input type="number" class="form-control rounded" placeholder="0">
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label fw-semibold">Precio</label>
                            <input type="number" class="form-control rounded" placeholder="$ 0.00">
                        </div>
                    </div>
                </div>
                <div class="modal-footer bg-light border-top-0">
                    <button type="button" class="btn btn-light fw-semibold border" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn text-white fw-semibold" style="background-color: #7828D8;">Guardar Producto</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>