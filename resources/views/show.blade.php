@extends('plantilla')
@section('titulo', 'VerDetalle')
@section('contenido')
    <div class="producto-detalle">
        <div class="card">
            <img src="{{ $producto->imagen }}" class="card-img-top" alt="{{ $producto->nombre }}">
            <div class="card-body">
                <h5 class="card-title">{{ $producto->nombre }}</h5>
                <p class="card-text">{{ $producto->descripcion }}</p>
                <p class="card-text"><strong>Precio: </strong>{{ $producto->precio }} €</p>
            </div>
        </div>
    </div>
@endsection
