<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;
use App\Models\Categoria;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        $idTelefonos = Categoria::where('nombre', 'Teléfonos')->first()->id;
        $idComputadoras = Categoria::where('nombre', 'Computadoras')->first()->id;
        $idLavarropas = Categoria::where('nombre', 'Lavarropas')->first()->id;
        $idHeladeras = Categoria::where('nombre', 'Heladeras')->first()->id;

        // Metemos todos los productos en un gran array
        $productos = [
            // --- COMPUTADORAS ---
            [
                'nombre' => 'APPLE MACBOOK PRO 16 (M3 MAX)', 'precio' => 4500000, 'stock' => 5, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO1.jpg', 
                'descripcion' => '<strong>Procesador:</strong> Apple M3 Max<br><strong>RAM:</strong> 36 GB Unificada<br><strong>Almacenamiento:</strong> 1 TB SSD<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'LENOVO LEGION PRO 7I', 'precio' => 3800000, 'stock' => 8, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO2.jfif', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core i9-14900HX<br><strong>RAM:</strong> 32 GB DDR5<br><strong>Almacenamiento:</strong> 2 TB SSD<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'DELL XPS 14', 'precio' => 3200000, 'stock' => 12, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO3.jpg', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core Ultra 7<br><strong>RAM:</strong> 16 GB LPDDR5x<br><strong>Almacenamiento:</strong> 1 TB SSD<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'ASUS ROG ZEPHYRUS G14', 'precio' => 3500000, 'stock' => 10, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO4.webp', 
                'descripcion' => '<strong>Procesador:</strong> AMD Ryzen 9 8945HS<br><strong>RAM:</strong> 32 GB LPDDR5x<br><strong>Almacenamiento:</strong> 1 TB SSD<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'HP SPECTRE X360 14', 'precio' => 2900000, 'stock' => 15, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO5.webp', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core Ultra 7<br><strong>RAM:</strong> 16 GB LPDDR5x<br><strong>Almacenamiento:</strong> 1 TB SSD<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'SAMSUNG GALAXY BOOK4 ULTRA', 'precio' => 3900000, 'stock' => 7, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO6.webp', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core Ultra 9<br><strong>RAM:</strong> 32 GB LPDDR5x<br><strong>Almacenamiento:</strong> 1 TB SSD<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'MSI STEALTH 16 STUDIO', 'precio' => 3100000, 'stock' => 10, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO7.webp', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core i7-13700H<br><strong>RAM:</strong> 16 GB DDR5<br><strong>Almacenamiento:</strong> 1 TB SSD<br><strong>Envío:</strong> $15.000'
            ],
            [
                'nombre' => 'ACER PREDATOR HELIOS NEO 16', 'precio' => 2500000, 'stock' => 20, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO8.jfif', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core i7-14700HX<br><strong>RAM:</strong> 16 GB DDR5<br><strong>Almacenamiento:</strong> 1 TB SSD<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'APPLE MACBOOK AIR 15 (M3)', 'precio' => 2600000, 'stock' => 25, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO9.jpg', 
                'descripcion' => '<strong>Procesador:</strong> Apple M3<br><strong>RAM:</strong> 16 GB Unificada<br><strong>Almacenamiento:</strong> 512 GB SSD<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'LENOVO YOGA 9I', 'precio' => 2400000, 'stock' => 18, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO10.webp', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core Ultra 7<br><strong>RAM:</strong> 16 GB LPDDR5x<br><strong>Almacenamiento:</strong> 1 TB SSD<br><strong>Envío:</strong> $12.000'
            ],
            [
                'nombre' => 'DELL ALIENWARE M16 R2', 'precio' => 3400000, 'stock' => 6, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO11.jpg', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core Ultra 9<br><strong>RAM:</strong> 32 GB DDR5<br><strong>Almacenamiento:</strong> 1 TB SSD<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'HP OMEN TRANSCEND 16', 'precio' => 2750000, 'stock' => 14, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO12.jfif', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core i7-14700HX<br><strong>RAM:</strong> 16 GB DDR5<br><strong>Almacenamiento:</strong> 1 TB SSD<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'ASUS ZENBOOK 14 OLED', 'precio' => 1950000, 'stock' => 30, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO13.webp', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core Ultra 7<br><strong>RAM:</strong> 16 GB LPDDR5x<br><strong>Almacenamiento:</strong> 1 TB SSD<br><strong>Envío:</strong> $10.000'
            ],
            [
                'nombre' => 'ACER SWIFT GO 14', 'precio' => 1450000, 'stock' => 40, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO14.webp', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core Ultra 5<br><strong>RAM:</strong> 16 GB LPDDR5x<br><strong>Almacenamiento:</strong> 512 GB SSD<br><strong>Envío:</strong> $8.000'
            ],
            [
                'nombre' => 'MSI RAIDER GE78 HX', 'precio' => 4800000, 'stock' => 3, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO15.jpg', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core i9-14900HX<br><strong>RAM:</strong> 64 GB DDR5<br><strong>Almacenamiento:</strong> 2 TB SSD<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'SAMSUNG GALAXY BOOK4 PRO', 'precio' => 2500000, 'stock' => 22, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO16.jfif', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core Ultra 7<br><strong>RAM:</strong> 16 GB LPDDR5x<br><strong>Almacenamiento:</strong> 512 GB SSD<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'LENOVO THINKPAD X1 CARBON GEN 12', 'precio' => 3300000, 'stock' => 15, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO17.webp', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core Ultra 7<br><strong>RAM:</strong> 32 GB LPDDR5x<br><strong>Almacenamiento:</strong> 1 TB SSD<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'DELL INSPIRON 16 PLUS', 'precio' => 1850000, 'stock' => 35, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO18.webp', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core i7-13700H<br><strong>RAM:</strong> 16 GB DDR5<br><strong>Almacenamiento:</strong> 1 TB SSD<br><strong>Envío:</strong> $12.000'
            ],
            [
                'nombre' => 'HP ENVY 16', 'precio' => 2100000, 'stock' => 20, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO19.webp', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core i7-13700H<br><strong>RAM:</strong> 16 GB DDR5<br><strong>Almacenamiento:</strong> 1 TB SSD<br><strong>Envío:</strong> $10.000'
            ],
            [
                'nombre' => 'ASUS TUF GAMING A15', 'precio' => 1750000, 'stock' => 45, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO20.webp', 
                'descripcion' => '<strong>Procesador:</strong> AMD Ryzen 7 7735HS<br><strong>RAM:</strong> 16 GB DDR5<br><strong>Almacenamiento:</strong> 512 GB SSD<br><strong>Envío:</strong> $8.500'
            ],
            [
                'nombre' => 'APPLE MACBOOK AIR 13 (M2)', 'precio' => 1650000, 'stock' => 50, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO21.webp', 
                'descripcion' => '<strong>Procesador:</strong> Apple M2<br><strong>RAM:</strong> 8 GB Unificada<br><strong>Almacenamiento:</strong> 256 GB SSD<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'ACER NITRO 5', 'precio' => 1350000, 'stock' => 60, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO22.webp', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core i5-13420H<br><strong>RAM:</strong> 8 GB DDR5<br><strong>Almacenamiento:</strong> 512 GB SSD<br><strong>Envío:</strong> $7.500'
            ],
            [
                'nombre' => 'MSI CYBORG 15', 'precio' => 1500000, 'stock' => 30, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO23.webp', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core i7-13620H<br><strong>RAM:</strong> 16 GB DDR5<br><strong>Almacenamiento:</strong> 512 GB SSD<br><strong>Envío:</strong> $9.000'
            ],
            [
                'nombre' => 'LENOVO IDEAPAD SLIM 5', 'precio' => 1150000, 'stock' => 55, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO24.jfif', 
                'descripcion' => '<strong>Procesador:</strong> AMD Ryzen 7 7730U<br><strong>RAM:</strong> 16 GB LPDDR4x<br><strong>Almacenamiento:</strong> 512 GB SSD<br><strong>Envío:</strong> $6.500'
            ],
            [
                'nombre' => 'HP PAVILION PLUS 14', 'precio' => 1250000, 'stock' => 40, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO25.webp', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core i5-13500H<br><strong>RAM:</strong> 16 GB LPDDR5<br><strong>Almacenamiento:</strong> 512 GB SSD<br><strong>Envío:</strong> $7.000'
            ],
            [
                'nombre' => 'DELL VOSTRO 3530', 'precio' => 950000, 'stock' => 80, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO26.webp', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core i5-1335U<br><strong>RAM:</strong> 8 GB DDR4<br><strong>Almacenamiento:</strong> 256 GB SSD<br><strong>Envío:</strong> $5.500'
            ],
            [
                'nombre' => 'ASUS VIVOBOOK 16', 'precio' => 1050000, 'stock' => 65, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO27.webp', 
                'descripcion' => '<strong>Procesador:</strong> AMD Ryzen 5 7530U<br><strong>RAM:</strong> 16 GB DDR4<br><strong>Almacenamiento:</strong> 512 GB SSD<br><strong>Envío:</strong> $6.000'
            ],
            [
                'nombre' => 'ACER ASPIRE 5', 'precio' => 850000, 'stock' => 90, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO28.webp', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core i3-1315U<br><strong>RAM:</strong> 8 GB DDR4<br><strong>Almacenamiento:</strong> 256 GB SSD<br><strong>Envío:</strong> $5.000'
            ],
            [
                'nombre' => 'MSI MODERN 14', 'precio' => 900000, 'stock' => 45, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO29.jpeg', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core i5-1235U<br><strong>RAM:</strong> 16 GB DDR4<br><strong>Almacenamiento:</strong> 512 GB SSD<br><strong>Envío:</strong> $5.500'
            ],
            [
                'nombre' => 'SAMSUNG GALAXY BOOK3', 'precio' => 1100000, 'stock' => 35, 'ID_categoria' => $idComputadoras, 
                'url_image' => '/Imagenes Computadoras/FOTO30.webp', 
                'descripcion' => '<strong>Procesador:</strong> Intel Core i5-1335U<br><strong>RAM:</strong> 8 GB LPDDR4x<br><strong>Almacenamiento:</strong> 512 GB SSD<br><strong>Envío:</strong> $6.000'
            ],

            // --- HELADERAS ---
            [
                'nombre' => 'HELADERA SAMSUNG INVERTER RT38', 'precio' => 1850000, 'stock' => 15, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto1.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 382 Litros<br><strong>No Frost:</strong> Sí<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'HELADERA WHIRLPOOL WRE57', 'precio' => 2150000, 'stock' => 10, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto2.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 443 Litros<br><strong>No Frost:</strong> Sí<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'HELADERA DREAN HDR400F', 'precio' => 1150000, 'stock' => 22, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto3.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 396 Litros<br><strong>No Frost:</strong> No<br><strong>Envío:</strong> $15.000'
            ],
            [
                'nombre' => 'HELADERA LG DOOR-IN-DOOR', 'precio' => 3450000, 'stock' => 5, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto4.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 508 Litros<br><strong>No Frost:</strong> Sí<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'HELADERA GAFA HGF358AW', 'precio' => 890000, 'stock' => 15, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto5.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 282 Litros<br><strong>No Frost:</strong> No<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'HELADERA PHILCO PHCT290', 'precio' => 950000, 'stock' => 8, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto6.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 285 Litros<br><strong>No Frost:</strong> No<br><strong>Envío:</strong> $18.000'
            ],
            [
                'nombre' => 'HELADERA MIDEA MULTIDOOR', 'precio' => 2850000, 'stock' => 70, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto7.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 468 Litros<br><strong>No Frost:</strong> Sí<br><strong>Envío:</strong> $6.000'
            ],
            [
                'nombre' => 'HELADERA PATRICK HPK141', 'precio' => 1050000, 'stock' => 28, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto8.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 364 Litros<br><strong>No Frost:</strong> No<br><strong>Envío:</strong> $9.000'
            ],
            [
                'nombre' => 'HELADERA KOH-I-NOOR KDA4394', 'precio' => 1650000, 'stock' => 18, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto9.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 413 Litros<br><strong>No Frost:</strong> Sí<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'HELADERA ELECTROLUX DF46', 'precio' => 1750000, 'stock' => 12, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto10.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 402 Litros<br><strong>No Frost:</strong> Sí<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'HELADERA BRIKET BK2F', 'precio' => 820000, 'stock' => 8, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto11.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 250 Litros<br><strong>No Frost:</strong> No<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'HELADERA HISENSE SIDE BY SIDE', 'precio' => 2950000, 'stock' => 14, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto12.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 514 Litros<br><strong>No Frost:</strong> Sí<br><strong>Envío:</strong> $12.000'
            ],
            [
                'nombre' => 'HELADERA COLUMBIA CHV3200', 'precio' => 980000, 'stock' => 30, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto13.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 317 Litros<br><strong>No Frost:</strong> No<br><strong>Envío:</strong> $8.000'
            ],
            [
                'nombre' => 'HELADERA BAMBI NF3200', 'precio' => 1250000, 'stock' => 25, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto14.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 320 Litros<br><strong>No Frost:</strong> Sí<br><strong>Envío:</strong> $10.000'
            ],
            [
                'nombre' => 'HELADERA BGH FRENCH DOOR', 'precio' => 3100000, 'stock' => 20, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto15.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 420 Litros<br><strong>No Frost:</strong> Sí<br><strong>Envío:</strong> $9.000'
            ],
            [
                'nombre' => 'HELADERA SAMSUNG BESPOKE', 'precio' => 3800000, 'stock' => 5, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto16.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 328 Litros<br><strong>No Frost:</strong> Sí<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'HELADERA WHIRLPOOL WRM56K', 'precio' => 1950000, 'stock' => 12, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto17.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 462 Litros<br><strong>No Frost:</strong> Sí<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'HELADERA DREAN HDR380', 'precio' => 1050000, 'stock' => 20, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto18.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 360 Litros<br><strong>No Frost:</strong> No<br><strong>Envío:</strong> $12.000'
            ],
            [
                'nombre' => 'HELADERA LG BOTTOM FREEZER', 'precio' => 2400000, 'stock' => 8, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto19.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 395 Litros<br><strong>No Frost:</strong> Sí<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'HELADERA GAFA HGF388B', 'precio' => 920000, 'stock' => 25, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto20.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 330 Litros<br><strong>No Frost:</strong> No<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'HELADERA PHILCO SIDE BY SIDE', 'precio' => 2600000, 'stock' => 6, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto21.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 530 Litros<br><strong>No Frost:</strong> Sí<br><strong>Envío:</strong> $20.000'
            ],
            [
                'nombre' => 'HELADERA SIAM HSI-FT330B', 'precio' => 980000, 'stock' => 35, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto22.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 340 Litros<br><strong>No Frost:</strong> No<br><strong>Envío:</strong> $8.500'
            ],
            [
                'nombre' => 'HELADERA PATRICK HPK135', 'precio' => 850000, 'stock' => 40, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto23.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 277 Litros<br><strong>No Frost:</strong> No<br><strong>Envío:</strong> $9.500'
            ],
            [
                'nombre' => 'HELADERA KOH-I-NOOR KDB4394', 'precio' => 1750000, 'stock' => 14, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto24.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 413 Litros<br><strong>No Frost:</strong> Sí<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'HELADERA ELECTROLUX TF56', 'precio' => 2100000, 'stock' => 9, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto25.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 474 Litros<br><strong>No Frost:</strong> Sí<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'HELADERA HISENSE INVERTER RB400', 'precio' => 1500000, 'stock' => 18, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto26.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 320 Litros<br><strong>No Frost:</strong> Sí<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'HELADERA BOSCH KGN36', 'precio' => 3100000, 'stock' => 4, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto27.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 324 Litros<br><strong>No Frost:</strong> Sí<br><strong>Envío:</strong> $15.000'
            ],
            [
                'nombre' => 'HELADERA NEBA A300', 'precio' => 720000, 'stock' => 45, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto28.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 318 Litros<br><strong>No Frost:</strong> No<br><strong>Envío:</strong> $7.000'
            ],
            [
                'nombre' => 'HELADERA BAMBI 2F1600', 'precio' => 810000, 'stock' => 22, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto29.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 325 Litros<br><strong>No Frost:</strong> No<br><strong>Envío:</strong> $11.000'
            ],
            [
                'nombre' => 'HELADERA BGH MULTIDOOR INVERTER', 'precio' => 2900000, 'stock' => 7, 'ID_categoria' => $idHeladeras, 
                'url_image' => '/imagenes heladeras/foto30.webp', 
                'descripcion' => '<strong>Capacidad:</strong> 480 Litros<br><strong>No Frost:</strong> Sí<br><strong>Envío:</strong> Gratis'
            ],

            // --- LAVARROPAS ---
            [
                'nombre' => 'LAVARROPAS DREAN NEXT 8.14', 'precio' => 850000, 'stock' => 15, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto1.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 8 kg<br><strong>Programas de lavado:</strong> 14<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'LAVARROPAS DREAN CONCEPT NEO FUZZY', 'precio' => 1250000, 'stock' => 10, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto2.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 9.5 kg<br><strong>Programas de lavado:</strong> 22<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'LAVARROPAS WHIRLPOOL CARGA SUPERIOR', 'precio' => 780000, 'stock' => 22, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto3.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 9 kg<br><strong>Programas de lavado:</strong> 10<br><strong>Envío:</strong> $15.000'
            ],
            [
                'nombre' => 'LAVARROPAS LG DIRECT DRIVE', 'precio' => 1450000, 'stock' => 5, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto4.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 10.5 kg<br><strong>Programas de lavado:</strong> 14<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'LAVARROPAS PHILCO AUTOMÁTICO', 'precio' => 690000, 'stock' => 15, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto5.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 7 kg<br><strong>Programas de lavado:</strong> 8<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'LAVARROPAS MIDEA ECO INVERTER', 'precio' => 920000, 'stock' => 8, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto6.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 8 kg<br><strong>Programas de lavado:</strong> 16<br><strong>Envío:</strong> $18.000'
            ],
            [
                'nombre' => 'LAVARROPAS GAFA ACQUARIUS', 'precio' => 550000, 'stock' => 70, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto7.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 6.5 kg<br><strong>Programas de lavado:</strong> 6<br><strong>Envío:</strong> $6.000'
            ],
            [
                'nombre' => 'LAVARROPAS CANDY SMART', 'precio' => 810000, 'stock' => 28, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto8.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 9 kg<br><strong>Programas de lavado:</strong> 15<br><strong>Envío:</strong> $9.000'
            ],
            [
                'nombre' => 'LAVARROPAS LONGVIE PREMIUM', 'precio' => 980000, 'stock' => 18, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto9.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 8 kg<br><strong>Programas de lavado:</strong> 12<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'LAVARROPAS ELECTROLUX PREMIUM PLUS', 'precio' => 1150000, 'stock' => 12, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto10.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 11 kg<br><strong>Programas de lavado:</strong> 10<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'LAVARROPAS AURORA', 'precio' => 620000, 'stock' => 8, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto11.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 6 kg<br><strong>Programas de lavado:</strong> 11<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'LAVARROPAS PATRICK CLÁSICO', 'precio' => 480000, 'stock' => 14, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto12.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 5 kg<br><strong>Programas de lavado:</strong> 7<br><strong>Envío:</strong> $12.000'
            ],
            [
                'nombre' => 'LAVARROPAS BGH CARGA FRONTAL', 'precio' => 720000, 'stock' => 30, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto13.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 7 kg<br><strong>Programas de lavado:</strong> 15<br><strong>Envío:</strong> $8.000'
            ],
            [
                'nombre' => 'LAVARROPAS HISENSE INVERTER', 'precio' => 880000, 'stock' => 25, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto14.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 8.5 kg<br><strong>Programas de lavado:</strong> 16<br><strong>Envío:</strong> $10.000'
            ],
            [
                'nombre' => 'LAVARROPAS KOH-I-NOOR', 'precio' => 950000, 'stock' => 20, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto15.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 7.5 kg<br><strong>Programas de lavado:</strong> 15<br><strong>Envío:</strong> $9.000'
            ],
            [
                'nombre' => 'LAVARROPAS DREAN CONCEPT 5.05', 'precio' => 520000, 'stock' => 45, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto16.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 5 kg<br><strong>Programas de lavado:</strong> 11<br><strong>Envío:</strong> $5.000'
            ],
            [
                'nombre' => 'LAVARROPAS SAMSUNG FRONT LOAD AI CONTROL', 'precio' => 1350000, 'stock' => 12, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto17.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 10 kg<br><strong>Programas de lavado:</strong> 24<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'LAVARROPAS WHIRLPOOL SENSE INVERTER', 'precio' => 890000, 'stock' => 18, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto18.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 8.5 kg<br><strong>Programas de lavado:</strong> 14<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'LAVARROPAS LG THINQ VIVACE', 'precio' => 1150000, 'stock' => 8, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto19.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 9 kg<br><strong>Programas de lavado:</strong> 14<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'LAVARROPAS PHILCO CARGA SUPERIOR', 'precio' => 610000, 'stock' => 25, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto20.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 8 kg<br><strong>Programas de lavado:</strong> 8<br><strong>Envío:</strong> $8.000'
            ],
            [
                'nombre' => 'LAVARROPAS MIDEA CARGA FRONTAL SILVER', 'precio' => 780000, 'stock' => 14, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto21.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 7 kg<br><strong>Programas de lavado:</strong> 15<br><strong>Envío:</strong> $12.000'
            ],
            [
                'nombre' => 'LAVARROPAS GAFA FUZZY LOGIC', 'precio' => 580000, 'stock' => 55, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto22.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 7 kg<br><strong>Programas de lavado:</strong> 4<br><strong>Envío:</strong> $6.500'
            ],
            [
                'nombre' => 'LAVARROPAS CANDY RAPIDO BIANCO', 'precio' => 940000, 'stock' => 20, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto23.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 10 kg<br><strong>Programas de lavado:</strong> 16<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'LAVARROPAS LONGVIE CARGA SUPERIOR L1650', 'precio' => 670000, 'stock' => 32, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto24.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 6.5 kg<br><strong>Programas de lavado:</strong> 10<br><strong>Envío:</strong> $9.500'
            ],
            [
                'nombre' => 'LAVARROPAS ELECTROLUX ESSENTIAL CARE', 'precio' => 840000, 'stock' => 16, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto25.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 8.5 kg<br><strong>Programas de lavado:</strong> 12<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'LAVARROPAS AURORA 6309 CARGA FRONTAL', 'precio' => 595000, 'stock' => 22, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto26.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 6 kg<br><strong>Programas de lavado:</strong> 15<br><strong>Envío:</strong> $7.000'
            ],
            [
                'nombre' => 'LAVARROPAS PATRICK INVERTER LPK10', 'precio' => 870000, 'stock' => 9, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto27.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 10 kg<br><strong>Programas de lavado:</strong> 16<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'LAVARROPAS BGH CARGA SUPERIOR BLANCO', 'precio' => 650000, 'stock' => 28, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto28.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 8 kg<br><strong>Programas de lavado:</strong> 8<br><strong>Envío:</strong> $8.500'
            ],
            [
                'nombre' => 'LAVARROPAS HISENSE TITANIUM FRONT', 'precio' => 810000, 'stock' => 15, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto29.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 8 kg<br><strong>Programas de lavado:</strong> 15<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'LAVARROPAS DREAN NEXT 10.12 ECO', 'precio' => 990000, 'stock' => 11, 'ID_categoria' => $idLavarropas, 
                'url_image' => '/imagenes lavarropas/foto30.webp', 
                'descripcion' => '<strong>Capacidad de lavado:</strong> 10 kg<br><strong>Programas de lavado:</strong> 34<br><strong>Envío:</strong> Gratis'
            ],

            // --- TELÉFONOS ---
            [
                'nombre' => 'SAMSUNG GALAXY S26 ULTRA', 'precio' => 2800000, 'stock' => 15, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO1.webp', 
                'descripcion' => '<strong>Almacenamiento:</strong> 512 GB<br><strong>RAM:</strong> 12 GB<br><strong>Batería:</strong> 5000 mAh<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'APPLE IPHONE 17 PRO MAX', 'precio' => 3100000, 'stock' => 10, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO2.webp', 
                'descripcion' => '<strong>Almacenamiento:</strong> 512 GB<br><strong>RAM:</strong> 8 GB<br><strong>Batería:</strong> 4600 mAh<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'MOTOROLA EDGE 60 ULTRA', 'precio' => 1900000, 'stock' => 22, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO3.webp', 
                'descripcion' => '<strong>Almacenamiento:</strong> 256 GB<br><strong>RAM:</strong> 12 GB<br><strong>Batería:</strong> 4800 mAh<br><strong>Envío:</strong> $15.000'
            ],
            [
                'nombre' => 'SAMSUNG GALAXY Z FOLD 7', 'precio' => 3500000, 'stock' => 5, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO4.webp', 
                'descripcion' => '<strong>Almacenamiento:</strong> 1 TB<br><strong>RAM:</strong> 16 GB<br><strong>Batería:</strong> 4400 mAh<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'APPLE IPHONE 16 PRO', 'precio' => 2100000, 'stock' => 15, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO5.jpg', 
                'descripcion' => '<strong>Almacenamiento:</strong> 128 GB<br><strong>RAM:</strong> 8 GB<br><strong>Batería:</strong> 3300 mAh<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'MOTOROLA RAZR 60 ULTRA', 'precio' => 2100000, 'stock' => 8, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO6.jpg', 
                'descripcion' => '<strong>Almacenamiento:</strong> 512 GB<br><strong>RAM:</strong> 12 GB<br><strong>Batería:</strong> 4000 mAh<br><strong>Envío:</strong> $18.000'
            ],
            [
                'nombre' => 'SAMSUNG GALAXY A26', 'precio' => 450000, 'stock' => 70, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO7.webp', 
                'descripcion' => '<strong>Almacenamiento:</strong> 128 GB<br><strong>RAM:</strong> 6 GB<br><strong>Batería:</strong> 5000 mAh<br><strong>Envío:</strong> $6.000'
            ],
            [
                'nombre' => 'APPLE IPHONE SE4', 'precio' => 1100000, 'stock' => 28, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO8.jfif', 
                'descripcion' => '<strong>Almacenamiento:</strong> 128 GB<br><strong>RAM:</strong> 6 GB<br><strong>Batería:</strong> 3000 mAh<br><strong>Envío:</strong> $9.000'
            ],
            [
                'nombre' => 'XIAOMI 15 PRO', 'precio' => 2100000, 'stock' => 18, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO9.webp', 
                'descripcion' => '<strong>Almacenamiento:</strong> 512 GB<br><strong>RAM:</strong> 16 GB<br><strong>Batería:</strong> 5200 mAh<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'GOOGLE PIXEL 10 PRO', 'precio' => 2300000, 'stock' => 12, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO10.jpg', 
                'descripcion' => '<strong>Almacenamiento:</strong> 256 GB<br><strong>RAM:</strong> 12 GB<br><strong>Batería:</strong> 5050 mAh<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'HUAWEI PURA 80 PRO', 'precio' => 2400000, 'stock' => 8, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO11.webp', 
                'descripcion' => '<strong>Almacenamiento:</strong> 512 GB<br><strong>RAM:</strong> 16 GB<br><strong>Batería:</strong> 5050 mAh<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'OPPO FIND X8 PRO', 'precio' => 2200000, 'stock' => 14, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO12.webp', 
                'descripcion' => '<strong>Almacenamiento:</strong> 512 GB<br><strong>RAM:</strong> 16 GB<br><strong>Batería:</strong> 5000 mAh<br><strong>Envío:</strong> $12.000'
            ],
            [
                'nombre' => 'XIAOMI REDMI NOTE 15 PRO+', 'precio' => 950000, 'stock' => 30, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO13.jfif', 
                'descripcion' => '<strong>Almacenamiento:</strong> 256 GB<br><strong>RAM:</strong> 12 GB<br><strong>Batería:</strong> 5000 mAh<br><strong>Envío:</strong> $8.000'
            ],
            [
                'nombre' => 'GOOGLE PIXEL 10A', 'precio' => 1200000, 'stock' => 25, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO14.webp', 
                'descripcion' => '<strong>Almacenamiento:</strong> 128 GB<br><strong>RAM:</strong> 8 GB<br><strong>Batería:</strong> 4492 mAh<br><strong>Envío:</strong> $10.000'
            ],
            [
                'nombre' => 'OPPO RENO 13 PRO', 'precio' => 1450000, 'stock' => 20, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO15.webp', 
                'descripcion' => '<strong>Almacenamiento:</strong> 256 GB<br><strong>RAM:</strong> 12 GB<br><strong>Batería:</strong> 4600 mAh<br><strong>Envío:</strong> $9.000'
            ],
            [
                'nombre' => 'ONEPLUS 14', 'precio' => 1800000, 'stock' => 12, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO16.jfif', 
                'descripcion' => '<strong>Almacenamiento:</strong> 256 GB<br><strong>RAM:</strong> 12 GB<br><strong>Batería:</strong> 5400 mAh<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'ONEPLUS 14R', 'precio' => 1350000, 'stock' => 18, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO17.jfif', 
                'descripcion' => '<strong>Almacenamiento:</strong> 256 GB<br><strong>RAM:</strong> 12 GB<br><strong>Batería:</strong> 5500 mAh<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'ONEPLUS NORD 5', 'precio' => 950000, 'stock' => 30, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO18.jfif', 
                'descripcion' => '<strong>Almacenamiento:</strong> 256 GB<br><strong>RAM:</strong> 8 GB<br><strong>Batería:</strong> 5000 mAh<br><strong>Envío:</strong> $9.000'
            ],
            [
                'nombre' => 'VIVO X110 PRO', 'precio' => 2150000, 'stock' => 8, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO19.webp', 
                'descripcion' => '<strong>Almacenamiento:</strong> 512 GB<br><strong>RAM:</strong> 16 GB<br><strong>Batería:</strong> 5400 mAh<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'VIVO V40 5G', 'precio' => 850000, 'stock' => 40, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO20.jpeg', 
                'descripcion' => '<strong>Almacenamiento:</strong> 256 GB<br><strong>RAM:</strong> 8 GB<br><strong>Batería:</strong> 5000 mAh<br><strong>Envío:</strong> $8.500'
            ],
            [
                'nombre' => 'VIVO Y300', 'precio' => 450000, 'stock' => 55, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO21.jfif', 
                'descripcion' => '<strong>Almacenamiento:</strong> 128 GB<br><strong>RAM:</strong> 8 GB<br><strong>Batería:</strong> 5000 mAh<br><strong>Envío:</strong> $6.000'
            ],
            [
                'nombre' => 'REALME GT 8 PRO', 'precio' => 1600000, 'stock' => 20, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO22.webp', 
                'descripcion' => '<strong>Almacenamiento:</strong> 256 GB<br><strong>RAM:</strong> 12 GB<br><strong>Batería:</strong> 5400 mAh<br><strong>Envío:</strong> $12.000'
            ],
            [
                'nombre' => 'REALME 14 PRO+', 'precio' => 750000, 'stock' => 28, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO23.jfif', 
                'descripcion' => '<strong>Almacenamiento:</strong> 256 GB<br><strong>RAM:</strong> 8 GB<br><strong>Batería:</strong> 5000 mAh<br><strong>Envío:</strong> $7.500'
            ],
            [
                'nombre' => 'REALME C75', 'precio' => 320000, 'stock' => 75, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO24.webp', 
                'descripcion' => '<strong>Almacenamiento:</strong> 128 GB<br><strong>RAM:</strong> 6 GB<br><strong>Batería:</strong> 5000 mAh<br><strong>Envío:</strong> $5.000'
            ],
            [
                'nombre' => 'TCL 60 NXTPAPER 5G', 'precio' => 650000, 'stock' => 35, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO25.jfif', 
                'descripcion' => '<strong>Almacenamiento:</strong> 256 GB<br><strong>RAM:</strong> 8 GB<br><strong>Batería:</strong> 5010 mAh<br><strong>Envío:</strong> $8.000'
            ],
            [
                'nombre' => 'TCL 60 PRO', 'precio' => 500000, 'stock' => 45, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO26.webp', 
                'descripcion' => '<strong>Almacenamiento:</strong> 256 GB<br><strong>RAM:</strong> 8 GB<br><strong>Batería:</strong> 5000 mAh<br><strong>Envío:</strong> $7.000'
            ],
            [
                'nombre' => 'TCL 60 SE', 'precio' => 350000, 'stock' => 60, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO27.jpg', 
                'descripcion' => '<strong>Almacenamiento:</strong> 128 GB<br><strong>RAM:</strong> 4 GB<br><strong>Batería:</strong> 5010 mAh<br><strong>Envío:</strong> $5.000'
            ],
            [
                'nombre' => 'SAMSUNG GALAXY Z FLIP 7', 'precio' => 1950000, 'stock' => 14, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO28.jfif', 
                'descripcion' => '<strong>Almacenamiento:</strong> 256 GB<br><strong>RAM:</strong> 8 GB<br><strong>Batería:</strong> 3700 mAh<br><strong>Envío:</strong> Gratis'
            ],
            [
                'nombre' => 'APPLE IPHONE 17', 'precio' => 1950000, 'stock' => 25, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO29.jfif', 
                'descripcion' => '<strong>Almacenamiento:</strong> 128 GB<br><strong>RAM:</strong> 8 GB<br><strong>Batería:</strong> 3300 mAh<br><strong>Envío:</strong> $14.000'
            ],
            [
                'nombre' => 'MOTOROLA EDGE 60 PRO', 'precio' => 1450000, 'stock' => 14, 'ID_categoria' => $idTelefonos, 
                'url_image' => '/Imagenes Celulares/FOTO30.webp', 
                'descripcion' => '<strong>Almacenamiento:</strong> 256 GB<br><strong>RAM:</strong> 12 GB<br><strong>Batería:</strong> 4600 mAh<br><strong>Envío:</strong> $10.000'
            ]
        ];

        // Mezclamos el array para que aparezcan en orden aleatorio
        shuffle($productos);

        // Insertamos cada producto en la base de datos
        foreach ($productos as $producto) {
            Producto::create($producto);
        }
    }
}