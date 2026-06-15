<!DOCTYPE html>
<html lang="es">
@include('plantillas.head', ['titulo' => 'ConsultasAdmin'])

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
                        <h2 class="fw-bold mb-1">Consultas y contactos</h2>
                        <p class="text-muted">Bandeja de entrada de los mensajes enviados desde el formulario web</p>
                    </div>

                    {{-- ALERTAS DE ÉXITO --}}
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="d-flex gap-3 mb-4 w-50">
                        <input type="text" id="buscadorConsultas" class="form-control rounded-pill" placeholder="Buscar por nombre o asunto..." style="background-color: #F8F9FA; border: 1px solid #dee2e6;">
                        
                        <select id="filtroConsultas" class="form-select rounded-pill" style="background-color: #F8F9FA; border: 1px solid #dee2e6; width: auto;">
                            <option value="todas" selected>Todas las consultas</option>
                            <option value="noLeido">No leídas</option>
                            <option value="leido">Leídas</option>
                        </select>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <ul class="list-group list-group-flush bg-transparent gap-3" id="listaConsultas">
                                
                                @forelse($consultas as $consulta)
                                    <li class="list-group-item border rounded d-flex justify-content-between align-items-center p-3 shadow-sm consulta-item {{ $consulta->estado == 'noLeido' ? 'bg-white' : 'bg-light' }}" data-estado="{{ $consulta->estado }}">
                                        <div>
                                            <div class="d-flex align-items-center gap-2 mb-1">
                                                <h6 class="mb-0 {{ $consulta->estado == 'noLeido' ? 'fw-bold text-dark' : 'fw-semibold text-secondary' }} nombre-remitente">
                                                    {{ $consulta->usuario->nombreCompleto ?? 'Usuario Eliminado' }}
                                                </h6>
                                                
                                                @if($consulta->estado == 'noLeido')
                                                    <span class="badge bg-danger bg-opacity-10 text-danger rounded-pill px-2 badge-estado">No leído</span>
                                                @else
                                                    <span class="badge bg-success bg-opacity-10 text-success rounded-pill px-2 badge-estado">Leído</span>
                                                @endif
                                            </div>
                                            <p class="mb-0 text-muted small asunto-consulta"><strong>Asunto:</strong> {{ $consulta->asunto }}</p>
                                        </div>
                                        <div class="d-flex gap-2">
                                            <button class="btn btn-sm text-white rounded px-3 fw-semibold" style="background-color: {{ $consulta->estado == 'noLeido' ? '#7828D8' : '#94a3b8' }};" data-bs-toggle="modal" data-bs-target="#modalVerConsulta{{ $consulta->id }}">Ver mensaje</button>
                                            
                                            @if($consulta->estado == 'noLeido')
                                                <form action="/admin/consultas/{{ $consulta->id }}/leido" method="POST" class="m-0">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="btn btn-sm rounded px-3 fw-semibold btn-accion-leido" style="background-color: #e0e7ff; color: #4f46e5; border: none;">Marcar leído</button>
                                                </form>
                                            @else
                                                <form action="/admin/consultas/{{ $consulta->id }}/eliminar" method="POST" class="m-0" onsubmit="return confirm('¿Seguro que deseas eliminar este mensaje?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm rounded px-3 fw-semibold text-danger" style="background-color: transparent; border: none;">Eliminar</button>
                                                </form>
                                            @endif
                                        </div>
                                    </li>
                                @empty
                                    <p class="text-muted text-center mt-4">No hay consultas registradas en la base de datos.</p>
                                @endforelse

                                {{-- Mensaje cuando el filtro no encuentra resultados --}}
                                <p id="sinResultados" class="text-muted text-center mt-4 d-none">No se encontraron consultas con ese criterio.</p>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- MODALES (Fuera del bucle de consultas para evitar errores de renderizado) --}}
    @foreach($consultas as $consulta)
    <div class="modal fade" id="modalVerConsulta{{ $consulta->id }}" tabindex="-1">
        <div class="modal-dialog modal-lg">
            <div class="modal-content border-0 shadow">
                <div class="modal-header text-white" style="background-color: {{ $consulta->estado == 'noLeido' ? '#7828D8' : '#64748b' }};">
                    <h5 class="modal-title fw-bold">Detalle del Mensaje</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4 bg-light">
                    <div class="bg-white p-3 rounded border mb-3">
                        <div class="row">
                            <div class="col-md-6 mb-2">
                                <span class="text-muted small d-block">Nombre completo:</span>
                                <span class="fw-semibold text-dark">{{ $consulta->usuario->nombreCompleto ?? 'Desconocido' }}</span>
                            </div>
                            <div class="col-md-6 mb-2">
                                <span class="text-muted small d-block">Correo electrónico:</span>
                                <a href="mailto:{{ $consulta->usuario->correo ?? '' }}" class="fw-semibold text-primary text-decoration-none">{{ $consulta->usuario->correo ?? 'Sin correo' }}</a>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-4 rounded border">
                        <span class="text-muted small d-block mb-1">Asunto:</span>
                        <h6 class="fw-bold mb-3 border-bottom pb-2 text-dark">{{ $consulta->asunto }}</h6>
                        <span class="text-muted small d-block mb-1">Mensaje:</span>
                        <p class="text-dark" style="white-space: pre-wrap; line-height: 1.6;">{{ $consulta->mensaje }}</p>
                    </div>
                </div>
                <div class="modal-footer bg-white border-top-0 d-flex justify-content-between">
                    <button type="button" class="btn btn-light fw-semibold border" data-bs-dismiss="modal">Cerrar</button>
                    <div class="d-flex gap-2">
                        <a href="mailto:{{ $consulta->usuario->correo ?? '' }}" class="btn btn-outline-primary fw-semibold">Responder por Email</a>
                        @if($consulta->estado == 'noLeido')
                            <form action="/admin/consultas/{{ $consulta->id }}/leido" method="POST" class="m-0">
                                @csrf @method('PATCH')
                                <button type="submit" class="btn text-white fw-semibold" style="background-color: #4f46e5;">Marcar como leído</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @include('plantillas.piedepagina')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // ── Función central de filtrado: combina búsqueda + dropdown ──────
        function filtrarConsultas() {
            const textoBusqueda = document.getElementById('buscadorConsultas').value.toLowerCase().trim();
            const estadoFiltro  = document.getElementById('filtroConsultas').value;
            const items         = document.querySelectorAll('.consulta-item');
            let   visibles      = 0;

            items.forEach(function (item) {
                const nombre = item.querySelector('.nombre-remitente').textContent.toLowerCase();
                const asunto = item.querySelector('.asunto-consulta').textContent.toLowerCase();
                const estado = item.getAttribute('data-estado');

                const coincideTexto  = !textoBusqueda || nombre.includes(textoBusqueda) || asunto.includes(textoBusqueda);
                const coincideEstado = estadoFiltro === 'todas' || estadoFiltro === estado;

                if (coincideTexto && coincideEstado) {
                    item.classList.remove('d-none');
                    item.classList.add('d-flex');
                    visibles++;
                } else {
                    item.classList.remove('d-flex');
                    item.classList.add('d-none');
                }
            });

            // Mostrar mensaje si no hay resultados
            document.getElementById('sinResultados').classList.toggle('d-none', visibles > 0);
        }

        // ── Listeners ─────────────────────────────────────────────────────
        document.getElementById('buscadorConsultas').addEventListener('input',  filtrarConsultas);
        document.getElementById('filtroConsultas').addEventListener('change', filtrarConsultas);
    </script>
</body>
</html>