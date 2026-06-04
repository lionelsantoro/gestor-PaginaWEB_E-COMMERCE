<head>
    <meta charset="UTF-8">
   <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ $titulo ?? 'PáginaPrincipal' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="icon" href="{{ asset('/Imagenes inicio/foto00.png') }}" type="image/x-icon">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <link rel="stylesheet" href="/css/home.css">
    <link rel="stylesheet" href="/css/paleta_colores.css">
    <link rel="stylesheet" href="/css/boton_catalogo.css">
</head>