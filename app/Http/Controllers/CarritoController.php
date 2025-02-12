<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Producto;

class CarritoController extends Controller
{
    protected $apiUrl = 'carrito/api/carrito';
    protected $apiToken = 'Y23PklywnQJGlMNzB0qHkqRNabU0rgECtqqf83q2f75jPMqdHc7w27fLnJqE';

    public function index()
    {
        $idUsuario = auth()->id();


        $response = Http::withToken($this->apiToken)->get("$this->apiUrl", [
            'idUsuario' => $idUsuario
        ]);


        if ($response->failed()) {
            return back()->with('error', 'Error al obtener el carrito');
        }

        $carrito = $response->json();


        foreach ($carrito as &$item) {
            $producto = Producto::find($item['idProducto']);
            if ($producto) {
                $item['nombre'] = $producto->nombre;
                $item['precio'] = $producto->precio;
                $item['imagen'] = $producto->imagen;
            }
        }

        return view('carrito', compact('carrito'));
    }


    public function store(Request $request, $idProducto)
    {
        $idUsuario = auth()->id();
        $cantidad = $request->input('cantidad');


        $response = Http::withToken($this->apiToken)->post("$this->apiUrl", [
            'idUsuario' => $idUsuario,
            'idProducto' => $idProducto,
            'cantidad' => $cantidad
        ]);


        if ($response->failed()) {
            return back()->with('error', 'Error al añadir el producto al carrito');
        }


        return redirect()->route('verCarrito');
    }


    public function update(Request $request, $idProducto)
    {
        $idUsuario = auth()->id();
        $cantidad = $request->input('cantidad');


        $response = Http::withToken($this->apiToken)->put("$this->apiUrl/$idUsuario/$idProducto/$cantidad");


        if ($response->failed()) {
            return back()->with('error', 'Error al actualizar el carrito');
        }


        return redirect()->route('verCarrito');
    }


    public function destroy($idProducto)
    {
        $idUsuario = auth()->id();


        $response = Http::withToken($this->apiToken)
            ->delete("$this->apiUrl", [
                'idUsuario' => $idUsuario,
                'idProducto' => $idProducto
            ]);


        if ($response->failed()) {
            return back()->with('error', 'Error al eliminar el producto del carrito');
        }


        return redirect()->route('verCarrito');
    }


    public function destroyAll()
    {
        $idUsuario = auth()->id();


        $response = Http::withToken($this->apiToken)->delete("$this->apiUrl/$idUsuario");


        if ($response->failed()) {
            return back()->with('error', 'Error al vaciar el carrito');
        }


        return back()->with('success', 'Carrito vaciado correctamente');
    }
}
