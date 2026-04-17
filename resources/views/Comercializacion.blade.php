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
                
                <div class="col-md-3 position-relative">
                    <div class="sticky-top" style="top: 2rem; z-index: 1;">
                        <h6 class="mb-3 fw-bold text-muted ps-3">Categorías</h6>
                        
                        <div class="list-group list-group-flush" id="menuLateral">
                            <a href="#seccion-quiero-comprar" class="list-group-item list-group-item-action border-0 text-dark rounded mb-1">
                                <i class="bi bi-cart3 me-2"></i> Quiero comprar
                            </a>
                            <a href="#seccion-pago" class="list-group-item list-group-item-action border-0 text-dark rounded mb-1">
                                <i class="bi bi-currency-dollar me-2"></i> Pago y facturación
                            </a>
                            <a href="#seccion-entregas" class="list-group-item list-group-item-action border-0 text-dark rounded mb-1">
                                <i class="bi bi-truck me-2"></i> Entregas
                            </a>
                    
                            <a href="#seccion-cambios" class="list-group-item list-group-item-action border-0 text-dark rounded mb-1">
                                <i class="bi bi-arrow-counterclockwise me-2"></i> Cambios, devoluciones y...
                            </a>
                            <a href="#seccion-cuenta" class="list-group-item list-group-item-action border-0 text-dark rounded mb-1">
                                <i class="bi bi-person-gear me-2"></i> Configuración de Mi cuenta
                            </a>
                        </div>
                    </div>
                </div>

                <div class="col-md-9 px-md-4">
                    
                    <h4 id="seccion-quiero-comprar" class="mt-4 mb-3 fw-bold text-dark pt-3">Quiero comprar</h4>
                    <div class="accordion mb-5" id="accordionQuieroComprar">
                        
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingQuiero1">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseQuiero1">
                                    ¿Cómo comprar en fravega.com?
                                </button>
                            </h2>
                            <div id="collapseQuiero1" class="accordion-collapse collapse" data-bs-parent="#accordionQuieroComprar">
                                <div class="accordion-body text-muted">
                                    <p>A continuación te dejamos los pasos para comprar en <a href="#" class="text-decoration-none">fravega.com</a>. No es necesario que te registres.</p>
                                    <ol>
                                        <li class="mb-2">Una vez que estés en <a href="#" class="text-decoration-none">fravega.com</a>, buscá el producto que querés comprar en el buscador o seleccioná la categoría que prefieras desde el menú principal.</li>
                                        <li class="mb-2">Seleccioná el producto y hacé click en el botón <strong>COMPRAR</strong>.</li>
                                        <li class="mb-2">En <strong>Mi carrito</strong>, podrás ver los productos elegidos y agregar una Garantía para tu compra (si el producto lo permite).<br>Si tenés un código de descuento, podrás ingresarlo en este paso.</li>
                                        <li class="mb-2">Clickeá el botón <strong>FINALIZAR COMPRA</strong> para continuar.</li>
                                        <li class="mb-2">Ingresá tu <strong>mail</strong> y completá tus <strong>datos personales</strong>.</li>
                                        <li class="mb-2">Completá tu <strong>domicilio</strong> y elegí la <strong>forma de entrega</strong>.</li>
                                        <li class="mb-2">Seleccioná el <strong>medio de pago</strong> que prefieras y completá los datos solicitados.</li>
                                        <li class="mb-2">Clickeá <strong>FINALIZAR COMPRA</strong> para terminar. Recibirás por mail las notificaciones sobre el estado de tu pedido.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingQuiero2">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseQuiero2">
                                    Quiero retirar mi compra en una sucursal, ¿cómo puedo saber si hay stock?
                                </button>
                            </h2>
                            <div id="collapseQuiero2" class="accordion-collapse collapse" data-bs-parent="#accordionQuieroComprar">
                                <div class="accordion-body text-muted">
                                    <p>Si querés comprar a través de <a href="#" class="text-decoration-none">Fravega.com</a> pero retirar en una sucursal, podés consultar si hay stock siguiendo estos pasos:</p>
                                    <ol>
                                        <li class="mb-2">Seleccioná el producto que querés comprar.</li>
                                        <li class="mb-2">Debajo de los medios de pago y opciones de financiación, hacé click en Ver sucursales.</li>
                                        <li class="mb-2">Ahí encontrarás las sucursales cercanas que tienen stock del producto.</li>
                                    </ol>
                                </div>
                            </div>
                        </div>

                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingQuiero3">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseQuiero3">
                                    Políticas de Seguridad
                                </button>
                            </h2>
                            <div id="collapseQuiero3" class="accordion-collapse collapse" data-bs-parent="#accordionQuieroComprar">
                                <div class="accordion-body text-muted">
                                    <p>En <a href="#" class="text-decoration-none">Fravega.com</a> te garantizamos la seguridad de todas tus compras online, manteniendo tus datos bajo la más estricta confidencialidad. Toda la información personal ingresada es cifrada, y no puede ser leída ni utilizada por terceros.</p>
                                    <p class="mb-0">Para más información ver <a href="/terminos-y-usos" class="text-decoration-none">Términos y Condiciones</a>.</p>
                                </div>
                            </div>
                        </div>

                    </div>

                    <h4 id="seccion-pago" class="mt-4 mb-3 fw-bold text-dark pt-3">Pago y facturación</h4>
                    <div class="accordion mb-5" id="accordionPago">
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingPago1">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePago1">
                                    Medios de pago
                                </button>
                            </h2>
                            <div id="collapsePago1" class="accordion-collapse collapse" data-bs-parent="#accordionPago">
                                <div class="accordion-body text-muted">
                                    <p class="fw-bold mb-2 text-dark">Si comprás en <a href="#" class="text-decoration-none">Fravega.com</a></p>
                                    <ul>
                                        <li>Tarjeta de crédito</li>
                                        <li>Tarjeta de débito</li>
                                        <li>Mercado Pago</li>
                                    </ul>
                                    <p>Vas a poder abonar tu compra con dos tarjetas de crédito y/o débito.</p>
                                    
                                    <p class="fw-bold mb-2 text-dark mt-4">Si comprás en una sucursal</p>
                                    <ul>
                                        <li>Tarjeta de crédito</li>
                                        <li>Tarjeta de débito</li>
                                        <li>Efectivo</li>
                                        <li><a href="#" class="text-decoration-none">Frávega Créditos</a></li>
                                    </ul>
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
                                    <p class="fw-bold mb-2 text-dark">Si compraste en Fravega.com o por teléfono</p>
                                    <ol>
                                        <li class="mb-2">Ingresá a <strong>Mi cuenta</strong>.</li>
                                        <li class="mb-2">Elegí la opción <strong>Mis compras</strong> e iniciá sesión con tus datos.</li>
                                        <li class="mb-2">Buscá la compra y hacé click en el botón <strong>VER DETALLE</strong>.</li>
                                        <li class="mb-2">Ingresá a la solapa <strong>Pago y facturación</strong>.</li>
                                        <li class="mb-2">Descargá el documento que necesites.</li>
                                    </ol>
                                    
                                    <div class="p-3 mt-4 bg-light border rounded" style="border-color: #e0e5ea !important;">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="bi bi-info-circle text-primary me-2"></i>
                                            <strong class="text-primary">Importante</strong>
                                        </div>
                                        <p class="fw-bold mb-1 text-dark">Importante:</p>
                                        <p class="mb-2">Si no encontraste el comprobante que buscabas:</p>
                                        <ol class="mb-0">
                                            <li class="mb-1">Ingresá a la solapa <strong>Pago y facturación</strong>.</li>
                                            <li class="mb-1">Hacé click en el botón <strong>NECESITO AYUDA</strong>.</li>
                                            <li class="mb-1">Elegí la opción <strong>Tengo un problema con mi factura</strong>.</li>
                                            <li class="mb-0">Seleccioná el motivo <strong>No recibí mi factura</strong> y seguí los pasos.</li>
                                        </ol>
                                    </div>
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
                                    <div class="p-3 mb-4 bg-light border rounded" style="border-color: #e0e5ea !important;">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="bi bi-info-circle text-primary me-2"></i>
                                            <strong class="text-primary">Importante</strong>
                                        </div>
                                        <p class="mb-0 text-dark">Los datos de cabecera, no pueden modificarse.</p>
                                    </div>

                                    <p class="fw-bold mb-2 text-dark">Si compraste en Fravega.com o por teléfono</p>
                                    <ol class="mb-0">
                                        <li class="mb-2">Ingresá a <strong>Mi cuenta</strong>.</li>
                                        <li class="mb-2">Elegí la opción <strong>Mis compras</strong> e iniciá sesión con tus datos.</li>
                                        <li class="mb-2">Buscá la compra y hacé click en el botón <strong>VER DETALLE</strong>.</li>
                                        <li class="mb-2">Hacé click en el botón <strong>NECESITO AYUDA</strong>.</li>
                                        <li class="mb-2">Elegí la opción <strong>Tengo un problema con mi factura</strong>.</li>
                                        <li class="mb-0">Seleccioná el motivo <strong>Mi factura tiene un error</strong> y seguí los pasos.</li>
                                    </ol>
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
                                    <p class="mb-0">Una vez confirmada la cancelación de la compra, el plazo de acreditación del dinero dependerá del medio de pago que utilizaste. Ante cualquier consulta sobre esta operación, deberás contactarte con la entidad emisora de tu tarjeta.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 id="seccion-entregas" class="mt-4 mb-3 fw-bold text-dark pt-3">Entregas</h4>
                    <div class="accordion mb-5" id="accordionEntregas">
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingEntregas1">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEntregas1">
                                    Conocer el estado de la entrega
                                </button>
                            </h2>
                            <div id="collapseEntregas1" class="accordion-collapse collapse" data-bs-parent="#accordionEntregas">
                                <div class="accordion-body text-muted">
                                    <p class="fw-bold mb-2 text-dark">Si compraste por la web de Frávega, por teléfono o en alguna de nuestras tiendas afiliadas</p>
                                    <ol>
                                        <li class="mb-2">Ingresá a <strong>Mi cuenta</strong>.</li>
                                        <li class="mb-2">Elegí la opción <strong>Mis compras</strong> e iniciá sesión con tus datos.</li>
                                        <li class="mb-2">Seleccioná la compra sobre la que quieras realizar la consulta.</li>
                                        <li class="mb-2">Hacé click en el botón <strong>VER DETALLE</strong> para verificar el estado.</li>
                                    </ol>
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
                                    <p class="fw-bold mb-2 text-dark">¿Cuáles son los plazos y condiciones de envío a domicilio?</p>
                                    <ul>
                                        <li><strong>Capital Federal y Gran Buenos Aires:</strong> Antes de finalizar la compra, podrás elegir el día y horario de entrega dentro del rango de 8 a 20 h.</li>
                                        <li><strong>Resto del país:</strong> El plazo de entrega es de 10 días hábiles. Estos plazos pueden variar de acuerdo a la empresa de transporte responsable del envío.</li>
                                        <li><strong>Tierra del Fuego:</strong> No realizamos envíos.</li>
                                    </ul>
                                    
                                    <p class="fw-bold mt-4 mb-2 text-dark">¿Qué incluye el envío a domicilio?</p>
                                    <ul>
                                        <li>El servicio <strong>incluye</strong> la entrega del producto puerta a puerta.</li>
                                        <li>El servicio <strong>no incluye</strong> instalación del producto ni ascenso por escalera.</li>
                                    </ul>
                                    
                                    <p class="fw-bold mt-4 mb-2 text-dark">¿Quién puede recibir la compra?</p>
                                    <p>Toda persona mayor de 18 años podrá recibir la compra presentando su DNI.</p>
                                    <p>Al momento de la entrega, recordá siempre verificar el buen estado del producto antes de firmar el remito. La firma, aclaración y DNI serán muestra de tu conformidad.</p>
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
                                    
                                    <p class="fw-bold mb-2 text-dark">Si compraste por la web de Frávega, por teléfono o en alguna de nuestras tiendas afiliadas*</p>
                                    <ol>
                                        <li class="mb-2">Ingresá a <strong>Mi cuenta</strong>.</li>
                                        <li class="mb-2">Elegí la opción <strong>Mis compras</strong> e iniciá sesión con tus datos.</li>
                                        <li class="mb-2">Seleccioná la compra sobre la que quieras realizar la consulta.</li>
                                        <li class="mb-2">Hacé click en el botón <strong>VER DETALLE</strong>.</li>
                                        <li class="mb-2">Hacé click en el botón <strong>NECESITO AYUDA</strong>.</li>
                                        <li class="mb-2">Elegí la opción <strong>Quiero modificar la entrega</strong>.</li>
                                        <li class="mb-2">Elegí la opción que corresponde y seguí los pasos.</li>
                                    </ol>
                                    
                                    <p class="fw-bold mb-1 text-dark">Si compraste en Mercado Libre</p>
                                    <p class="mb-4">Podrás realizar la solicitud ingresando a Mercado Libre.</p>
                                    
                                    <hr>
                                    
                                    <p class="fw-bold mt-4 mb-2 text-dark">Si ya elegí retirar el producto en una sucursal, ¿puedo hacer el cambio y recibirlo en mi domicilio?</p>
                                    <p class="fw-bold mb-1 text-dark">Una vez realizada la compra, no es posible modificar la forma de entrega.</p>
                                    <p class="mb-1">Esta información se genera automáticamente con las opciones que se indican en la web al momento de la compra.</p>
                                    <p>Conocé los plazos para retirar tu producto en la sucursal.</p>
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
                                    <p class="fw-bold mb-2 text-dark">¿Cuáles son los requisitos para retirar en sucursal?</p>
                                    <p>Para retirar tu compra en la sucursal:</p>
                                    <ul>
                                        <li class="mb-2">Esperá el mail de confirmación de Frávega indicando que ya podés retirar tu compra.</li>
                                        <li class="mb-2">Cuando recibas el mail, <strong>si tu producto es exclusivo de Frávega tenés 22 días corridos</strong> para retirarlo.</li> 
                                        <li class="mb-2"><strong>Sólo podrá retirar el producto la persona titular de la tarjeta de crédito o débito con la que se realizó la compra.</strong> En caso de haber pagado con dos tarjetas de diferentes titulares, deberá presentarse la persona que haya abonado el importe mayor.</li>
                                        <li class="mb-2">Cuando estés en la sucursal, presentá el comprobante de la compra, el DNI y la tarjeta.</li>
                                    </ul>
                                    
                                    <p class="fw-bold mt-4 mb-2 text-dark">¿Cuál es el plazo para retiro en sucursal?</p>
                                    <p class="mb-3">Una vez que recibas el mail para informarte que tu compra ya está lista, <strong>tenés 15 días corridos para retirarla</strong>. Transcurrido ese plazo, se cancelará la compra y se realizará la devolución del dinero al mismo medio de pago utilizado.</p>
                                    
                                    <div class="p-3 bg-light border rounded" style="border-color: #e0e5ea !important;">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="bi bi-info-circle text-primary me-2"></i>
                                            <strong class="text-primary">Importante</strong>
                                        </div>
                                        <ul class="mb-0 list-unstyled">
                                            <li class="mb-1">- El retiro en sucursal <strong>¡es gratis!</strong></li>
                                            <li>- Si la sucursal que seleccionaste está identificada como <strong>¡Retiralo ya!</strong>, podrás retirar tu compra en el mismo día. De todas formas, te enviaremos un e-mail cuando tu compra esté lista para que la pases a buscar.</li>
                                        </ul>
                                    </div>
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
                                    <p class="fw-bold mb-2 text-dark">¿Puedo rechazar un producto al momento de recibirlo?</p>
                                    <p>Si el producto no se encuentra en condiciones o no cumple con tus expectativas, podés rechazarlo al momento de la entrega. Al día siguiente te contactaremos para coordinar una nueva visita.</p>
                                    <p>Si cancelaste la compra antes de recibir el producto, podés rechazarlo al momento de la entrega.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 id="seccion-cambios" class="mt-4 mb-3 fw-bold text-dark pt-3">Cambios, devoluciones y cancelaciones</h4>
                    <div class="accordion mb-5" id="accordionCambios">
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingCambios1">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCambios1">
                                    Condiciones para cambiar o devolver un producto
                                </button>
                            </h2>
                            <div id="collapseCambios1" class="accordion-collapse collapse" data-bs-parent="#accordionCambios">
                                <div class="accordion-body text-muted">
                                    <h5 class="fw-bold text-dark mb-3">¿Qué requisitos debe cumplir un producto para poder cambiarlo o devolverlo?</h5>
                                    <p>A continuación, conocé toda la información que necesitás sobre cambios y devoluciones.</p>
                                    
                                    <p class="fw-bold mb-1 text-dark">No tienen devolución:</p>
                                    <ul class="mb-3">
                                        <li>Alimentación para bebés y niños.</li>
                                        <li>Perfumería y artículos de limpieza.</li>
                                        <li>Higiene y cuidado del bebé.</li>
                                    </ul>
                                    
                                    <p class="fw-bold mb-1 text-dark">No tienen cambio:</p>
                                    <ul class="mb-3">
                                        <li>Productos de compra internacional</li>
                                        <li>Productos reacondicionados</li>
                                    </ul>
                                    
                                    <p class="fw-bold mb-1 text-dark">Tienen devolución siempre que estén en su paquete original cerrado y sin instalar:</p>
                                    <ul class="mb-3">
                                        <li>Aires acondicionados, estufas a gas, calefones, termotanques, anafes, cocinas, campanas, lavarropas, lavasecarropas, lavavajillas, heladeras, freezers, cavas y exhibidoras.</li>
                                    </ul>
                                    
                                    <p class="fw-bold mb-1 text-dark">Tienen devolución siempre que estén en su paquete original cerrado y sin usar:</p>
                                    <ul class="mb-3">
                                        <li>Productos de cuidado personal.</li>
                                        <li>Consolas y software.</li>
                                        <li>Colchones y sommiers.</li>
                                        <li>Videojuegos.</li>
                                    </ul>
                                    
                                    <p class="fw-bold mb-1 text-dark">Tienen devolución siempre que estén en su paquete original y sin usar:</p>
                                    <ul class="mb-4">
                                        <li>Monopatines y hoverboards, blanquería y muebles para armar, aparatos de deportes y fitness, bicicletas, herramientas, iluminación, estabilizadores y grupos electrógenos, productos de jardín, piletas e inflables, baterías y neumáticos, impresoras y drones.</li>
                                    </ul>
                                    
                                    <div class="p-3 mb-4 bg-light border rounded" style="border-color: #e0e5ea !important;">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="bi bi-info-circle text-primary me-2"></i>
                                            <strong class="text-primary">Importante</strong>
                                        </div>
                                        <p class="mb-0">Para solicitar el cambio o devolución será necesario que los productos se encuentren en perfectas condiciones, con su empaque original, accesorios y manuales completos.</p>
                                    </div>
                            
                                    <hr class="my-4">
                            
                                    <h5 class="fw-bold text-dark mb-3">¿Cuáles son los plazos para cambiar o devolver un producto?</h5>
                                    <p class="mb-4">Tené en cuenta los siguientes requisitos y plazos para poder devolver o cambiar tu producto:</p>
                            
                                    <p class="fw-bold mb-1 text-dark">Llegó roto o dañado</p>
                                    <ul class="mb-3">
                                        <li>El plazo para realizar el cambio o la devolución es de 30 días corridos a partir de la fecha de entrega.</li>
                                        <li>El producto debe estar tal cual lo recibiste, con sus accesorios, manuales y etiquetas completas y originales.</li>
                                        <li>En productos de <strong>compra internacional y/o reacondicionados</strong> no se admite cambio y el plazo para efectuar la devolución es de 10 días corridos a partir de la fecha de entrega.</li>
                                    </ul>
                            
                                    <p class="fw-bold mb-1 text-dark">No cumplió mis expectativas</p>
                                    <ul class="mb-3">
                                        <li>El plazo para efectuar la devolución de la compra es de 30 días corridos a partir de la fecha de entrega.</li>
                                        <li>El producto debe estar en perfectas condiciones, con sus accesorios, manuales y etiquetas completas y originales.</li>
                                        <li>En <strong>productos de compra internacional</strong> el plazo para efectuar la devolución es de 10 días corridos a partir de la fecha de entrega.</li>
                                    </ul>
                            
                                    <p class="fw-bold mb-1 text-dark">No funciona o tiene una falla</p>
                                    <ul class="mb-3">
                                        <li>El plazo para efectuar el cambio o la devolución de la compra es de 10 días corridos a partir de la fecha de entrega.</li>
                                        <li>El producto debe estar en perfectas condiciones, con sus accesorios, manuales y etiquetas completas y originales.</li>
                                        <li>En productos de <strong>compra internacional y/o reacondicionados</strong> no se admite cambio y el plazo para efectuar la devolución es de 10 días corridos a partir de la fecha de entrega.</li>
                                    </ul>
                            
                                    <p class="fw-bold mb-1 text-dark">No es lo que pedí</p>
                                    <ul class="mb-3">
                                        <li>El plazo para efectuar el cambio o la devolución de la compra es de 30 días corridos a partir de la fecha de entrega.</li>
                                        <li>El producto debe estar tal cual lo recibiste, con sus accesorios, manuales y etiquetas completas y originales.</li>
                                        <li>En productos de <strong>compra internacional y/o reacondicionados</strong> no se admite cambio y el plazo para efectuar la devolución es de 10 días corridos a partir de la fecha de entrega.</li>
                                    </ul>
                            
                                    <p class="fw-bold mb-1 text-dark">Le faltan partes o accesorios</p>
                                    <ul class="mb-4">
                                        <li>El plazo para realizar el cambio o la devolución es de 30 días corridos a partir de la fecha de entrega.</li>
                                        <li>El producto debe estar tal cual lo recibiste, con sus accesorios, manuales y etiquetas completas y originales.</li>
                                        <li>En productos de <strong>compra internacional y/o reacondicionados</strong> no se admite cambio y el plazo para efectuar la devolución es de 10 días corridos a partir de la fecha de entrega.</li>
                                    </ul>
                            
                                    <div class="p-3 mb-4 bg-light border rounded" style="border-color: #e0e5ea !important;">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="bi bi-info-circle text-primary me-2"></i>
                                            <strong class="text-primary">Importante</strong>
                                        </div>
                                        <p class="mb-0">Algunos productos que requieren adaptadores USB y/o pilas no incluyen este accesorio de fábrica.</p>
                                    </div>
                            
                                    <hr class="my-4">
                            
                                    <h5 class="fw-bold text-dark mb-3">¿Cómo pido el cambio o la devolución de un producto?</h5>
                                    
                                    <p class="fw-bold mb-2 text-dark">Si compraste por la web de Frávega, por teléfono o en alguna de nuestras tiendas afiliadas*</p>
                                    <ol class="mb-4">
                                        <li class="mb-1">Ingresá a <strong>Mi cuenta</strong>.</li>
                                        <li class="mb-1">Elegí la opción <strong>Mis compras</strong> e iniciá sesión con tus datos.</li>
                                        <li class="mb-1">Seleccioná la compra que contiene el producto a cambiar o devolver.</li>
                                        <li class="mb-1">Hacé click en el botón <strong>NECESITO AYUDA</strong>.</li>
                                        <li class="mb-1">Elegí la opción <strong>Quiero cambiar o devolver un producto</strong>.</li>
                                        <li class="mb-0">Indicá el motivo y seguí los pasos.</li>
                                    </ol>
                            
                                    <p class="fw-bold mb-1 text-dark">Si compraste en una sucursal</p>
                                    <p class="mb-4">Completá <a href="#" class="text-decoration-none">este formulario</a> para que nos contactemos con vos.</p>
                            
                                    <p class="fw-bold mb-1 text-dark">Si compraste en Mercado Libre</p>
                                    <p class="mb-0">Podrás solicitar el cambio o devolución de un producto ingresando a Mercado Libre.</p>
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
                                    <h5 class="fw-bold text-dark mb-4">¿Cómo cancelo una compra pendiente de entrega?</h5>
                                    
                                    <p class="fw-bold mb-2 text-dark">Si compraste en <a href="#" class="text-decoration-none">Fravega.com</a> o por teléfono</p>
                                    <ol class="mb-4">
                                        <li class="mb-1">Ingresá a <strong>Mi cuenta</strong>.</li>
                                        <li class="mb-1">Elegí la opción <strong>Mis compras</strong> e iniciá sesión con tus datos.</li>
                                        <li class="mb-1">Seleccioná la compra que querés cancelar.</li>
                                        <li class="mb-1">Seleccioná el botón <strong>NECESITO AYUDA</strong>.</li>
                                        <li class="mb-0">Elegí la opción <strong>Quiero cancelar la compra</strong> y seguí los pasos.</li>
                                    </ol>
                            
                                    <div class="p-3 bg-light border rounded" style="border-color: #e0e5ea !important;">
                                        <div class="d-flex align-items-center mb-2">
                                            <i class="bi bi-info-circle text-primary me-2"></i>
                                            <strong class="text-primary">Importante</strong>
                                        </div>
                                        <ul class="mb-0 list-unstyled">
                                            <li class="mb-1">- Si tu compra está confirmada y todavía no fue despachada: podés avanzar con la cancelación de forma inmediata.</li>
                                            <li class="mb-1">- Si tu compra está en camino: tenés que rechazarla cuando llegue a tu domicilio.</li>
                                            <li class="mb-0">- Si tu compra fue entregada: podés hacer la solicitud desde la opción <strong>Cambios y devoluciones</strong> en la sección <strong>Mis Compras</strong>.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h4 id="seccion-cuenta" class="mt-4 mb-3 fw-bold text-dark pt-3">Configuración de Mi cuenta</h4>
                    <div class="accordion mb-5" id="accordionCuenta">
                        <div class="accordion-item border-0 border-bottom">
                            <h2 class="accordion-header" id="headingCuenta1">
                                <button class="accordion-button collapsed bg-white text-dark fw-semibold" type="button" data-bs-toggle="collapse" data-bs-target="#collapseCuenta1">
                                    Crear cuenta
                                </button>
                            </h2>
                            <div id="collapseCuenta1" class="accordion-collapse collapse" data-bs-parent="#accordionCuenta">
                                <div class="accordion-body text-muted">
                                    <ol>
                                        <li class="mb-2">Ingresá a <strong>Mi cuenta</strong>.</li>
                                        <li class="mb-2">Elegí la opción <strong>Mis datos.</strong></li>
                                        <li class="mb-2">Podés ingresar con tu cuenta de Gmail o Facebook. Si preferís crear tu cuenta con un mail y contraseña distinto, elegí la opción <strong>Ingresar con mail y contraseña.</strong></li>
                                        <li class="mb-2">Hacé click en <strong>Registrala ahora</strong> y seguí los pasos.</li>
                                    </ol>
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
                                    <ol>
                                        <li class="mb-2">Ingresá a <strong>Mi cuenta</strong>.</li>
                                        <li class="mb-2">Elegí la opción <strong>Mis datos.</strong></li>
                                        <li class="mb-2">Seleccioná <strong>Ingresar con mail y contraseña.</strong></li>
                                        <li class="mb-2">Hacé click en <strong>Olvidé mi contraseña.</strong></li>
                                        <li class="mb-2">Ingresá tu mail.</li>
                                        <li class="mb-2">Elegí tu nueva contraseña y hacé click en <strong>Registrar una nueva contraseña.</strong></li>
                                        <li class="mb-2">Ingresá el <strong>código de acceso temporal</strong> que te enviamos por mail y hacé click en el botón <strong>Cambiar contraseña.</strong></li>
                                    </ol>
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