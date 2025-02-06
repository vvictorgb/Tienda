@extends('plantilla')

@section('titulo', 'Listado de Usuarios')

@section('contenido')


    <div class="d-flex justify-content-around align-items-center mb-4" style="padding: 20px;">
        <h1>Listado de Usuarios</h1>


        <form action="{{ route('users.create') }}" method="GET">
            @csrf
            <button type="submit" class="btn btn-success" style="padding: 10px 20px; font-size: 18px; border-radius: 5px;">
                Añadir Usuario
            </button>
        </form>
    </div>

    <div class="table-responsive" style="max-width: 80%; margin: auto;">
        <table class="table table-striped text-center align-middle" style="min-height: 400px; width: 100%; border-collapse: collapse;">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Contraseña</th>
                    <th>Rol</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->password }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">

                                <form action="{{ route('editarUsuario', $user->id) }}" method="GET">
                                    @csrf
                                    <button type="submit" class="btn btn-warning" style="padding: 10px 20px; font-size: 18px; width: 150px; text-align: center; height:60px;">
                                        Editar
                                    </button>
                                </form>


                                <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de eliminar este usuario?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" style="padding: 10px 20px; font-size: 18px; width: 150px; text-align: center; height:60px;">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
