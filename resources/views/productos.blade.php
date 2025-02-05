@extends('plantilla')
@section('titulo', 'ListaProductos')
@section('contenido')

    <div class="contenedorFotos" style="position: relative; left: 45px">
        <div class="row column-gap-3">
            @foreach($productos as $producto)

            <div class="card espacioCard col-md-3" style="width: 25rem; min-height: 600px">

                <img src="{{ $producto->imagen }}" class="card-img-top" style="height: 400px; object-fit: cover;" alt="{{ $producto->nombre }}">

                <div class="card-body text-center">
                    <div class="encabezadoCard">

                        <h5 class="card-nombre">{{ $producto->nombre }}</h5>

                        <h5 class="precio">{{ $producto->precio }} €</h5>
                    </div>


                    <p class="card-descripcion">{{ $producto->descripcion }}</p>


                    <a href="productos/{{$producto->id}}" class="btn btn-primary sombraInfo">Más información</a>
                </div>
            </div>

            @endforeach
        </div>
    </div>
@endsection





