@extends('plantilla')  <!-- Asegúrate de que el nombre del layout sea correcto -->
@section('titulo', 'Confirmar Pedido')
@section('contenido')  <!-- Esto se asegura de que la sección 'content' se inserte en el layout principal -->
    <div class="container">
        <h2>Pedido Confirmado</h2>

        <!-- Mostrar los detalles del pedido -->
        <div class="card">
            <div class="card-header">
                <strong>Pedido ID:</strong> {{ $pedido->id }}
            </div>
            <div class="card-body">
                <h4>Cliente: {{ $pedido->idCliente }}</h4>
                <h5>Fecha de Creación: {{ $pedido->created_at->format('d/m/Y H:i') }}</h5>

                <!-- Mostrar los datos del usuario (como el email) -->
                <h5>Usuario: {{ Auth::user()->email }}</h5>  <!-- Mostramos el email del usuario autenticado -->

                <h3>Detalles del Pedido</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Producto</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Imagen</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedido->lineaspedidos as $linea)
                            <tr>
                                <td>{{ $linea->numeroLinea }}</td>
                                <td>{{ $linea->producto->nombre }}</td>
                                <td>{{ $linea->cantidad }}</td>
                                <td>${{ $linea->producto->precio }}</td>
                                <td>
                                    <img src="{{ $linea->producto->imagen }}" alt="Imagen del producto" style="width: 100px; height: auto;">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <h4>Total: ${{ $pedido->lineaspedidos->sum(function($linea) {
                    return $linea->producto->precio * $linea->cantidad;
                }) }}</h4>
            </div>
        </div>

        <!-- Botón para regresar al listado de productos -->
        <div class="mt-4">
            <a href="{{ route('listadoProductos') }}" class="btn btn-primary">Volver al Listado de Productos</a>
        </div>
    </div>
@endsection
