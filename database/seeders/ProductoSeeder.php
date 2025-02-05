<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run()
    {
                // Producto 1
                $producto = new Producto();
                $producto->nombre = 'Camiseta de Algodón';
                $producto->descripcion = 'Camiseta de algodón suave y cómodo, ideal para el día a día.';
                $producto->precio = 19.99;
                $producto->imagen = 'camiseta-algodon.jpg';
                $producto->save();

                // Producto 2
                $producto = new Producto();
                $producto->nombre = 'Jeans Denim';
                $producto->descripcion = 'Jeans de corte clásico, ideales para cualquier ocasión.';
                $producto->precio = 49.99;
                $producto->imagen = 'jeans-denim.jpg';
                $producto->save();

                // Producto 3
                $producto = new Producto();
                $producto->nombre = 'Chaqueta de Cuero';
                $producto->descripcion = 'Chaqueta de cuero elegante para una salida nocturna.';
                $producto->precio = 89.99;
                $producto->imagen = 'chaqueta-cuero.jpg';
                $producto->save();

                // Producto 4
                $producto = new Producto();
                $producto->nombre = 'Zapatillas Deportivas';
                $producto->descripcion = 'Zapatillas cómodas y ligeras para hacer deporte o para un look casual.';
                $producto->precio = 59.99;
                $producto->imagen = 'zapatillas-deportivas.jpg';
                $producto->save();

                // Producto 5
                $producto = new Producto();
                $producto->nombre = 'Gorra de Beisbol';
                $producto->descripcion = 'Gorra de beisbol de estilo casual, perfecta para el sol.';
                $producto->precio = 15.99;
                $producto->imagen = 'gorra-beisbol.jpg';
                $producto->save();
    }
}
