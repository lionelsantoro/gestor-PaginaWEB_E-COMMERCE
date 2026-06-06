<nav class="navbar navbar-expand-lg navbar-dark" style="background-color: #7828D8;">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="/Imagenes inicio/foto0.png" height="50" alt="Logo de la marca">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto" style="font-size: 1.1rem;">
                
                <li class="nav-item">
                    <a class="nav-link px-3 fw-semibold {{ request()->is('/') ? 'active' : '' }}" aria-current="page" href="/">Inicio</a>
                </li>

<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle px-3 fw-semibold {{ request()->is('catalogo*') ? 'active' : '' }}" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Catálogo
    </a>
    <ul class="dropdown-menu dropdown-menu-dark" style="background-color: #7828D8; border: none;">
        <!-- Opción para ver todo por defecto -->
        <li><a class="dropdown-item fw-semibold {{ !request()->has('categoria') || request('categoria') == 'todas' ? 'active' : '' }}" href="/catalogo">Todas las categorías</a></li>
        <li><hr class="dropdown-divider" style="border-color: rgba(255,255,255,0.2);"></li>
        <!-- Filtros específicos -->
        <li><a class="dropdown-item fw-semibold {{ request('categoria') == '1' ? 'active' : '' }}" href="/catalogo?categoria=1">Teléfonos</a></li>
        <li><a class="dropdown-item fw-semibold {{ request('categoria') == '2' ? 'active' : '' }}" href="/catalogo?categoria=2">Computadoras</a></li>
        <li><a class="dropdown-item fw-semibold {{ request('categoria') == '3' ? 'active' : '' }}" href="/catalogo?categoria=3">Lavarropas</a></li>
        <li><a class="dropdown-item fw-semibold {{ request('categoria') == '4' ? 'active' : '' }}" href="/catalogo?categoria=4">Heladeras</a></li>
    </ul>
</li>

                <li class="nav-item">
                    <a class="nav-link px-3 fw-semibold {{ request()->is('quienes-somos') ? 'active' : '' }}" href="/quienes-somos">Quiénes Somos</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link px-3 fw-semibold {{ request()->is('comercializacion') ? 'active' : '' }}" href="/comercializacion">Comercialización</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 fw-semibold {{ request()->is('terminos-y-usos') ? 'active' : '' }}" href="/terminos-y-usos">Términos y Usos</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link px-3 fw-semibold {{ request()->is('informacion-de-contacto') ? 'active' : '' }}" href="/informacion-de-contacto">Contacto</a>
                </li>

             <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-center">
    
    {{-- SI EL USUARIO NO INICIÓ SESIÓN --}}
    @guest
        <li class="nav-item">
            <a class="nav-link fw-semibold" href="/login">Iniciar Sesión</a>
        </li>
        <li class="nav-item ms-2">
            <a class="btn fondo-rosado text-white fw-bold px-4" href="/registro" style="border-radius: 8px;">Registrarse</a>
        </li>
    @else
        {{-- SI EL USUARIO SÍ INICIÓ SESIÓN --}}
        
        {{-- 1. Si es Administrador: Ve el panel admin, NO ve el carrito --}}
        @if(Auth::user()->rol === 'admin')
            <li class="nav-item ms-2">
                <a class="nav-link px-3 fw-bold text-white bg-dark" href="/admin" style="border-radius: 8px;">
                    <i class="bi bi-shield-lock-fill me-1"></i> Panel Admin
                </a>
            </li>
        @endif

        {{-- 2. Si es Cliente: Ve el carrito, NO ve el panel admin --}}
        @if(Auth::user()->rol === 'cliente')
            <li class="nav-item ms-2">
                <a class="nav-link px-3 fw-bold text-white d-flex align-items-center fondo-rosado" href="/carrito" style="border-radius: 8px;">
                    <i class="bi bi-cart3 me-1"></i> Mi Carrito
                    @php
                        $carritoActivo = \App\Models\Pedido::where('ID_Usuario', Auth::id())->where('estado', 'creada')->first();
                        $cantidadItems = $carritoActivo ? $carritoActivo->items->sum('cantidad') : 0;
                    @endphp
                    @if($cantidadItems > 0)
                        <span class="badge bg-danger ms-2">{{ $cantidadItems }}</span>
                    @endif
                </a>
            </li>
        @endif

        {{-- 3. Botón de Cerrar Sesión para ambos roles --}}
        <li class="nav-item dropdown ms-3">
            <a class="nav-link dropdown-toggle fw-bold fondo-rosado" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="border-radius: 8px;">
                <i class="bi bi-person-circle me-1"></i> {{ Auth::user()->nombreCompleto }}
            </a>
            <ul class="dropdown-menu dropdown-menu-end border-0 shadow-sm">
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

            </ul>
        </div>
    </div>
</nav>