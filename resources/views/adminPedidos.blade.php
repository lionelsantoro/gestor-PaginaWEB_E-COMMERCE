<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pedidos - Administración</title>
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
                        <h2 class="fw-bold mb-1">Pedidos</h2>
                        <p class="text-muted">Gestión y visualización de ventas realizadas</p>
                    </div>

                    <div class="d-flex gap-3 mb-4 w-50">
                        <input type="text" class="form-control rounded-pill" placeholder="Buscar por cliente...">
                        <select id="filtroEstados" class="form-select rounded-pill" style="width: auto;">
                            <option value="todos">Todos los estados</option>
                            <option value="pendiente">Pendientes</option>
                            <option value="pagado">Pagados</option>
                            <option value="enviado">Enviados</option>
                            <option value="entregado">Entregados</option>
                        </select>
                    </div>

                    <table class="table table-borderless align-middle mb-0 border-bottom">
                        <thead class="border-bottom">
                            <tr>
                                <th>Pedido</th><th>Cliente</th><th>Total</th><th>Estado</th><th class="text-end">Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tablaPedidos">
                            <tr class="fila-pedido" data-estado="pendiente">
                                <td class="fw-bold">#1023</td><td>Juan Pérez</td><td class="fw-bold">$ 1.999.999</td>
                                <td>
                                    <select class="form-select form-select-sm selector-estado fw-semibold text-warning" style="background-color: #fffbeb; border: 1px solid #fde68a; width: 130px; border-radius: 8px;">
                                        <option value="pendiente" selected>Pendiente</option>
                                        <option value="pagado">Pagado</option>
                                        <option value="enviado">Enviado</option>
                                        <option value="entregado">Entregado</option>
                                    </select>
                                </td>
                                <td class="text-end"><button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#modal1023">Ver detalle</button></td>
                            </tr>
                            <tr class="fila-pedido" data-estado="enviado">
                                <td class="fw-bold">#1024</td><td>María López</td><td class="fw-bold">$ 399.999</td>
                                <td>
                                    <select class="form-select form-select-sm selector-estado fw-semibold text-primary" style="background-color: #eff6ff; border: 1px solid #bfdbfe; width: 130px; border-radius: 8px;">
                                        <option value="pendiente">Pendiente</option>
                                        <option value="pagado">Pagado</option>
                                        <option value="enviado" selected>Enviado</option>
                                        <option value="entregado">Entregado</option>
                                    </select>
                                </td>
                                <td class="text-end"><button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#modal1024">Ver detalle</button></td>
                            </tr>
                            <tr class="fila-pedido" data-estado="entregado">
                                <td class="fw-bold">#1025</td><td>Carlos Ruiz</td><td class="fw-bold">$ 729.999</td>
                                <td>
                                    <select class="form-select form-select-sm selector-estado fw-semibold text-success" style="background-color: #f0fdf4; border: 1px solid #bbf7d0; width: 130px; border-radius: 8px;">
                                        <option value="pendiente">Pendiente</option>
                                        <option value="pagado">Pagado</option>
                                        <option value="enviado">Enviado</option>
                                        <option value="entregado" selected>Entregado</option>
                                    </select>
                                </td>
                                <td class="text-end"><button class="btn btn-sm btn-secondary" data-bs-toggle="modal" data-bs-target="#modal1025">Ver detalle</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal1023" tabindex="-1"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header text-white" style="background-color: #7828D8;"><h5 class="modal-title">Detalle del Pedido #1023</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div><div class="modal-body p-4"><div class="row mb-4"><div class="col-6"><h6>Datos del Cliente</h6><p>Nombre: Juan Pérez<br>Email: juan.perez@email.com</p></div><div class="col-6"><h6>Datos de Envío</h6><p>San Martín 1550<br>Corrientes Capital</p></div></div><table class="table border"><thead><tr><th>Producto</th><th>Cant.</th><th>Subtotal</th></tr></thead><tbody><tr><td>Lenovo IdeaPad 3</td><td>1</td><td>$ 1.999.999</td></tr></tbody></table></div><div class="modal-footer"><button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button><button class="btn text-white" style="background-color: #7828D8;">Factura PDF</button></div></div></div></div>
    
    <div class="modal fade" id="modal1024" tabindex="-1"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header text-white" style="background-color: #7828D8;"><h5 class="modal-title">Detalle del Pedido #1024</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div><div class="modal-body p-4"><div class="row mb-4"><div class="col-6"><h6>Datos del Cliente</h6><p>Nombre: María López<br>Email: maria.lopez@email.com</p></div><div class="col-6"><h6>Datos de Envío</h6><p>Junín 1200<br>Corrientes Capital</p></div></div><table class="table border"><thead><tr><th>Producto</th><th>Cant.</th><th>Subtotal</th></tr></thead><tbody><tr><td>Samsung Galaxy S23</td><td>1</td><td>$ 399.999</td></tr></tbody></table></div><div class="modal-footer"><button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button><button class="btn text-white" style="background-color: #7828D8;">Factura PDF</button></div></div></div></div>
    
    <div class="modal fade" id="modal1025" tabindex="-1"><div class="modal-dialog modal-lg"><div class="modal-content"><div class="modal-header text-white" style="background-color: #7828D8;"><h5 class="modal-title">Detalle del Pedido #1025</h5><button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button></div><div class="modal-body p-4"><div class="row mb-4"><div class="col-6"><h6>Datos del Cliente</h6><p>Nombre: Carlos Ruiz<br>Email: carlos.ruiz@email.com</p></div><div class="col-6"><h6>Datos de Envío</h6><p>9 de Julio 850<br>Corrientes Capital</p></div></div><table class="table border"><thead><tr><th>Producto</th><th>Cant.</th><th>Subtotal</th></tr></thead><tbody><tr><td>Drean Next 8kg</td><td>1</td><td>$ 729.999</td></tr></tbody></table></div><div class="modal-footer"><button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button><button class="btn text-white" style="background-color: #7828D8;">Factura PDF</button></div></div></div></div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('filtroEstados').addEventListener('change', function() {
            let val = this.value;
            document.querySelectorAll('.fila-pedido').forEach(p => p.style.display = (val === 'todos' || p.getAttribute('data-estado') === val) ? 'table-row' : 'none');
        });
        document.querySelectorAll('.selector-estado').forEach(sel => {
            sel.addEventListener('change', function() {
                this.classList.remove('text-warning', 'text-primary', 'text-success');
                let colors = { 'pendiente': 'text-warning', 'pagado': 'text-info', 'enviado': 'text-primary', 'entregado': 'text-success' };
                this.classList.add(colors[this.value] || 'text-dark');
                this.closest('tr').setAttribute('data-estado', this.value);
            });
        });
    </script>
</body>
</html>