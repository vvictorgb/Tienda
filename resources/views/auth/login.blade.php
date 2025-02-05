@extends('plantilla')

@section('titulo', 'Login')

@section('contenido')
<div class="container d-flex justify-content-center align-items-center">
    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%; margin-top: 70px;">
        <h2 class="text-center mb-4">Login</h2>

        @if (!empty($error))
        <div class="alert alert-danger text-center">
            {{ $error }}
        </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group mb-3">
                <label for="email" class="form-label">Login:</label>
                <input type="text" class="form-control" name="email" id="login" placeholder="Introduce tu email">
            </div>

            <div class="form-group mb-3">
                <label for="password" class="form-label">Password:</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Introduce tu contraseña">
            </div>

            <button type="submit" class="btn btn-dark w-100">Enviar</button>
        </form>
    </div>
</div>
@endsection
