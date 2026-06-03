<!DOCTYPE html>
<html lang="es">

@include('plantillas.head', ['titulo' => 'Catálogo Dinámico'])

<body class="d-flex flex-column min-vh-100">

    @include('plantillas.menu')

    <div class="container my-5">
        <h1 class="text-center mb-4 text-morado fw-bold">Nuestro Catálogo</h1>

        <!-- SECCIÓN DE FILTROS -->
        <div class="d-flex justify-content-center flex-wrap mb-5 gap-2">
            <a href="/catalogo?categoria=todas" 
               class="btn {{ request('categoria') == 'todas' || !request()->has('categoria') ? 'btn-primary' : 'btn-outline-primary' }}" 
               style="{{ request('categoria') == 'todas' || !request()->has('categoria') ? 'background-color: #7828D8; border-color: #7828D8;' : 'color: #7828D8; border-color: #7828D8;' }}">
                Todas
            </a>
            
            @foreach($categorias as $categoria)
                <a href="/catalogo?categoria={{ $categoria->id }}" 
                   class="btn {{ request('categoria') == $categoria->id ? 'btn-primary' : 'btn-outline-primary' }}"
                   style="{{ request('categoria') == $categoria->id ? 'background-color: #7828D8; border-color: #7828D8;' : 'color: #7828D8; border-color: #7828D8;' }}">
                    {{ $categoria->nombre }}
                </a>
            @endforeach
        </div>

        <!-- GRILLA DE PRODUCTOS -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            @forelse($productos as $producto)
                <div class="col">
                    <div class="card h-100 shadow-sm border-0 p-2 card-producto">
                        <div class="bg-light d-flex justify-content-center align-items-center mb-2 rounded" style="height: 220px;">
                            <img src="{{ $producto->url_image }}" class="img-fluid p-2" alt="{{ $producto->nombre }}" style="max-height: 100%;">
                        </div>
                        
                        <div class="card-body p-2 d-flex flex-column">
                            <h5 class="card-title fs-5 fw-bold text-truncate">{{ $producto->nombre }}</h5>
                            
                            <h4 class="fw-bold mb-3 text-morado">${{ number_format($producto->precio, 0, ',', '.') }}</h4>
                            
                            <div class="card-text flex-grow-1" style="font-size: 0.9rem;">
                                {!! $producto->descripcion !!}
                                <br><br>
                                <span class="text-success fw-bold">Stock: {{ $producto->stock }} unidades</span>
                            </div>
                            
                            <button type="button" class="btn text-white w-100 fw-bold mt-3" style="background-color: #7828D8;">
                                <i class="bi bi-cart-plus"></i> AGREGAR AL CARRITO
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center my-5">
                    <h3 class="text-muted">No se encontraron productos.</h3>
                </div>
            @endforelse
        </div>

        <!-- PAGINACIÓN -->
        <div class="d-flex justify-content-center mt-5">
            {{ $productos->links() }}
        </div>
    </div>

    @include('plantillas.piedepagina')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>