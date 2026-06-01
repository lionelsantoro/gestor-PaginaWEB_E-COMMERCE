<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Administración</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons (Para los íconos de las tarjetas) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body class="d-flex flex-column min-vh-100" style="background-color: #F4F6F9;">

    @include('menu')

    <div class="container-fluid flex-grow-1 py-4 px-4">
        <div class="row h-100">
            
            <!-- Menú Lateral -->
            <div class="col-md-3 col-lg-2 mb-4">
                @include('menuAdmin') 
            </div>

            <!-- Contenido del Dashboard -->
            <div class="col-md-9 col-lg-10">
                <div class="p-4 rounded h-100 bg-white border shadow-sm">
                    
                    <!-- Encabezado con Buscador y Botón Nuevo -->
                    <div class="d-flex justify-content-between align-items-start mb-4">
                        <div>
                            <h2 class="fw-bold mb-1">Dashboard</h2>
                            <p class="text-muted">Prototipo visual interactivo para administración de e-commerce</p>
                        </div>
                        <div class="d-flex gap-2">
                            <input type="text" class="form-control rounded-pill" placeholder="Buscar..." style="background-color: #F8F9FA; border: none;">
                            <button class="btn text-white rounded-pill px-4 fw-semibold" style="background-color: #7828D8;">+ Nuevo</button>
                        </div>
                    </div>
                    
                    <!-- 4 Tarjetas de Resumen -->
                    <div class="row g-3 mb-4">
                        <!-- Tarjeta 1 -->
                        <div class="col-md-3">
                            <div class="p-3 border rounded bg-light d-flex justify-content-between align-items-center h-100">
                                <div>
                                    <p class="text-muted mb-1" style="font-size: 0.9rem;">Pedidos pendientes</p>
                                    <h3 class="fw-bold text-dark mb-0">24</h3>
                                </div>
                                <i class="bi bi-box-seam fs-1" style="color: #d97706;"></i>
                            </div>
                        </div>
                        <!-- Tarjeta 2 -->
                        <div class="col-md-3">
                            <div class="p-3 border rounded bg-light d-flex justify-content-between align-items-center h-100">
                                <div>
                                    <p class="text-muted mb-1" style="font-size: 0.9rem;">Ticket medio</p>
                                    <h3 class="fw-bold text-dark mb-0">$ 48.200</h3>
                                </div>
                                <i class="bi bi-credit-card-2-front fs-1" style="color: #0284c7;"></i>
                            </div>
                        </div>
                        <!-- Tarjeta 3 -->
                        <div class="col-md-3">
                            <div class="p-3 border rounded bg-light d-flex justify-content-between align-items-center h-100">
                                <div>
                                    <p class="text-muted mb-1" style="font-size: 0.9rem;">Usuarios registrados</p>
                                    <h3 class="fw-bold text-dark mb-0">1.284</h3>
                                </div>
                                <i class="bi bi-person-fill fs-1" style="color: #7828D8;"></i>
                            </div>
                        </div>
                        <!-- Tarjeta 4 -->
                        <div class="col-md-3">
                            <div class="p-3 border rounded bg-light d-flex justify-content-between align-items-center h-100">
                                <div>
                                    <p class="text-muted mb-1" style="font-size: 0.9rem;">Pedidos entregados</p>
                                    <h3 class="fw-bold text-dark mb-0">312</h3>
                                </div>
                                <i class="bi bi-truck fs-1" style="color: #ea580c;"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Sección Inferior: Tablas y Listas -->
                    <div class="row g-4">
                        
                        <!-- Últimos Pedidos (Columna Ancha) -->
                        <div class="col-md-8">
                            <div class="p-4 border rounded bg-light h-100">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h5 class="fw-bold mb-0">Últimos pedidos</h5>
                                    <a href="/admin/pedidos" class="text-decoration-none fw-semibold" style="color: #7828D8;">Ver todos</a>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-hover table-borderless align-middle mb-0">
                                        <thead class="border-bottom">
                                            <tr>
                                                <th class="text-muted fw-normal pb-3">Pedido</th>
                                                <th class="text-muted fw-normal pb-3">Cliente</th>
                                                <th class="text-muted fw-normal pb-3">Total</th>
                                                <th class="text-muted fw-normal pb-3">Estado</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="fw-semibold pt-3">#1023</td>
                                                <td class="pt-3">Juan Pérez</td>
                                                <td class="pt-3">$ 124.000</td>
                                                <td class="pt-3"><span class="badge bg-warning bg-opacity-25 text-dark rounded-pill px-3 py-2">Pendiente</span></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold">#1024</td>
                                                <td>María López</td>
                                                <td>$ 542.000</td>
                                                <td><span class="badge bg-secondary bg-opacity-25 text-dark rounded-pill px-3 py-2">Enviado</span></td>
                                            </tr>
                                            <tr>
                                                <td class="fw-semibold">#1025</td>
                                                <td>Carlos Ruiz</td>
                                                <td>$ 89.000</td>
                                                <td><span class="badge bg-success bg-opacity-25 text-success rounded-pill px-3 py-2">Entregado</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                        <!-- Top 5 Productos (Columna Angosta) -->
                        <div class="col-md-4">
                            <div class="p-4 border rounded bg-light h-100">
                                <h5 class="fw-bold mb-4">Top 5 productos vendidos</h5>
                                <ul class="list-group list-group-flush bg-transparent gap-3">
                                    <li class="list-group-item bg-transparent px-0 border-0 d-flex justify-content-between align-items-center p-0">
                                        <div>
                                            <h6 class="mb-0 fw-semibold text-dark">Notebook Lenovo</h6>
                                            <small class="text-muted">Ranking #1</small>
                                        </div>
                                        <i class="bi bi-fire text-danger fs-5"></i>
                                    </li>
                                    <li class="list-group-item bg-transparent px-0 border-0 d-flex justify-content-between align-items-center p-0">
                                        <div>
                                            <h6 class="mb-0 fw-semibold text-dark">Mouse Logitech</h6>
                                            <small class="text-muted">Ranking #2</small>
                                        </div>
                                        <i class="bi bi-fire text-danger fs-5"></i>
                                    </li>
                                    <li class="list-group-item bg-transparent px-0 border-0 d-flex justify-content-between align-items-center p-0">
                                        <div>
                                            <h6 class="mb-0 fw-semibold text-dark">Monitor Samsung</h6>
                                            <small class="text-muted">Ranking #3</small>
                                        </div>
                                        <i class="bi bi-fire text-danger fs-5"></i>
                                    </li>
                                    <li class="list-group-item bg-transparent px-0 border-0 d-flex justify-content-between align-items-center p-0">
                                        <div>
                                            <h6 class="mb-0 fw-semibold text-dark">iPhone 15</h6>
                                            <small class="text-muted">Ranking #4</small>
                                        </div>
                                        <i class="bi bi-fire text-danger fs-5"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('piedepagina')

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>