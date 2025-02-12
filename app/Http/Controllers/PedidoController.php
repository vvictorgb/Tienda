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


        $response = Http::withToken('Y23PklywnQJGlMNzB0qHkqRNabU0rgECtqqf83q2f75jPMqdHc7w27fLnJqE')
                        ->get("http://carrito/api/carrito", [
                            'idUsuario' => $idUsuario
                        ]);

        $carrito = json_decode($response->body(), true);


        if (empty($carrito)) {
            return redirect()->route('verCarrito')->with('error', 'El carrito está vacío.');
        }


        $pedido = Pedido::create([
            'idCliente' => $idUsuario,
        ]);


        foreach ($carrito as $index => $item) {
            LineaPedido::create([
                'idPedido' => $pedido->id,
                'numeroLinea' => $index + 1,
                'idProducto' => $item['idProducto'],
                'cantidad' => $item['cantidad'],
            ]);
        }


        $response = Http::withToken('Y23PklywnQJGlMNzB0qHkqRNabU0rgECtqqf83q2f75jPMqdHc7w27fLnJqE')
                        ->delete("http://carrito/api/carrito/{$idUsuario}");


        if ($response->successful()) {

            return redirect()->route('showPedido', ['idPedido' => $pedido->id]);
        } else {

            return redirect()->route('verCarrito')->with('error', 'Hubo un problema al vaciar el carrito.');
        }
    }

    public function showPedido($idPedido)
    {

        $pedido = Pedido::with('lineaspedidos.producto')->findOrFail($idPedido);


        return view('confirmarPedido', compact('pedido'));
    }
}
