@if ($paginator->hasPages())
    <nav class="d-flex justify-items-center justify-content-between">
        {{-- Vista para Celulares (Pantallas chicas) --}}
        <div class="d-flex justify-content-between flex-fill d-sm-none">
            <ul class="pagination">
                @if ($paginator->onFirstPage())
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">&laquo; Anterior</span>
                    </li>
                @else
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" style="color: #7828D8;">&laquo; Anterior</a>
                    </li>
                @endif

                @if ($paginator->hasMorePages())
                    <li class="page-item">
                        <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" style="color: #7828D8;">Siguiente &raquo;</a>
                    </li>
                @else
                    <li class="page-item disabled" aria-disabled="true">
                        <span class="page-link">Siguiente &raquo;</span>
                    </li>
                @endif
            </ul>
        </div>

        {{-- Vista para Computadoras (Pantallas grandes) --}}
        <div class="d-none flex-sm-fill d-sm-flex align-items-sm-center justify-content-sm-center">
            
            {{-- EL TEXTO TRADUCIDO Y SEPARADO --}}
            <div class="me-4"> <!-- La clase me-4 (Margin End) lo separa de los botones -->
                <p class="small text-muted mb-0" style="font-size: 1rem;">
                    Mostrando del
                    <span class="fw-bold" style="color: #7828D8;">{{ $paginator->firstItem() }}</span>
                    al
                    <span class="fw-bold" style="color: #7828D8;">{{ $paginator->lastItem() }}</span>
                    de
                    <span class="fw-bold" style="color: #7828D8;">{{ $paginator->total() }}</span>
                    resultados
                </p>
            </div>

            {{-- LA BOTONERA DE PÁGINAS ESTILIZADA --}}
            <div>
                <ul class="pagination mb-0 shadow-sm">
                    {{-- Botón Anterior --}}
                    @if ($paginator->onFirstPage())
                        <li class="page-item disabled" aria-disabled="true" aria-label="Anterior">
                            <span class="page-link" aria-hidden="true">&lsaquo;</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="Anterior" style="color: #7828D8;">&lsaquo;</a>
                        </li>
                    @endif

                    {{-- Números de Página --}}
                    @foreach ($elements as $element)
                        {{-- Separador "Tres Puntos" --}}
                        @if (is_string($element))
                            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                        @endif

                        {{-- Arreglo de Links --}}
                        @if (is_array($element))
                            @foreach ($element as $page => $url)
                                @if ($page == $paginator->currentPage())
                                    <li class="page-item active" aria-current="page">
                                        <span class="page-link fw-bold" style="background-color: #7828D8; border-color: #7828D8; color: white;">{{ $page }}</span>
                                    </li>
                                @else
                                    <li class="page-item">
                                        <a class="page-link fw-semibold" href="{{ $url }}" style="color: #7828D8;">{{ $page }}</a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    {{-- Botón Siguiente --}}
                    @if ($paginator->hasMorePages())
                        <li class="page-item">
                            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="Siguiente" style="color: #7828D8;">&rsaquo;</a>
                        </li>
                    @else
                        <li class="page-item disabled" aria-disabled="true" aria-label="Siguiente">
                            <span class="page-link" aria-hidden="true">&rsaquo;</span>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
@endif