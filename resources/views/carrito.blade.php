@extends('plantilla')

@section('titulo', 'Carrito')

@section('contenido')

<div class="container my-5">

    <h2 class="text-center">Carrito de Compras</h2>

    {{-- Verificar si el carrito está vacío --}}
    @if(count($carrito) == 0)

        <p class="text-center">Tu carrito está vacío.</p>

        <div class="text-center mt-3" style="min-height: 350px">
            <a href="{{ route('listadoProductos') }}" class="btn btn-primary">Seguir Comprando</a>
        </div>

    @else

        <table class="table table-striped mt-4" style="min-height: 350px">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Imagen</th> {{-- Columna para la imagen --}}
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($carrito as $item)
                    <tr>
                        <td>{{ $item['nombre'] }}</td> {{-- Mostrar el nombre del producto --}}
                        <td>
                            @if(isset($item['imagen']) && $item['imagen'])
                                <img src="{{ $item['imagen'] }}" alt="{{ $item['nombre'] }}" style="width: 50px; height: auto;"> {{-- Mostrar la imagen del producto --}}
                            @else
                                <p>No disponible</p>
                            @endif
                        </td>
                        <td>{{ $item['precio'] }} €</td> {{-- Mostrar el precio del producto --}}
                        <td>
                            <form action="{{ route('actualizarCarrito', ['idProducto' => $item['idProducto']]) }}" method="POST">
                                @csrf
                                <input type="number" name="cantidad" value="{{ $item['cantidad'] }}" min="1" class="form-control" required>
                                <button type="submit" class="btn btn-warning mt-2">Actualizar</button>
                            </form>

                        </td>
                        <td>{{ $item['precio'] * $item['cantidad'] }} €</td> {{-- Calcular el total --}}
                        <td>
                            <form action="{{ route('eliminarProductoCarrito', ['idProducto' => $item['idProducto']]) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="text-center mt-4">
            <a href="{{ route('confirmarPedido') }}" class="btn btn-success">Confirmar Pedido</a>
            <a href="{{ route('listadoProductos') }}" class="btn btn-primary">Seguir Comprando</a>
        </div>

    @endif

</div>

@endsection
