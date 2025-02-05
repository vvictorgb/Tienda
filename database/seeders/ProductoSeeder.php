<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run()
    {

                $producto = new Producto();
                $producto->nombre = 'Camiseta de Algodón';
                $producto->descripcion = 'Camiseta de algodón suave y cómodo.';
                $producto->precio = 19.99;
                $producto->imagen = 'https://static.nike.com/a/images/t_PDP_936_v1/f_auto,q_auto:eco/aa384510-0cb2-483b-a2e3-90e4af5755f2/CA+WNSW+CLUB+FLC+STD+PO+HDY+3R.png';
                $producto->save();


                $producto = new Producto();
                $producto->nombre = 'Jeans Denim';
                $producto->descripcion = 'Jeans de corte clásico.';
                $producto->precio = 49.99;
                $producto->imagen = 'https://www.vestuariolaboral.com/56487-thickbox_default/sudadera-hombre-con-cremallera-russell-284m.jpg';
                $producto->save();


                $producto = new Producto();
                $producto->nombre = 'Chaqueta de Cuero';
                $producto->descripcion = 'Chaqueta de cuero elegante.';
                $producto->precio = 89.99;
                $producto->imagen = 'https://www.alvaromoreno.com/dw/image/v2/BGHK_PRD/on/demandware.static/-/Sites-amoreno_master_catalog/default/dwe9c77bfa/images/hi-res/I24/Hombre/Sudaderas/Sudadera_Time_2520224052/ROS/2520224052_ROS_1.jpg?sw=965&sh=1287';
                $producto->save();


                $producto = new Producto();
                $producto->nombre = 'Zapatillas Deportivas';
                $producto->descripcion = 'Zapatillas cómodas y ligeras para hacer.';
                $producto->precio = 59.99;
                $producto->imagen = 'https://scalperscompany.com/cdn/shop/files/25240-GREYMELANGE-P-1.jpg?height=1500&v=1727345181';
                $producto->save();


                $producto = new Producto();
                $producto->nombre = 'Gorra de Beisbol';
                $producto->descripcion = 'Gorra de beisbol de estilo casual, perfecta para el sol.';
                $producto->precio = 15.99;
                $producto->imagen = 'https://img01.ztat.net/article/spp-media-p1/7698cec10fbe4d3eadcbae390db490fb/8e6fcd4592fd4c3fab8596bc708d477c.jpg?imwidth=1800';
                $producto->save();
    }
}
