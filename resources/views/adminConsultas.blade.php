<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Consultas - Administración</title>
    <!-- Bootstrap CSS -->
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
                        <h2 class="fw-bold mb-1">Consultas y contactos</h2>
                        <p class="text-muted">Bandeja de entrada de los mensajes enviados desde el formulario web</p>
                    </div>

                    <div class="d-flex gap-3 mb-4 w-50">
                        <input type="text" class="form-control rounded-pill" placeholder="Buscar por nombre o asunto..." style="background-color: #F8F9FA; border: 1px solid #dee2e6;">
                        
                        <select id="filtroConsultas" class="form-select rounded-pill" style="background-color: #F8F9FA; border: 1px solid #dee2e6; width: auto;">
                            <option value="todas" selected>Todas las consultas</option>
                            <option value="no-leido">No leídas</option>
                            <option value="leido">Leídas</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <ul class="list-group list-group-flush bg-transparent gap-3" id="listaConsultas">
                                
                                <!-- Consulta 1: No Leída -->
                                <li class="list-group-item bg-white border rounded d-flex justify-content-between align-items-center p-3 shadow-sm consulta-item" data-estado="no-leido">
                                    <div>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <h6 class="mb-0 fw-bold text-dark nombre-remitente">Lucía Gómez</h6>
                                            <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-2 badge-estado">No leído</span>
                                        </div>
                                        <p class="mb-0 text-muted small"><strong>Asunto:</strong> Consulta por envío</p>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <button class="btn btn-sm text-white rounded px-3 fw-semibold" style="background-color: #7828D8;" data-bs-toggle="modal" data-bs-target="#modalVerConsultaLucia">Ver mensaje</button>
                                        <!-- Botón con la función onclick para hacer la "magia" visual -->
                                        <button class="btn btn-sm rounded px-3 fw-semibold btn-accion-leido" style="background-color: #e0e7ff; color: #4f46e5; border: none;" onclick="marcarComoLeido(this)">Marcar leído</button>
                                    </div>
                                </li>

                                <!-- Consulta 2: Leída -->
                                <li class="list-group-item bg-light border rounded d-flex justify-content-between align-items-center p-3 shadow-sm consulta-item" data-estado="leido">
                                    <div>
                                        <div class="d-flex align-items-center gap-2 mb-1">
                                            <h6 class="mb-0 fw-semibold text-secondary nombre-remitente">Pedro Silva</h6>
                                            <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2 badge-estado">Leído</span>
                                        </div>
                                        <p class="mb-0 text-muted small"><strong>Asunto:</strong> Problema con pedido</p>
                                    </div>
                                    <div class="d-flex gap-2">
                                        <!-- Ahora sí apunta a un modal real (el de Pedro) -->
                                        <button class="btn btn-sm rounded px-3 fw-semibold" style="background-color: #f1f5f9; color: #475569; border: 1px solid #cbd5e1;" data-bs-toggle="modal" data-bs-target="#modalVerConsultaPedro">Ver mensaje</button>
                                        <button class="btn btn-sm rounded px-3 fw-semibold text-danger" style="background-color: transparent; border: none;">Eliminar</button>
                                    </div>
                                </li>

                            </ul>
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

    <!-- Modal VER Consulta (Lucía) -->
    <div class="modal fade" id="modalVerConsultaLucia" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-0 shadow">
                <div class="modal-header text-white" style="background-color: #7828D8;">
                    <h5 class="modal-title fw-bold">Detalle del Mensaje</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4 bg-light">
                    <div class="bg-white p-3 rounded border mb-3">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <span class="text-muted small d-block">Nombre completo:</span>
                                <span class="fw-semibold text-dark">Lucía Gómez</span>
                            </div>
                            <div class="col-md-6 mb-2">
                                <span class="text-muted small d-block">Correo electrónico:</span>
                                <a href="mailto:lucia.gomez@email.com" class="fw-semibold text-primary text-decoration-none">lucia.gomez@email.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded border">
                        <span class="text-muted small d-block mb-1">Asunto:</span>
                        <h6 class="fw-bold mb-3 border-bottom pb-2 text-dark">Consulta por envío</h6>
                        <span class="text-muted small d-block mb-1">Mensaje:</span>
                        <p class="text-dark" style="white-space: pre-wrap; line-height: 1.6;">Hola equipo. 

Escribo porque realicé una compra ayer y me olvidé de aclarar que mi departamento queda en un tercer piso por escalera. 

Quería saber si el servicio de entrega incluye subirlo o si lo dejan en la puerta del edificio. Espero su respuesta, muchas gracias.</p>
                    </div>
                </div>
                <div class="modal-footer bg-white border-top-0 d-flex justify-content-between">
                    <button type="button" class="btn btn-light fw-semibold border" data-bs-dismiss="modal">Cerrar</button>
                    <div class="d-flex gap-2">
                        <a href="mailto:lucia.gomez@email.com" class="btn btn-outline-primary fw-semibold">Responder por Email</a>
                        <button type="button" class="btn text-white fw-semibold" style="background-color: #4f46e5;" data-bs-dismiss="modal" onclick="document.querySelector('.btn-accion-leido').click()">Marcar como leído</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal VER Consulta (Pedro) -->
    <div class="modal fade" id="modalVerConsultaPedro" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-0 shadow">
                <div class="modal-header bg-secondary text-white">
                    <h5 class="modal-title fw-bold">Detalle del Mensaje</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4 bg-light">
                    <div class="bg-white p-3 rounded border mb-3">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <span class="text-muted small d-block">Nombre completo:</span>
                                <span class="fw-semibold text-dark">Pedro Silva</span>
                            </div>
                            <div class="col-md-6 mb-2">
                                <span class="text-muted small d-block">Correo electrónico:</span>
                                <a href="mailto:pedro.silva@email.com" class="fw-semibold text-primary text-decoration-none">pedro.silva@email.com</a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded border">
                        <span class="text-muted small d-block mb-1">Asunto:</span>
                        <h6 class="fw-bold mb-3 border-bottom pb-2 text-dark">Problema con pedido</h6>
                        <span class="text-muted small d-block mb-1">Mensaje:</span>
                        <p class="text-dark" style="white-space: pre-wrap; line-height: 1.6;">Buen día. 

Estoy intentando pagar con mi tarjeta de crédito pero la página me da error y no me deja finalizar la compra del teléfono Samsung. 

¿Me pueden ayudar? Ya probé con dos tarjetas distintas.</p>
                    </div>
                </div>
                <div class="modal-footer bg-white border-top-0 d-flex justify-content-between">
                    <button type="button" class="btn btn-light fw-semibold border" data-bs-dismiss="modal">Cerrar</button>
                    <a href="mailto:pedro.silva@email.com" class="btn btn-outline-primary fw-semibold">Responder por Email</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script de Interactividad (Filtros y Marcar Leído) -->
    <script>
        // 1. Lógica para el filtro de leídos/no leídos
        document.getElementById('filtroConsultas').addEventListener('change', function() {
            let seleccion = this.value;
            let consultas = document.querySelectorAll('.consulta-item');

            consultas.forEach(function(consulta) {
                let estadoConsulta = consulta.getAttribute('data-estado');

                if (seleccion === 'todas' || seleccion === estadoConsulta) {
                    consulta.classList.remove('d-none');
                    consulta.classList.add('d-flex');
                } else {
                    consulta.classList.remove('d-flex');
                    consulta.classList.add('d-none');
                }
            });
        });

        // 2. Lógica visual para simular "Marcar como Leído"
        function marcarComoLeido(boton) {
            // Buscamos la fila entera de la consulta
            let fila = boton.closest('li');
            
            // Le cambiamos el estado para que el filtro funcione bien
            fila.setAttribute('data-estado', 'leido');
            
            // Le cambiamos el fondo de blanco a gris (como los correos leídos)
            fila.classList.remove('bg-white');
            fila.classList.add('bg-light');
            
            // Le sacamos la negrita al nombre
            let nombre = fila.querySelector('.nombre-remitente');
            nombre.classList.remove('fw-bold', 'text-dark');
            nombre.classList.add('fw-semibold', 'text-secondary');
            
            // Cambiamos el color de la etiqueta (badge) de rojo a verde
            let badge = fila.querySelector('.badge-estado');
            badge.classList.remove('bg-danger', 'text-danger');
            badge.classList.add('bg-success', 'text-success');
            badge.innerText = 'Leído';
            
            // Finalmente, ocultamos el botón "Marcar leído" porque ya se apretó
            boton.style.display = 'none';
        }
    </script>
</body>
</html>