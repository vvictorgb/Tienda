@extends('plantilla')
@section('titulo', 'ListaProductos')
@section('contenido')

    <div class="contenedorFotos">
        <div class="row">
            @foreach($productos as $producto)
                <div class="col-md-3">
                    <div class="card espacioCard">
                        <!-- Imagen (usando el enlace de la propiedad 'imagen') -->
                        <img src="{{ $producto->imagen }}" class="card-img-top" alt="{{ $producto->nombre }}">

                        <div class="card-body">
                            <div class="encabezadoCard">
                                <!-- Nombre del Producto -->
                                <h5 class="card-nombre">{{ $producto->nombre }}</h5>
                                <!-- Precio -->
                                <h5 class="precio">{{ $producto->precio }} €</h5>
                            </div>

                            <!-- Descripción -->
                            <p class="card-descripcion">{{ $producto->descripcion }}</p>

                            <!-- Enlace de detalle -->
                            <a href="" class="btn btn-primary sombraInfo">Más información</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection





