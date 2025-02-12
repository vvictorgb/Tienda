<?php
namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\LineaPedido;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class PedidoController extends Controller
{
    public function confirmarPedido()
    {

        $idUsuario = auth()->user()->id;


        $response = Http::withToken('Y23PklywnQJGlMNzB0qHkqRNabU0rgECtqqf83q2f75jPMqdHc7w27fLnJqE') // Reemplaza por el token adecuado
                        ->get("http://carrito/api/carrito", [
                            'idUsuario' => $idUsuario
                        ]);

        $carrito = json_decode($response->body(), true);

        // Verificar si el carrito está vacío
        if (empty($carrito)) {
            return redirect()->route('verCarrito')->with('error', 'El carrito está vacío.');
        }

        // Crear un nuevo pedido
        $pedido = Pedido::create([
            'idCliente' => $idUsuario,  // El idCliente es el ID del usuario autenticado
        ]);

        // Insertar las líneas del pedido en la tabla lineaspedidos
        foreach ($carrito as $index => $item) {
            LineaPedido::create([
                'idPedido' => $pedido->id,  // Asignar el idPedido del pedido recién creado
                'numeroLinea' => $index + 1,  // Asignar el número de línea de forma secuencial
                'idProducto' => $item['idProducto'],
                'cantidad' => $item['cantidad'],
            ]);
        }

        // Eliminar los productos del carrito (hacer una solicitud DELETE a la API del carrito)
        $response = Http::withToken('Y23PklywnQJGlMNzB0qHkqRNabU0rgECtqqf83q2f75jPMqdHc7w27fLnJqE')
                        ->delete("http://carrito/api/carrito/{$idUsuario}");

        // Verificar si la eliminación fue exitosa (opcional, dependiendo de la respuesta de la API)
        if ($response->successful()) {
            // Si la eliminación fue exitosa, continuar con la redirección
            return redirect()->route('showPedido', ['idPedido' => $pedido->id]);
        } else {
            // Si hubo un error al eliminar el carrito, redirigir con un mensaje de error
            return redirect()->route('verCarrito')->with('error', 'Hubo un problema al vaciar el carrito.');
        }
    }

    public function showPedido($idPedido)
    {
        // Obtener el pedido junto con sus líneas y productos
        $pedido = Pedido::with('lineaspedidos.producto')->findOrFail($idPedido);

        // Pasar el pedido a la vista para mostrarlo
        return view('confirmarPedido', compact('pedido'));
    }
}
