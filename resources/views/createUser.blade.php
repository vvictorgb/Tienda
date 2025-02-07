@extends('plantilla')

@section('titulo', 'Añadir Usuario')

@section('contenido')
    <h1 class="text-center" style="margin:40px; min-height:110px">Añadir Nuevo Usuario</h1>

    <div class="container" style="max-width: 600px;">
        @error('email')
        <div class="alert alert-danger text-center">{{$message}}</div>
        @enderror
        <form action="{{ route('añadirUsuario') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="role" class="form-label">Rol:</label>
                <select name="role" class="form-control" required>
                    <option value="admin">Admin</option>
                    <option value="client">Client</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success w-100">Guardar Usuario</button>
        </form>
    </div>
@endsection
