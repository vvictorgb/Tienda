@extends('plantilla')

@section('titulo', 'Editar Usuario')

@section('contenido')
    <h1 class="text-center" style="margin:40px">Editar Usuario</h1>
    @error('email')
    <div class="alert alert-danger text-center" style="width:580px; margin:10px auto; ">{{$message}}</div>
    @enderror
    <div class="container" style="max-width: 600px;">
        <form action="{{ route('modificar', $user->id) }}" method="POST">
            @csrf
            @method('PUT')


            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>


            <div class="mb-3">
                <label for="password" class="form-label">Contraseña:</label>
                <input type="password" name="password" class="form-control">

            </div>


            <div class="mb-3">
                <label for="role" class="form-label">Rol:</label>
                <select name="role" class="form-control" required>
                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                    <option value="client" {{ $user->role == 'client' ? 'selected' : '' }}>Cliente</option>
                </select>
            </div>

            <button type="submit" class="btn btn-success w-100">Guardar Cambios</button>
        </form>
    </div>
@endsection
