<!DOCTYPE html>
<html lang="es">

    <head> 
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Comercializacion</title>
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}"> 
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    </head> 

    <body class="d-flex flex-column min-vh-100 bg-light">

        @include('menu')

        <main class="container my-5 flex-grow-1 bg-white p-4 rounded shadow-sm">
            <div class="row">
                
                <div class="col-md-3">
                    <h6 class="mb-3 fw-bold text-muted ps-3">Categorías</h6>
                    <div class="list-group list-group-flush">
                        <a href="#seccion-quiero-comprar" class="list-group-item list-group-item-action border-0 text-dark">
                            <i class="bi bi-cart3 me-2"></i> Quiero comprar
                        </a>
                        <a href="#seccion-pago" class="list-group-item list-group-item-action border-0 text-dark">
                            <i class="bi bi-currency-dollar me-2"></i> Pago y facturación
                        </a>
                        <a href="#seccion-entregas" class="list-group-item list-group-item-action border-0 text-dark">
                            <i class="bi bi-truck me-2"></i> Entregas
                        </a>
                        <a href="#seccion-pay" class="list-group-item list-group-item-action border-0 text-dark">
                            <i class="bi bi-wallet2 me-2"></i> Frávega Pay
                        </a>
                        <a href="#seccion-cambios" class="list-group-item list-group-item-action border-0 text-dark">
                            <i class="bi bi-arrow-counterclockwise me-2"></i> Cambios, devoluciones y...
                        </a>
                        <a href="#seccion-creditos" class="list-group-item list-group-item-action border-0 text-dark">
                            <i class="bi bi-credit-card me-2"></i> Créditos
                        </a>
                        <a href="#seccion-cuenta" class="list-group-item list-group-item-action border-0 text-dark">
                            <i class="bi bi-person-gear me-2"></i> Configuración de Mi cuenta
                        </a>
                    </div>
                </div>

                <div class="col-md-9 px-md-4">
                    
                    <h4 id="seccion-pago" class="mt-4 mb-3 fw-bold text-dark">Pago y facturación</h4>
                    <div class="accordion mb-5" id="accordionPago">
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingPago1">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePago1">
                                    Medios de pago
                                </button>
                            </h2>
                            <div id="collapsePago1" class="accordion-collapse collapse" data-bs-parent="#accordionPago">
                                <div class="accordion-body text-muted">
                                    </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingPago2">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePago2">
                                    Facturación
                                </button>
                            </h2>
                            <div id="collapsePago2" class="accordion-collapse collapse" data-bs-parent="#accordionPago">
                                <div class="accordion-body text-muted">
                                    </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingPago3">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePago3">
                                    Problemas con mi factura
                                </button>
                            </h2>
                            <div id="collapsePago3" class="accordion-collapse collapse" data-bs-parent="#accordionPago">
                                <div class="accordion-body text-muted">
                                    </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingPago4">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePago4">
                                    Plazos de reintegro en mi tarjeta
                                </button>
                            </h2>
                            <div id="collapsePago4" class="accordion-collapse collapse" data-bs-parent="#accordionPago">
                                <div class="accordion-body text-muted">
                                    </div>
                            </div>
                        </div>
                    </div>

                    <h4 id="seccion-entregas" class="mt-4 mb-3 fw-bold text-dark">Entregas</h4>
                    <div class="accordion mb-5" id="accordionEntregas">
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingEntregas1">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEntregas1">
                                    Conocer el estado de la entrega
                                </button>
                            </h2>
                            <div id="collapseEntregas1" class="accordion-collapse collapse" data-bs-parent="#accordionEntregas">
                                <div class="accordion-body text-muted">
                                    </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingEntregas2">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEntregas2">
                                    Envío a domicilio
                                </button>
                            </h2>
                            <div id="collapseEntregas2" class="accordion-collapse collapse" data-bs-parent="#accordionEntregas">
                                <div class="accordion-body text-muted">
                                    </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingEntregas3">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEntregas3">
                                    Modificar la fecha o el domicilio de la entrega
                                </button>
                            </h2>
                            <div id="collapseEntregas3" class="accordion-collapse collapse" data-bs-parent="#accordionEntregas">
                                <div class="accordion-body text-muted">
                                    </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingEntregas4">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEntregas4">
                                    Retiro en sucursal
                                </button>
                            </h2>
                            <div id="collapseEntregas4" class="accordion-collapse collapse" data-bs-parent="#accordionEntregas">
                                <div class="accordion-body text-muted">
                                    </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingEntregas5">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEntregas5">
                                    Problemas con la entrega
                                </button>
                            </h2>
                            <div id="collapseEntregas5" class="accordion-collapse collapse" data-bs-parent="#accordionEntregas">
                                <div class="accordion-body text-muted">
                                    </div>
                            </div>
                        </div>
                    </div>

                    <h4 id="seccion-pay" class="mt-4 mb-3 fw-bold text-dark">Frávega Pay</h4>
                    <div class="accordion mb-5" id="accordionPay">
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingPay1">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePay1">
                                    Billetera virtual
                                </button>
                            </h2>
                            <div id="collapsePay1" class="accordion-collapse collapse" data-bs-parent="#accordionPay">
                                <div class="accordion-body text-muted">
                                    </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingPay2">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePay2">
                                    Tarjeta prepaga
                                </button>
                            </h2>
                            <div id="collapsePay2" class="accordion-collapse collapse" data-bs-parent="#accordionPay">
                                <div class="accordion-body text-muted">
                                    </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingPay3">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePay3">
                                    Crédito online
                                </button>
                            </h2>
                            <div id="collapsePay3" class="accordion-collapse collapse" data-bs-parent="#accordionPay">
                                <div class="accordion-body text-muted">
                                    </div>
                            </div>
                        </div>
                    </div>

                    <h4 id="seccion-cambios" class="mt-4 mb-3 fw-bold text-dark">Cambios, devoluciones y cancelaciones</h4>
                    <div class="accordion mb-5" id="accordionCambios">
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingCambios1">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCambios1">
                                    Condiciones para cambiar o devolver un producto
                                </button>
                            </h2>
                            <div id="collapseCambios1" class="accordion-collapse collapse" data-bs-parent="#accordionCambios">
                                <div class="accordion-body text-muted">
                                    </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingCambios2">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCambios2">
                                    Condiciones para cancelar una compra pendiente de entrega
                                </button>
                            </h2>
                            <div id="collapseCambios2" class="accordion-collapse collapse" data-bs-parent="#accordionCambios">
                                <div class="accordion-body text-muted">
                                    </div>
                            </div>
                        </div>
                    </div>

                    <h4 id="seccion-creditos" class="mt-4 mb-3 fw-bold text-dark">Créditos</h4>
                    <div class="accordion mb-5" id="accordionCreditos">
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingCreditos1">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCreditos1">
                                    Pedir un crédito
                                </button>
                            </h2>
                            <div id="collapseCreditos1" class="accordion-collapse collapse" data-bs-parent="#accordionCreditos">
                                <div class="accordion-body text-muted">
                                    </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingCreditos2">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCreditos2">
                                    Consultas sobre mi crédito
                                </button>
                            </h2>
                            <div id="collapseCreditos2" class="accordion-collapse collapse" data-bs-parent="#accordionCreditos">
                                <div class="accordion-body text-muted">
                                    </div>
                            </div>
                        </div>
                    </div>

                    <h4 id="seccion-cuenta" class="mt-4 mb-3 fw-bold text-dark">Configuración de Mi cuenta</h4>
                    <div class="accordion mb-5" id="accordionCuenta">
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingCuenta1">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCuenta1">
                                    Crear cuenta
                                </button>
                            </h2>
                            <div id="collapseCuenta1" class="accordion-collapse collapse" data-bs-parent="#accordionCuenta">
                                <div class="accordion-body text-muted">
                                    </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingCuenta2">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCuenta2">
                                    Recuperar contraseña
                                </button>
                            </h2>
                            <div id="collapseCuenta2" class="accordion-collapse collapse" data-bs-parent="#accordionCuenta">
                                <div class="accordion-body text-muted">
                                    </div>
                            </div>
                        </div>
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingCuenta3">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCuenta3">
                                    Recibir ofertas por mail
                                </button>
                            </h2>
                            <div id="collapseCuenta3" class="accordion-collapse collapse" data-bs-parent="#accordionCuenta">
                                <div class="accordion-body text-muted">
                                    </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </main>

        @include('piedepagina')

        <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 
    
    </body>

</html>