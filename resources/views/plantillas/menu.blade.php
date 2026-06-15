<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #7828D8;">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/Imagenes inicio/foto0.png" height="50" alt="Logo de la marca">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            
            {{-- ENLACES PRINCIPALES --}}
            <ul class="navbar-nav ms-auto" style="font-size: 1.1rem;">

                <li class="nav-item">
                    <a class="nav-link px-3 fw-semibold {{ request()->is('/') ? 'active' : '' }}" aria-current="page"
                        href="/">Inicio</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 fw-semibold {{ request()->is('catalogo*') ? 'active' : '' }}"
                        href="/catalogo"> Catálogo
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 fw-semibold {{ request()->is('quienes-somos') ? 'active' : '' }}"
                        href="/quienes-somos">Quiénes Somos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 fw-semibold {{ request()->is('comercializacion') ? 'active' : '' }}"
                        href="/comercializacion">Comercialización</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 fw-semibold {{ request()->is('terminos-y-usos') ? 'active' : '' }}"
                        href="/terminos-y-usos">Términos y Usos</a>
                </li>

                {{-- DESAPARECE SI ES ADMINISTRADOR --}}
                @if(!Auth::check() || Auth::user()->rol !== 'admin')
                    <li class="nav-item">
                        <a class="nav-link px-3 fw-semibold {{ request()->is('informacion-de-contacto') ? 'active' : '' }}"
                            href="/informacion-de-contacto">Contacto</a>
                    </li>
                @endif
            </ul>

            {{-- SECCIÓN DE USUARIO Y CARRITO --}}
            <ul class="navbar-nav mb-2 mb-lg-0 align-items-start align-items-lg-center ms-lg-3">

                {{-- SI EL USUARIO NO INICIÓ SESIÓN --}}
                @guest
                    <li class="nav-item">
                        <a class="nav-link px-3 fw-semibold" href="/login">Iniciar Sesión</a>
                    </li>
                    <li class="nav-item ms-lg-2 mt-2 mt-lg-0 ps-3 ps-lg-0">
                        <a class="btn fondo-rosado text-white fw-bold px-4" href="/registro"
                            style="border-radius: 8px;">Registrarse</a>
                    </li>
                @else
                    {{-- SI EL USUARIO SÍ INICIÓ SESIÓN --}}

                    {{-- 1. Si es Administrador: Ve el panel admin, NO ve el carrito --}}
                    @if(Auth::user()->rol === 'admin')
                        <li class="nav-item ms-lg-2 mt-2 mt-lg-0 ps-3 ps-lg-0">
                            <a class="nav-link px-3 fw-bold text-white bg-dark d-inline-block" href="/admin/productos" style="border-radius: 8px;">
                                <i class="bi bi-shield-lock-fill me-1"></i> Panel de Administración
                            </a>
                        </li>
                    @endif

                    {{-- 2. Si es Cliente: Ve el carrito, NO ve el panel admin --}}
                    @if(Auth::user()->rol === 'cliente')
                        <li class="nav-item ms-lg-2 mt-2 mt-lg-0 ps-3 ps-lg-0">
                            <a class="nav-link px-3 fw-bold text-white d-inline-flex align-items-center fondo-rosado"
                                href="/carrito" style="border-radius: 8px;">
                                <i class="bi bi-cart3 me-1"></i> Mi Carrito
                                @php
                                    // Se actualizó el estado a 'pendientePago'
                                    $carritoActivo = \App\Models\Pedido::where('ID_Usuario', Auth::id())->where('estado', 'pendientePago')->first();
                                    $cantidadItems = $carritoActivo ? $carritoActivo->items->sum('cantidad') : 0;
                                @endphp
                                @if($cantidadItems > 0)
                                    <span class="badge bg-danger ms-2">{{ $cantidadItems }}</span>
                                @endif
                            </a>
                        </li>
                    @endif

                    {{-- 3. Botón de Cerrar Sesión y Opciones para ambos roles --}}
                    <li class="nav-item dropdown ms-lg-3 mt-2 mt-lg-0 ps-3 ps-lg-0">
                        <a class="nav-link dropdown-toggle px-3 fw-bold fondo-rosado d-inline-block" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 8px;">
                            <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->nombreCompleto }}
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm mt-2">

                            {{-- Mostrar historial solo si es cliente --}}
                            @if(Auth::user()->rol === 'cliente')
                                <li>
                                    <a class="dropdown-item fw-semibold" href="/historialcompra">
                                        <i class="bi bi-clock-history me-2"></i> Historial de compras
                                    </a>
                                </li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                            @endif

                            {{-- Mostrar Datos Personales PARA TODOS (sin la restricción de admin) --}}
                            <li>
                                <a class="dropdown-item fw-semibold" href="#" data-bs-toggle="modal" data-bs-target="#modalDatosPersonales">
                                    <i class="bi bi-person-vcard me-2"></i> Datos personales
                                </a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>
                                <form action="/logout" method="POST" class="m-0 p-0">
                                    @csrf
                                    <button type="submit" class="dropdown-item text-danger fw-semibold">
                                        <i class="bi bi-box-arrow-right me-2"></i> Cerrar Sesión
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>

        </div>
    </div>
</nav>

{{-- MODAL DATOS PERSONALES (Se renderiza para cualquier usuario que haya iniciado sesión) --}}
@auth
    <div class="modal fade" id="modalDatosPersonales" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content border-0 shadow">
                <div class="modal-header text-white" style="background-color: #7828D8;">
                    <h5 class="modal-title fw-bold">Mis Datos Personales</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                {{-- Apuntamos al update del controlador usando el ID del usuario logueado --}}
                <form action="/admin/usuarios/{{ Auth::user()->id }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body p-4">
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark">Nombre completo</label>
                            <input type="text" name="nombreCompleto" class="form-control rounded" value="{{ Auth::user()->nombreCompleto }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark">Correo electrónico</label>
                            <input type="email" name="correo" class="form-control rounded" value="{{ Auth::user()->correo }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark">Nueva Contraseña (Opcional)</label>
                            <input type="password" name="contrasena" class="form-control rounded" placeholder="Dejar en blanco para no cambiarla">
                        </div>
                    </div>
                    <div class="modal-footer bg-light border-top-0">
                        <button type="button" class="btn btn-light fw-semibold border" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn text-white fw-semibold" style="background-color: #7828D8;">Actualizar Datos</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endauth