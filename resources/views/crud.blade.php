


@extends('plantilla')

@section('titulo', 'Listado de Usuarios')

@section('contenido')
    <h1 style="margin:40px">Listado de Usuarios</h1>
    <table class="table table-striped" style="min-height: 400px">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>

                    <td>{{ $user->email }}</td>
                    <td>{{ $user->passwordSinEncriptar }}</td>
                    <td>
                        <div style="position: relative; right:32px; top: 60px">
                        <a href="#" class="btn btn-warning">Editar</a>
                        <a href="#" class="btn btn-danger">Eliminar</a>
                    </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection




