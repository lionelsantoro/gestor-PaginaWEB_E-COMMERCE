<div class="d-flex flex-column flex-shrink-0 p-3 rounded h-100 bg-white shadow-sm border">
    <div class="mb-4 px-2">
        <h5 class="fw-bold mb-0" style="color: #7828D8;">Panel Admin</h5>
        <small class="text-muted">Gestión de e-commerce</small>
    </div>
    
    <ul class="nav nav-pills flex-column mb-auto gap-2">
        <li class="nav-item">
            <a href="/admin" class="nav-link px-3 fw-semibold {{ request()->is('admin') ? 'text-white' : 'text-dark' }}" style="border-radius: 8px; {{ request()->is('admin') ? 'background-color: #7828D8;' : '' }}">Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="/admin/productos" class="nav-link px-3 fw-semibold {{ request()->is('admin/productos') ? 'text-white' : 'text-dark' }}" style="border-radius: 8px; {{ request()->is('admin/productos') ? 'background-color: #7828D8;' : '' }}">Productos</a>
        </li>
        <li class="nav-item">
            <a href="/admin/usuarios" class="nav-link px-3 fw-semibold {{ request()->is('admin/usuarios') ? 'text-white' : 'text-dark' }}" style="border-radius: 8px; {{ request()->is('admin/usuarios') ? 'background-color: #7828D8;' : '' }}">Usuarios</a>
        </li>
        <li class="nav-item">
            <a href="/admin/categorias" class="nav-link px-3 fw-semibold {{ request()->is('admin/categorias') ? 'text-white' : 'text-dark' }}" style="border-radius: 8px; {{ request()->is('admin/categorias') ? 'background-color: #7828D8;' : '' }}">Categorías</a>
        </li>
        <li class="nav-item">
            <a href="/admin/consultas" class="nav-link px-3 fw-semibold {{ request()->is('admin/consultas') ? 'text-white' : 'text-dark' }}" style="border-radius: 8px; {{ request()->is('admin/consultas') ? 'background-color: #7828D8;' : '' }}">Consultas</a>
        </li>
        <li class="nav-item">
            <a href="/admin/pedidos" class="nav-link px-3 fw-semibold {{ request()->is('admin/pedidos') ? 'text-white' : 'text-dark' }}" style="border-radius: 8px; {{ request()->is('admin/pedidos') ? 'background-color: #7828D8;' : '' }}">Pedidos</a>
        </li>
    </ul>
</div>