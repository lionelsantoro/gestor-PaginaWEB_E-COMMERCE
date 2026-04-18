<!DOCTYPE html>
<html lang="es">

    <head> 
        <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}"> 
    </head> 
    
    <body class="d-flex flex-column min-vh-100">

        @include('menu')

        <main class="flex-grow-1 container my-5">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                                        
                    <h1 class="fw-bold mb-4">Quiénes somos</h1>
                    
                    <p class="fw-bold mb-3">
                        Frávega es una empresa argentina con más 100 años de trayectoria y más de 100 sucursales en todo el país.
                    </p>
                    
                    <p class="text-secondary mb-3">
                        Cuenta con más de 2.700 empleados que tienen como pilar la eficiencia y el servicio. Gracias a esto, cubrimos las necesidades de un público que busca información, asesoramiento, garantía y calidad, posicionándonos como la empresa líder en el mercado de electrodomésticos. A lo largo del tiempo, la empresa se ha convertido en un referente para los consumidores argentinos, gracias a la gran variedad de marcas y modelos, los mejores precios y nuestra financiación.
                    </p>
                    
                    <p class="text-secondary mb-5">
                        Hoy Frávega también juega un papel muy importante en la producción de electrodomésticos, principalmente en los rubros TV, Audio, Microondas e Informática. Con dos plantas, una en Tierra del Fuego y otra en Buenos Aires, Frávega produce lo último en tecnología. Frávega tiene previsto para este año continuar inaugurando sucursales, generando así más puestos de trabajo e invirtiendo en el desarrollo de nuestro país.
                    </p>

                </div>
            </div>
        </main>

        @include('piedepagina')

       <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script> 

    </body>

</html>