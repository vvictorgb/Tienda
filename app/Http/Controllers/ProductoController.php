<?php
namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     *
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $productos = Producto::all();
        return view('productos', compact('productos'));
    }


    public function show($id)
{

    $producto = Producto::findOrFail($id);


    return view('show', compact('producto'));
}
}
