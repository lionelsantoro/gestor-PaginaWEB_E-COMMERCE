<!DOCTYPE html>
<html lang="es">
<head> 
    
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}"> 
</head> 
<body>

    @include('navbar')

<div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="false" aria-controls="panelsStayOpen-collapseOne">
        1. Servicios ofrecidos
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse">
      <div class="accordion-body">
        El sitio web funciona como una plataforma virtual destinada a la exhibición y comercialización de productos nuevos, reacondicionados e internacionales. El sistema permite a los usuarios registrados gestionar compras de forma directa o a través del servicio de Marketplace, donde terceros ofrecen sus artículos. La plataforma integra herramientas de búsqueda, carritos de compras y pasarelas de pago para formalizar las transacciones comerciales de manera electrónica.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
        2. Políticas de privacidad
      </button>
    </h2>
    <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse">
      <div class="accordion-body">
        El tratamiento de los datos personales es una condición obligatoria y vinculante para el uso de la cuenta y la concreción de operaciones en el sitio. La empresa recopila información necesaria para la facturación, validación de identidad y logística, garantizando la confidencialidad de los datos suministrados. El usuario es el único responsable de mantener la seguridad de sus credenciales de acceso y de actualizar cualquier información personal requerida por el sistema.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
        3. Garantías
      </button>
    </h2>
    <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse">
      <div class="accordion-body">
        La protección técnica de los artículos se aplica de forma diferenciada según la categoría y el origen del producto seleccionado por el comprador. Los bienes nuevos cuentan con una cobertura de fábrica de seis meses, mientras que los artículos reacondicionados disponen de un plazo de tres meses. En el caso de las adquisiciones realizadas bajo la modalidad internacional, no rige la garantía local, quedando estas sujetas exclusivamente a los términos y condiciones del fabricante en su país de origen.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFour" aria-expanded="false" aria-controls="panelsStayOpen-collapseFour">
        4. Soporte postventa
      </button>
    </h2>
    <div id="panelsStayOpen-collapseFour" class="accordion-collapse collapse">
      <div class="accordion-body">
        El servicio de asistencia al cliente permite la gestión de cambios, devoluciones o reclamos técnicos a través de canales digitales, telefónicos o mensajería instantánea. Los usuarios pueden solicitar la revocación de la aceptación o el cambio por fallas estéticas dentro de los plazos legales establecidos, siempre que el producto se entregue con sus accesorios y empaques originales. Este soporte garantiza la resolución de eventualidades una vez finalizado el proceso de compra inicial.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseFive" aria-expanded="false" aria-controls="panelsStayOpen-collapseFive">
        5. Formas de entregas
      </button>
    </h2>
    <div id="panelsStayOpen-collapseFive" class="accordion-collapse collapse">
      <div class="accordion-body">
        La plataforma establece dos modalidades principales para que el usuario reciba los productos adquiridos: la entrega directa en domicilio o el retiro presencial en puntos físicos habilitados. Para los envíos domiciliarios, se exige la validación de identidad del receptor y la entrega se realiza en la línea de edificación. En la opción de retiro en tienda, el titular de la compra debe presentar su documentación personal y el medio de pago utilizado para poder retirar satisfactoriamente el artículo.
      </div>
    </div>
  </div>

  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseSix" aria-expanded="false" aria-controls="panelsStayOpen-collapseSix">
        6. Tiempos involucrados
      </button>
    </h2>
    <div id="panelsStayOpen-collapseSix" class="accordion-collapse collapse">
      <div class="accordion-body">
        Los plazos de entrega y retiro están supeditados a la confirmación de stock, la validación de datos y la acreditación del pago por parte de las entidades financieras. Los envíos a domicilio se despachan en franjas horarias determinadas de lunes a sábados, variando según la ubicación geográfica del destino. Para el retiro en sucursal, el usuario debe aguardar la notificación de disponibilidad y dispone de un período máximo de días corridos para retirar el producto antes de su anulación.
      </div>
    </div>
  </div>
</div>



          <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 
</body>
</html>