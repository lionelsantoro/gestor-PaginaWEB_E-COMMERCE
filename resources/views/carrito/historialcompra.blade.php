<!DOCTYPE html>
<html lang="es">

@include('plantillas.head', ['titulo' => 'Mi Carrito'])

<body class="d-flex flex-column min-vh-100">

    @include('plantillas.menu')

    <a class="navbar-brand" href="/">
        <img src="/Imagenes inicio/foto0.png" height="50" alt="Logo de la marca">
    </a>

    @include('plantillas.piedepagina')

</body>

</html>