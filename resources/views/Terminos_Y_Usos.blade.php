<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="/css/paleta_colores.css">
    <title>Términos y Condiciones</title>
</head>

<body class="d-flex flex-column min-vh-100">

    @include('menu')

    <div class="container my-5">
        <div class="accordion" id="accordionPanelsStayOpenExample">

            <!-- Ítem 1: Servicios ofrecidos, Capacidad Legal y Condiciones Generales -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed text-morado" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseOne">
                        <strong>1. Servicios ofrecidos, Capacidad Legal y Condiciones Generales de Uso</strong>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        El presente sitio web constituye una plataforma integral de comercio electrónico cuya finalidad
                        es la exhibición, oferta y comercialización minorista de bienes muebles, incluyendo productos
                        nuevos, de segunda selección (reacondicionados) y artículos de procedencia internacional. Los
                        servicios y operaciones habilitados en esta plataforma están dirigidos única y exclusivamente a
                        personas humanas que cuenten con capacidad legal para contratar, conforme lo establece el Código
                        Civil y Comercial de la Nación Argentina. La empresa se reserva el derecho irrenunciable y
                        unilateral de modificar, alterar, agregar o eliminar cualquier cláusula de los presentes
                        Términos y Condiciones en cualquier momento y sin previo aviso, entrando en vigencia dichas
                        modificaciones desde el momento mismo de su publicación en el sitio. Asimismo, la plataforma
                        opera bajo la modalidad de venta directa y la modalidad de Marketplace. En esta última, la
                        empresa actúa como un mero facilitador tecnológico para que terceros vendedores (en adelante,
                        "Sellers") ofrezcan sus productos, siendo dichos Sellers los exclusivos responsables por la
                        disponibilidad, facturación, garantía y calidad de los artículos comercializados bajo dicha
                        modalidad.
                    </div>
                </div>
            </div>

            <!-- Ítem 2: Políticas de Privacidad, Protección de Datos Personales y Uso de Cookies -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed text-morado" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseTwo">
                        <strong>2. Políticas de Privacidad, Protección de Datos Personales y Uso de Cookies</strong>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        En estricto cumplimiento de la Ley Nacional de Protección de Datos Personales N° 25.326 y sus
                        normas reglamentarias, la empresa garantiza la absoluta confidencialidad, resguardo y protección
                        de la información personal suministrada por los usuarios durante el proceso de registro y/o
                        navegación. Los datos recopilados serán procesados automatizadamente con el fin exclusivo de
                        gestionar la logística de envíos, validar la identidad del comprador para mitigar riesgos de
                        fraude electrónico, emitir los comprobantes fiscales correspondientes y optimizar la experiencia
                        de usuario. El titular de los datos personales tiene la facultad de ejercer el derecho de acceso
                        a los mismos en forma gratuita a intervalos no inferiores a seis meses, así como también
                        solicitar su rectificación, actualización o supresión (Derechos ARCO). El sitio web emplea
                        "cookies" y otras tecnologías de seguimiento estandarizadas en la industria para analizar el
                        tráfico, personalizar contenido publicitario y recordar preferencias de sesión. El usuario es
                        plenamente responsable de mantener la inviolabilidad de sus credenciales de acceso; cualquier
                        transacción efectuada con su usuario y contraseña se presumirá, sin admitir prueba en contrario,
                        como realizada por el titular de la cuenta.
                    </div>
                </div>
            </div>

            <!-- Ítem 3: Marco de Garantías y Exclusiones de Cobertura (sin "vicios") -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed text-morado" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseThree">
                        <strong>3. Marco de Garantías y Exclusiones de Cobertura</strong>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        Todo artículo comercializado a través de este canal digital se encuentra amparado por el régimen
                        de garantías estipulado en la Ley de Defensa del Consumidor N° 24.240. Los bienes muebles nuevos
                        de origen nacional e importados gozan de una garantía legal obligatoria por el término de 6
                        (seis) meses computados a partir de la fecha de recepción del bien. Por su parte, aquellos
                        bienes categorizados explícitamente como "reacondicionados", "outlet" o "de segunda selección"
                        dispondrán de una garantía legal máxima de 3 (tres) meses. La cobertura de la garantía se
                        circunscribe exclusivamente a defectos de fabricación que afecten la identidad o idoneidad del
                        producto para su uso previsto. Quedan terminantemente excluidos de toda cobertura legal o
                        convencional aquellos daños, averías o desperfectos ocasionados por: uso indebido o abusivo,
                        desgaste natural por paso del tiempo, fluctuaciones en la red eléctrica, alteraciones o intentos
                        de reparación ejecutados por personal técnico no autorizado, y daños físicos externos (golpes,
                        rayones, exposición a líquidos). En todos los casos, la ejecución de la garantía requerirá la
                        evaluación previa y la emisión de un dictamen técnico por parte de la Red de Servicios Técnicos
                        Autorizados (SAT) del fabricante.
                    </div>
                </div>
            </div>

            <!-- Ítem 4: Soporte Postventa y Política de Devoluciones (sin Botón de Arrepentimiento) -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed text-morado" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseFour">
                        <strong>4. Soporte Postventa y Política de Devoluciones</strong>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        El servicio de asistencia al cliente permite la gestión de cambios, devoluciones o reclamos
                        técnicos a través de canales digitales, telefónicos o mensajería instantánea. Para que el cambio
                        o devolución sea admitido y procesado favorablemente, es condición sine qua non que el bien se
                        encuentre en idénticas condiciones a las de su entrega: estrictamente sin uso, con sus fajas de
                        seguridad intactas, sus etiquetas de fábrica adheridas, y conteniendo la totalidad de sus
                        manuales, accesorios y empaques originales en estado inmaculado. Los gastos logísticos derivados
                        de la devolución del bien serán evaluados según las políticas internas de la empresa. Cualquier
                        incidencia posterior deberá ser canalizada a través del fabricante amparándose en el apartado de
                        garantías.
                    </div>
                </div>
            </div>

            <!-- Ítem 5: Modalidades, Condiciones Estrictas de Entrega y Recepción en Conformidad -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed text-morado" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseFive">
                        <strong>5. Modalidades, Condiciones Estrictas de Entrega y Recepción en Conformidad</strong>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        La transacción comercial contempla metodologías de entrega sujetas a protocolos de seguridad
                        inflexibles: <br><br>
                        <strong>Entregas a domicilio:</strong> El servicio de distribución logística operará de lunes a
                        sábados, efectuando la entrega exclusivamente en la línea de edificación del domicilio declarado
                        (puerta de calle o recepción de edificio). Bajo ninguna circunstancia el personal logístico
                        ingresará a la propiedad ni realizará tareas de instalación. La recepción del bulto requiere la
                        rúbrica y exhibición del DNI original por parte de una persona mayor de 18 años. El receptor
                        asume la obligación de inspeccionar el estado exterior del embalaje en el acto; la firma del
                        remito implica la recepción "en absoluta conformidad" del estado físico superficial de la
                        mercadería, inhabilitando reclamos posteriores por daños estéticos evidentes. En caso de
                        ausencia en el domicilio, se realizará una segunda visita. Si esta también resultase
                        infructuosa, el pedido será devuelto al centro de distribución, asumiendo el cliente los costos
                        de un nuevo despacho. <br><br>
                        <strong>Retiro presencial en sucursal (Click & Collect):</strong> La habilitación para el retiro
                        exige que el titular de la compra se apersone con su DNI físico original y la tarjeta de crédito
                        o débito física empleada en la operación financiera. En caso de designar a un tercero, este
                        deberá ser registrado previamente en la plataforma, debiendo presentarse con su propio DNI y una
                        copia o captura de validación del titular.
                    </div>
                </div>
            </div>

            <!-- Ítem 6: Procesamiento Administrativo, Tiempos Involucrados y Casos de Fuerza Mayor -->
            <div class="accordion-item">
                <h2 class="accordion-header">
                    <button class="accordion-button collapsed text-morado" type="button" data-bs-toggle="collapse"
                        data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false"
                        aria-controls="panelsStayOpen-collapseSix">
                        <strong>6. Procesamiento Administrativo, Tiempos Involucrados y Casos de Fuerza Mayor</strong>
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse">
                    <div class="accordion-body">
                        Los plazos estipulados tanto para los envíos a domicilio como para la disponibilidad en punto de
                        retiro son de carácter estimativo y comenzarán a regir de forma efectiva únicamente tras la
                        configuración de tres hitos administrativos secuenciales: 
                        <p></p>
                        <p>a) La confirmación real de disponibilidad de inventario en los centros de almacenamiento.</p>
                        <p>b) La validación de los algoritmos de prevención de fraudes sobre la identidad del comprador.</p>
                        <p>c) La notificación de acreditación irrevocable de los fondos por parte de la pasarela de pagos interviniente.</p> 
                        La empresa quedará exenta de cualquier responsabilidad por demoras, suspensiones o reprogramaciones
                        en las entregas que deriven de contingencias no imputables a su accionar, tales como casos
                        fortuitos o eventos de fuerza mayor (fenómenos meteorológicos severos, cortes de rutas, huelgas
                        sindicales, bloqueos aduaneros, pandemias o disposiciones gubernamentales de urgencia). Para la
                        modalidad de retiro en tienda, el cliente dispondrá de un lapso máximo e improrrogable de 10
                        (diez) días corridos contados desde la recepción del aviso electrónico de "Pedido Listo". El
                        incumplimiento de este plazo habilitará a la empresa a cancelar la factura y proceder al
                        reembolso del importe abonado mediante el mismo medio de pago utilizado, sin lugar a
                        indemnización adicional alguna.
                    </div>
                </div>
            </div>

        </div>
    </div>

    @include('piedepagina')

    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>