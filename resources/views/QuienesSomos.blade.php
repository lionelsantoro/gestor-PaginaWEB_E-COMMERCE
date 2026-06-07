<!DOCTYPE html>
<html lang="es">
@include('plantillas.head', ['titulo' => 'QuienesSomos'])

<body class="d-flex flex-column min-vh-100">

    @include('plantillas.menu')

    <main class="flex-grow-1">

        <section class="container my-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <h1 class="fw-bold mb-4 display-5 text-morado">Quiénes somos</h1>

                    <p class="lead fw-bold mb-4 text-rosado">
                        Frávega es una empresa argentina con más 100 años de trayectoria y más de 100 sucursales en todo
                        el país.
                    </p>

                    <p class="text-secondary">
                        Cuenta con más de 2.700 empleados que tienen como pilar la eficiencia y el servicio. Gracias a
                        esto, cubrimos las necesidades de un público que busca información, asesoramiento, garantía y
                        calidad, posicionándonos como la empresa líder en el mercado de electrodomésticos.
                    </p>
                </div>
            </div>
        </section>

        <section class="bg-light py-5 border-top border-bottom">
            <div class="container">
                <div class="row g-4">

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="d-flex align-items-center justify-content-center justify-content-sm-start p-2">
                            <i class="bi bi-clock-history display-5 text-primary me-3 text-morado"></i>
                            <div>
                                <h3 class="fw-bold mb-0">+100</h3>
                                <p class="text-muted mb-0">Años de historia</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="d-flex align-items-center justify-content-center justify-content-sm-start p-2">
                            <i class="bi bi-shop display-5 text-primary me-3 text-morado"></i>
                            <div>
                                <h3 class="fw-bold mb-0">+100</h3>
                                <p class="text-muted mb-0">Sucursales</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="d-flex align-items-center justify-content-center justify-content-sm-start p-2">
                            <i class="bi bi-people display-5 text-primary me-3 text-morado"></i>
                            <div>
                                <h3 class="fw-bold mb-0">+2.700</h3>
                                <p class="text-muted mb-0">Colaboradores</p>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="d-flex align-items-center justify-content-center justify-content-sm-start p-2">
                            <i class="bi bi-buildings display-5 text-primary me-3 text-morado"></i>
                            <div>
                                <h3 class="fw-bold mb-0">2</h3>
                                <p class="text-muted mb-0">Plantas industriales</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="container my-5 py-4">
            <div class="row g-5">
                <div class="col-md-4">
                    <h4 class="fw-bold text-rosado"><i class="bi bi-bullseye me-2"></i>Misión</h4>
                    <p class="text-secondary small">Facilitar el acceso a la tecnología y el confort, brindando
                        soluciones integrales y el mejor asesoramiento a las familias argentinas.</p>
                </div>
                <div class="col-md-4">
                    <h4 class="fw-bold text-rosado"><i class="bi bi-eye me-2"></i>Visión</h4>
                    <p class="text-secondary small">Ser el referente indiscutido en el mercado minorista y de
                        producción, innovando constantemente en nuestra oferta y canales de venta.</p>
                </div>
                <div class="col-md-4">
                    <h4 class="fw-bold text-rosado"><i class="bi bi-star me-2"></i>Valores</h4>
                    <p class="text-secondary small">Integridad, compromiso con el cliente, eficiencia operativa y
                        trabajo en equipo son los motores que nos impulsan día a día.</p>
                </div>
            </div>
        </section>

        <section class="container mb-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8 border-start border-morado border-4 ps-4">
                    <p class="text-secondary">
                        Hoy Frávega también juega un papel muy importante en la producción de electrodomésticos,
                        principalmente en los rubros TV, Audio, Microondas e Informática. Con dos plantas, una en Tierra
                        del Fuego y otra en Buenos Aires, Frávega produce lo último en tecnología.
                    </p>
                    <p class="text-secondary mb-0">
                        Tenemos previsto continuar inaugurando sucursales, generando así más puestos de trabajo e
                        invirtiendo en el desarrollo de nuestro país.
                    </p>
                </div>
            </div>
        </section>

    </main>

    @include('plantillas.piedepagina')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 

</body>

</html>