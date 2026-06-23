<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## 1. Autenticación y Seguridad

Estos controladores gestionan el registro, el acceso y las sesiones de los usuarios.

### `AuthController`, `LoginController` y `RegistroController`

Manejan de forma modularizada o centralizada las peticiones de autenticación.

| Controlador                                 | Método                   | Descripción |
| **`AuthController` / `RegistroController**` | `registrar` / `procesar` | Valida los datos del formulario, verifica que el correo sea único (`unique:usuarios,correo`), encripta la contraseña (`Hash::make`), crea el registro en la BD, inicia la sesión automáticamente y redirige al inicio. |
| **`AuthController` / `LoginController**`    | `login` / `procesar`     | Autentica al usuario usando `Auth::attempt()`. Si es exitoso, regenera la sesión por seguridad (`regenerate()`). Si falla, devuelve los errores a la vista. |
| **`AuthController` / `LoginController**`    | `logout`                 | Cierra la sesión activa (`Auth::logout()`), invalida los datos de la sesión actual y regenera el token CSRF antes de redirigir al inicio. |

---

## 2. Área Pública y Cliente

Controladores encargados de la experiencia del usuario final, navegación y proceso de compras.

### `CatalogoController`

Gestiona la visualización de los productos para el público en general.

| Método  | Descripción |
| ---     | --- |
| `index` | Trae todas las categorías activas para los botones de filtrado y pagina los productos activos (de a 15). Aplica filtros condicionales si el usuario selecciona una categoría específica desde la URL. |

### `CarritoController`

Administra la lógica del carrito de compras, el cual se modela transitoriamente como un `Pedido` en estado `pendientePago`.

| Método               | Descripción |
| ---                  | --- |
| `index`              | Busca y muestra el pedido activo (`pendientePago`) del usuario autenticado con sus respectivos ítems y productos. |
| `agregar`            | Valida el stock del producto. Si no existe un carrito activo, lo crea. Suma la cantidad o crea un nuevo ítem, recalculando el total. |
| `actualizarCantidad` | Modifica la cantidad de un ítem existente (validando que no supere el stock) o lo elimina si la cantidad es menor a 1. Recalcula el total. |
| `eliminar`           | Elimina un ítem específico del carrito y actualiza el total del pedido. |
| `vaciarCarrito`      | Cancela el pedido en estado `pendientePago`, vaciando efectivamente el carrito de compras. |
| `confirmarPago`      | Valida el stock final, descuenta las unidades del inventario global (`decrement('stock')`), actualiza la dirección de envío, recalcula el total y cambia el estado del pedido a `pagada`. Utiliza `DB::transaction` para evitar inconsistencias de datos. |

### `ContactoController`

Maneja los mensajes enviados por los clientes desde el frontend.

| Método     | Descripción |
| ---        | --- |
| `procesar` | Valida los campos del formulario mediante expresiones regulares (letras y espacios para el asunto). Crea el registro de tipo `Consulta` asociado al usuario logueado con estado inicial `noLeido`. |

---

## 3. Panel de Administración

Controladores protegidos para uso exclusivo del personal interno, orientados a la gestión (ABM/CRUD) del e-commerce.

### `ProductoController`

Gestión del catálogo de camisetas.

| Método       | Descripción |
| ---          | --- |
| `index`      | Lista los productos incluyendo su categoría asociada. Permite realizar búsquedas por nombre o aplicar filtros directos por categoría. |
| `store`      | Crea un nuevo producto validando campos esenciales (nombre, descripción, stock, precio, etc.) y lo marca como `activo`. |
| `update`     | Modifica los datos de un producto existente. |
| `bajaLogica` | Aplica una eliminación suave (soft delete manual), cambiando el atributo `activo` a `false` en lugar de borrar el registro físicamente. |

### `PedidoController`

Gestión de las compras realizadas por los clientes.

| Método            | Descripción |
| ---               | --- |
| `index`           | Lista todos los pedidos excluyendo los que están en proceso de compra (`pendientePago`), mostrando los ítems y los datos del comprador ordenados por fecha. |
| `actualizarEstado`| Modifica el estado general del pedido (ej. de *En preparación* a *Entregado*). |
| `actualizarEnvio` | Cambia el estado logístico del envío (`enviado`, `no enviado`, `listo para retirar`). Valida estrictamente que el pedido se encuentre previamente en estado `pagada`. |

### `ConsultaController`

Buzón de entrada para el área de soporte o atención al cliente.

| Método        | Descripción |
| ---           | --- |
| `index`       | Muestra todos los mensajes recibidos priorizando los no leídos (`estado = 'noLeido'`) y luego ordenándolos de manera descendente por fecha. |
| `marcarLeido` | Actualiza el estado de la consulta a `leido`. |
| `destroy`     | Elimina físicamente el mensaje del sistema. |

### `UsuarioController`

Gestión de usuarios y accesos administrativos.

| Método       | Descripción |
| ---          | --- |
| `index`      | Lista los usuarios activos. Permite búsqueda avanzada combinando nombre y correo, además de filtrar por tipo de rol (`cliente` o `admin`). |
| `store`      | Crea un nuevo usuario administrador directamente desde el panel con contraseña encriptada. |
| `update`     | Actualiza los datos personales de un administrador. Si se envía una nueva contraseña en el formulario, también la encripta y actualiza. |
| `bajaLogica` | Suspende la cuenta de un usuario cambiando su estado `active` a `false`, impidiendo futuros inicios de sesión. |

---

## 4. Directorio `plantillas` 


| Componente                        | Descripción                              | Características principales |
| ---                               | ---                                      | --- |
| **Cabecera (`head`)**             | Meta-etiquetas y carga de dependencias.  | Configura el viewport, carga Bootstrap (vía CDN y local), iconos de Bootstrap y enlaza las hojas de estilo propias (`home.css`, `paleta_colores.css`). Incluye el `csrf-token` para seguridad en peticiones. |
| **Menú de Navegación (`navbar`)** | Barra de navegación superior responsive. | Utiliza directivas Blade (`request()->is()`) para marcar la página activa. Su contenido es dinámico según el estado del usuario:<br>

**Visita (`@guest`):** Muestra botones de Login/Registro.

**Cliente:** Muestra el carrito de compras con un *badge* dinámico (consulta la BD en tiempo real) y el historial.

**Admin:** Oculta el enlace de contacto y habilita el acceso al Panel de Administración. 

**Modal de Datos Personales** | Ventana emergente para gestionar el perfil. | Integrado directamente en el menú para usuarios autenticados (`@auth`). Permite al usuario logueado actualizar su nombre, correo o contraseña mediante una petición `PUT` al controlador. |

**Panel Lateral Admin** | Menú de navegación interno para administradores. | Componente tipo *sidebar* que contiene accesos rápidos a las rutas de gestión: Productos, Usuarios, Consultas y Pedidos. Usa colores dinámicos para resaltar la sección actual. |

**Pie de Página (`footer`)** | Cierre estructural del sitio. | Contiene enlaces a términos de uso, contacto comercial y los derechos de autor fijos del e-commerce. |

---

## 5. Directorio `formularios`

### Vistas de Feedback (Toasts Independientes)

Pantallas dedicadas a mostrar un mensaje de éxito tras una acción importante, bloqueando el resto del contenido para asegurar que el usuario lea la confirmación.

* **`MensajeExitoso.blade.php`:** Confirma el envío de una consulta a través del formulario de contacto. Invita al usuario a esperar la respuesta de un asesor.
* **`InicioSesionExitoso.blade.php`:** Saludo de bienvenida tras un login exitoso.
* **`RegistroExitoso.blade.php`:** Confirmación de creación de cuenta.

> **UX/UI Note:** Estas tres vistas instancian un componente `Toast` de Bootstrap que se inicializa automáticamente al cargar el DOM mediante JavaScript, requiriendo que el usuario haga clic en "Aceptar" para continuar navegando.

### Formularios de Acceso (Login y Registro)

Vistas que contienen la lógica de interfaz para la autenticación de usuarios. Destacan por su robusta validación en el frontend antes de enviar los datos al servidor.

| Vista              | Funcionalidad        | Validaciones y UX |
| ---                | ---                  | --- |
| **`InicioSesion`** | Formulario de Login. | • Muestra alertas de error de Laravel si las credenciales fallan (`$errors->any()`).<br>

• ** Validación HTML5 mediante `pattern="^[^@\s]+@[^@\s]+\.com$"` para asegurar un formato de correo estricto.

• ** Incorpora un Toast de éxito superpuesto con efecto de desenfoque (`fondo-desenfocado` con `backdrop-filter: blur()`) que se activa si existe una variable de sesión `success`. |

• **`Registro`** | Formulario de creación de cuenta. | • Campos divididos en formato grilla para Nombre y Apellido.

• ** Validación HTML5 estricta de caracteres mediante expresiones regulares (solo letras y espacios permitidos).

• ** Validación dinámica de contraseñas:** Utiliza JavaScript puro en el evento `oninput` (`setCustomValidity`) para asegurar que los campos "Contraseña" y "Confirmar contraseña" coincidan en tiempo real antes del *submit*.

• ** Al igual que el login, incluye el efecto modal de desenfoque ante un registro exitoso. 


Aquí tienes la documentación estructurada para las vistas correspondientes al catálogo y al proceso de compra (carrito), manteniendo la misma jerarquía, diseño en tablas y enfoque en la experiencia de usuario (UX) para tu `README.md`.

---

## 6. Directorio `catalogo` (Exploración de Productos)

Esta carpeta contiene la interfaz pública donde los usuarios (visitantes y clientes) interactúan con el inventario de la tienda.

### `index.blade.php` (Catálogo Principal)

Muestra la grilla de productos disponibles con filtros interactivos y control de stock en tiempo real.

| Funcionalidad                   | Descripción y Lógica Aplicada |
| ---                             | --- |
| **Cálculo de Stock Dinámico**   | Al inicio de la vista, un bloque `@php` consulta el carrito activo del usuario. Calcula la diferencia entre el stock real de la base de datos y la cantidad que el usuario ya tiene en su carrito, bloqueando compras que excedan la existencia física. |
| **Filtros por Categoría**       | Botones dinámicos que filtran los productos mediante la variable `categoria` en la URL. El botón seleccionado cambia visualmente (fondo morado sólido) usando directivas condicionales de Blade. |
| **Grilla de Productos**         | Tarjetas (*cards*) responsivas. Muestran imagen, nombre, precio formateado y una placa de estado de stock (verde con cantidad o rojo "Agotado"). |
| **Botón "Agregar" Interactivo** | Su estado cambia dinámicamente ("AGREGAR", "MÁXIMO EN CARRITO" o "SIN STOCK") según la disponibilidad. Utiliza una petición `fetch` (AJAX) para enviar el ítem al backend en segundo plano, mostrando un *spinner* de carga durante el proceso. |
| **Feedback Visual (Modal)**     | Tras intentar agregar un producto, lanza un modal dinámico (`modalCarrito`) que confirma el éxito de la acción (e incrementa visualmente el *badge* del navbar) o informa si hubo un error (ej. límite de stock alcanzado). Si el usuario no está logueado, lo redirige a `/login`. |

---

## 7. Directorio `carrito` (Gestión de Pedidos y Checkout)

Agrupa las vistas privadas del cliente (`Auth` requerido) para gestionar su carrito activo, confirmar la compra y revisar su historial de transacciones.

### `index.blade.php` (Mi Carrito y Checkout)

Es la vista más compleja del frontend, ya que concentra la edición del pedido, las validaciones estrictas y el pago simulado.

| Sección / Modal               | Descripción y Reglas de Negocio (UX/UI) |
| ---                           | --- |
| **Tabla del Carrito**         | Lista los ítems agregados. Maneja dos estados: "Carrito vacío" (con CTA hacia el catálogo) o "Tabla de ítems". Calcula subtotales y el total acumulado de forma automática. |
| **Edición de Cantidades**     | Formularios individuales por fila. Mediante JavaScript, se intercepta el cambio de cantidad para evitar que el usuario ingrese números negativos o supere el stock disponible (`data-stock`). |
| **Modal: Eliminar y Vaciar**  | Modales de doble confirmación (estilo *Danger*) para acciones destructivas (eliminar un ítem específico o vaciar el pedido completo). |
| **Modal: Formulario de Pago** | Formulario completo para el *Checkout*. No recarga la página al fallar, todo se valida vía JS antes del envío: <br>

• **N° Tarjeta:** Auto-formateo en bloques de 4, exige exactamente 16 dígitos.

• **Titular:** Bloquea el ingreso de números.

• **Vencimiento:** Auto-formato `MM/AA`. Valida que el mes sea lógico (1-12) y que la fecha sea estrictamente posterior al mes en curso.

• **CVV:** Enmascarado por seguridad (`-webkit-text-security: disc`), exige 3 o 4 dígitos. |

• **Modal: Compra Exitosa** | Si la petición AJAX de pago responde con `success`, oculta el formulario y lanza una pantalla de éxito bloqueada (`data-bs-backdrop="static"`), obligando al usuario a volver al inicio, dando por cerrado el ciclo de compra. |

### `historialcompra.blade.php` (Mis Pedidos)

Panel del cliente para dar seguimiento a las compras realizadas anteriormente.

| Componente              | Características principales |
| ---                     | --- |
| **Estado Vacío**        | Si la colección `$pedidos` está vacía, presenta un diseño amigable invitando al usuario a realizar su primera compra. |
| **Tabla de Seguimiento**| Muestra el ID del pedido (con ceros a la izquierda usando `str_pad`), fecha de creación, estado de facturación (*Pagada, Pendiente, Cancelada*) y dirección. |
| **Estado Logístico**    | Columna visual que traduce la etapa de envío actual (*Procesando, Enviado, Listo para retirar*) apoyada con iconos descriptivos para que el cliente conozca la ubicación de su paquete. |
| **Detalle Desplegable** | Cada fila posee un botón "Ver detalles" que abre un modal de tamaño grande (`modal-lg`). Este modal renderiza el desglose exacto (ticket) de los productos comprados en esa orden específica, sus cantidades, subtotales históricos y el total abonado. |

---

## 8. Directorio `admin`

### `PanelAdmin.blade.php` (Dashboard)

Vista principal que actúa como centro de control general al ingresar al área administrativa.

| Sección             | Descripción y Características |
| ---                 | --- |
| **KPIs (Tarjetas)** | Muestra métricas clave del negocio: Pedidos pendientes, Ticket medio, Usuarios registrados y Pedidos entregados. |
| **Últimos Pedidos** | Tabla de acceso rápido con las transacciones más recientes y sus estados visuales. |
| **Top 5 Productos** | Lista de los artículos más vendidos del catálogo, ordenados por ranking. |

### `ProductosAdmin.blade.php` (Gestión de Catálogo)

Interfaz completa para el ABM (Alta, Baja y Modificación) del inventario de la tienda.

| Funcionalidad              | Descripción y Lógica Aplicada (UX/JS) |
| ---                        | --- |
| **Resumen y Filtros**      | Muestra contadores dinámicos de productos activos por categoría. Permite buscar por nombre o filtrar enviando parámetros `GET` al controlador. |
| **Tabla de Inventario**    | Muestra la miniatura del producto (o un avatar con las iniciales si no tiene imagen), nombre, categoría, precio y **alerta de stock** (se pinta en rojo si el stock actual es menor o igual al "Stock Bajo" configurado). |
| **Modal: Crear Producto**  | **Formulario dinámico:** Al seleccionar una categoría, JavaScript revela campos específicos (ej. RAM para Teléfonos, Capacidad para Heladeras). Al enviar el formulario, JS concatena todos estos campos en un único texto HTML estructurado y lo guarda en el campo oculto `descripcion`. |
| **Modal: Editar Producto** | Realiza el proceso inverso al de creación. Lee el HTML almacenado, lo limpia y lo muestra de forma legible en un `textarea`. Al guardar, JS vuelve a procesar el texto con etiquetas `<strong>` antes de enviarlo al servidor. |

### `PedidosAdmin.blade.php` (Gestión de Ventas)

Panel para el seguimiento y actualización logística de las compras realizadas por los clientes.

| Funcionalidad              | Descripción y Reglas de Negocio |
| ---                        | --- |
| **Filtro en Tiempo Real**  | Buscador por N° de pedido o nombre del cliente, y filtro por estado general. Implementado con JS puro (`filtrarTabla()`) para ocultar/mostrar filas del DOM instantáneamente sin consultar al backend. |
| **Indicadores Visuales**   | Uso de *badges* semánticos de Bootstrap para identificar rápidamente el estado financiero (Pagada/Pendiente/Cancelada) y el estado logístico (Enviado/Listo/No enviado). |
| **Modal: Detalle y Envío** | Muestra el ticket completo de la compra. Contiene el formulario para actualizar el **Estado de Envío**. <br>

**Regla estricta:** El botón de actualizar y el selector de envío están deshabilitados (`disabled`) mediante condiciones Blade si el estado del pedido no es exactamente `pagada`. |

### `ConsultasAdmin.blade.php` (Soporte y Contacto)

Bandeja de entrada para los mensajes recibidos desde el formulario público de la tienda.

| Funcionalidad              | Descripción y UX |
| ---                        | --- |
| **Bandeja de Entrada**     | Lista de mensajes estructurada como correos electrónicos. Los mensajes no leídos se resaltan con fondo blanco y tipografía en negrita, mientras que los leídos adoptan un tono grisáceo. |
| **Filtro Cliente (JS)**    | Barra de búsqueda que filtra en tiempo real por el nombre del remitente o el asunto del mensaje, combinado con un selector de leídos/no leídos. |
| **Modal: Ver y Responder** | Al abrir un mensaje, se visualizan los datos del cliente. Se integra un botón de "Responder por Email" que utiliza el protocolo nativo `mailto:` para abrir el gestor de correos del administrador con la dirección del cliente pre-cargada. |

### `UsuariosAdmin.blade.php` (Control de Accesos)

Gestión de cuentas registradas en la plataforma, dividiendo a los clientes de la fuerza laboral.

| Funcionalidad                  | Descripción y Seguridad |
| ---                            | --- |
| **Diseño Condicional**         | Divide la pantalla en dos columnas (Clientes y Administradores). Si el usuario filtra por un rol específico, la columna de ese rol se expande al 100% del ancho (`col-md-12`) automáticamente mediante lógica Blade. |
| **Gestión de Administradores** | Permite registrar nuevas credenciales con acceso al panel. |
| **Mecanismo de Seguridad**     | En la lista de Administradores, el sistema identifica al usuario actualmente logueado (`Auth::id() == $admin->id`), resalta su tarjeta con un borde morado y **elimina el botón de borrado**, previniendo que un administrador elimine su propia cuenta por error. |


Aquí tienes la documentación estructurada para estas vistas principales (raíz), manteniendo la jerarquía y el formato de las entregas anteriores para que puedas copiar y pegar directamente en tu `README.md`.

---

## 9. `index.blade.php` (Página Principal / Inicio)

Es la página de inicio del sitio. Está diseñada para retener la atención del usuario mediante un fuerte componente visual (carruseles) y facilitar el acceso rápido a la compra por impulso.

| Funcionalidad / Sección                | Descripción y Lógica Aplicada (UX/JS) |
| ---                                    | --- |
| **Lógica de Precarga (PHP)**           | Consulta a la base de datos los 10 primeros productos activos para mostrarlos como destacados. Además, recupera el carrito activo del usuario (si está logueado) para cruzar las cantidades previas con el stock real disponible. |
| **Carruseles Promocionales**           | Cuenta con dos *sliders* (superior e inferior) automatizados mediante Bootstrap, destinados a mostrar *banners* estáticos de ofertas o campañas vigentes de la marca. |
| **Accesos Rápidos a Categorías**       | Tarjetas informativas y botones circulares con animaciones CSS (`transition` y `hover`) que redirigen al usuario directamente al catálogo filtrado por la categoría seleccionada (ej. `?categoria=1`). |
| **Carrusel de Productos (Destacados)** | Muestra los 10 productos precargados dividiéndolos internamente en grupos de 4 (`chunk(4)`) para deslizarse de forma fluida. |
| **Micro-interacción de Compra**        | Al igual que en el catálogo, cada tarjeta de producto evalúa su stock en tiempo real. Utiliza el mismo flujo **AJAX (fetch)** para agregar productos al carrito sin salir del inicio, actualizando visualmente el botón, bloqueando el sobre-stock y mostrando un Modal de confirmación. |

---

## 2. `contacto.blade.php` (Atención al Cliente)

Esta página centraliza los canales de comunicación de la empresa. Su diseño está dividido en dos columnas para separar claramente la acción (formulario) de la información (teléfonos y redes).

| Funcionalidad / Sección                  | Descripción y Lógica Aplicada (UX/UI) |
| ---                                      | --- |
| **Renderizado Condicional (Formulario)** | **Para Clientes (`@auth`):** Despliega el formulario de consulta. Para mejorar la experiencia de usuario y evitar errores, los campos *Nombre* y *Correo* se autocompletan con la sesión actual y se bloquean con el atributo `readonly` (solo lectura, fondo gris).
  **Para Visitas (`@guest`):** Oculta el formulario por seguridad y en su lugar muestra una alerta (tipo *Warning*) invitando al usuario a iniciar sesión o registrarse. |
| **Validaciones HTML5**                   | El campo "Asunto" bloquea el ingreso de caracteres extraños mediante expresiones regulares (`pattern="^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]+$"`), forzando una entrada limpia antes de enviar al backend. |
| **Información Estática**                 | Columna dedicada a mostrar números de atención general, cobranzas, ventas corporativas y enlaces directos a las redes sociales de la empresa. |
| **Feedback Visual (Toast)**              | Al enviar una consulta exitosamente (`session('success_contacto')`), el sistema renderiza un mensaje Toast superpuesto. Utiliza la clase CSS personalizada `.fondo-desenfocado` (`backdrop-filter: blur()`) para oscurecer el fondo, obligando al usuario a interactuar con el botón "Aceptar y continuar" antes de seguir navegando. |
