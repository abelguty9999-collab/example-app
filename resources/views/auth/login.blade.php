@extends('layouts.app')

@section('title', 'Iniciar sesión')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">

        <h1>Iniciar sesión</h1>

        @if ($errors->any())
            <div class="alert alert-danger">
                {{ $errors->first() }}
            </div>
        @endif

        <form method="POST" action="/login">

            @csrf

            <div class="mb-3">
                <label class="form-label">Correo electrónico</label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    value="{{ old('email') }}"
                    required
                >
            </div>

            <div class="mb-3">
                <label class="form-label">Contraseña</label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary">
                Iniciar sesión
            </button>

        </form>

        <p class="mt-3">
            ¿No tienes cuenta?
            <a href="/register">Registrarse</a>
        </p>

    </div>
</div>

@endsection