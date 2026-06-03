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

                <li class="nav-item">
                    <a class="nav-link px-3 fw-semibold {{ request()->is('login') ? 'active' : '' }}" href="/login">Iniciar Sesion</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link px-3 fw-semibold {{ request()->is('admin*') ? 'active' : '' }}" href="/admin">Admin</a>
                </li>

            </ul>
        </div>
    </div>
</nav>