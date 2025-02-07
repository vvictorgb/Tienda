@extends('plantilla')

@section('titulo', 'VerDetalle')

@section('contenido')
<div class="container my-5">
    <div class="row">
        <div class="col-md-6">
            <img src="{{ $producto->imagen }}" class="img-fluid" alt="{{ $producto->nombre }}" style="object-fit: cover; height: 700px; width: 100%;">
        </div>
        <div class="col-md-6 text-center" style="display: flex; justify-content:center; align-items:center; flex-direction:column; position: relative; left:30px">
            <h2 class="display-4">{{ $producto->nombre }}</h2>
            <p class="lead">{{ $producto->descripcion }}</p>
            <h3 class="text-success">{{ $producto->precio }} €</h3>

            <form action="{{ route('agregarCarrito', ['idProducto' => $producto->id]) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="cantidad" class="form-label">Cantidad</label>
                    <input type="number" id="cantidad" name="cantidad" class="form-control" min="1" value="1">
                </div>

                <div class="mt-4">
                    <a href="{{ route('listadoProductos') }}" class="btn btn-secondary">Volver al listado</a>
                    <button type="submit" class="btn btn-primary">Añadir al carrito</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
