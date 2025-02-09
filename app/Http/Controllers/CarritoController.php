<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Producto; // Asegúrate de tener el modelo Producto si lo necesitas

class CarritoController extends Controller
{
    protected $apiUrl = 'carrito/api/carrito';  // Cambia esta URL al URL real de tu API
    protected $apiToken = 'Y23PklywnQJGlMNzB0qHkqRNabU0rgECtqqf83q2f75jPMqdHc7w27fLnJqE';  // Cambia esto por tu token real

    public function index()
    {
        $idUsuario = auth()->id(); // Obtener el id del usuario autenticado

        // Realizar la petición para obtener los datos del carrito del API
        $response = Http::withToken($this->apiToken)->get("$this->apiUrl", [
            'idUsuario' => $idUsuario
        ]);

        // Verificar si la solicitud ha fallado
        if ($response->failed()) {
            return back()->with('error', 'Error al obtener el carrito');
        }

        $carrito = $response->json(); // Obtener los datos del carrito

        // Obtener los detalles de cada producto utilizando el idProducto
        foreach ($carrito as &$item) {
            $producto = Producto::find($item['idProducto']); // Buscar el producto por idProducto
            if ($producto) {
                $item['nombre'] = $producto->nombre; // Añadir el nombre del producto
                $item['precio'] = $producto->precio; // Añadir el precio del producto
                $item['imagen'] = $producto->imagen; // Añadir el precio del producto
            }
        }

        return view('carrito', compact('carrito')); // Pasar el carrito a la vista
    }

    // Añadir producto al carrito
    public function store(Request $request, $idProducto)
    {
        $idUsuario = auth()->id();
        $cantidad = $request->input('cantidad');

        // Realizar la petición para añadir el producto al carrito
        $response = Http::withToken($this->apiToken)->post("$this->apiUrl", [
            'idUsuario' => $idUsuario,
            'idProducto' => $idProducto,
            'cantidad' => $cantidad
        ]);

        // Si la petición falla, devolver un error
        if ($response->failed()) {
            return back()->with('error', 'Error al añadir el producto al carrito');
        }

        // Redirigir con un mensaje de éxito
        return redirect()->route('verCarrito');
    }

    // Actualizar cantidad del producto en el carrito
    public function update(Request $request, $idProducto)
    {
        $idUsuario = auth()->id();
        $cantidad = $request->input('cantidad');

        // Realizar la petición para actualizar la cantidad del producto en el carrito
        $response = Http::withToken($this->apiToken)->put("$this->apiUrl/$idUsuario/$idProducto/$cantidad");

        // Si la petición falla, devolver un error
        if ($response->failed()) {
            return back()->with('error', 'Error al actualizar el carrito');
        }

        // Redirigir con un mensaje de éxito
        return redirect()->route('verCarrito');
    }

    // Eliminar un producto del carrito
    public function destroy($idProducto)
    {
        $idUsuario = auth()->id();

        // Realiza la petición para eliminar un producto del carrito
        $response = Http::withToken($this->apiToken)
            ->delete("$this->apiUrl", [
                'idUsuario' => $idUsuario,
                'idProducto' => $idProducto
            ]);

        // Si la petición falla, devuelve un error
        if ($response->failed()) {
            return back()->with('error', 'Error al eliminar el producto del carrito');
        }

        // Redirige a la misma página de carrito
        return redirect()->route('verCarrito');
    }

    // Vaciar todo el carrito
    public function destroyAll()
    {
        $idUsuario = auth()->id();

        // Realizar la petición para vaciar el carrito
        $response = Http::withToken($this->apiToken)->delete("$this->apiUrl/$idUsuario");

        // Si la petición falla, devolver un error
        if ($response->failed()) {
            return back()->with('error', 'Error al vaciar el carrito');
        }

        // Redirigir con un mensaje de éxito
        return back()->with('success', 'Carrito vaciado correctamente');
    }
}
