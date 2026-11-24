@extends('layouts.app')

@section('title', 'Registro')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">

        <h1>Crear cuenta</h1>

        <form method="POST" action="/register">

            @csrf

            <div class="mb-3">
                <label class="form-label">Nombre</label>

                <input
                    type="text"
                    name="name"
                    class="form-control"
                    value="{{ old('name') }}"
                    required
                >
            </div>

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

            <div class="mb-3">
                <label class="form-label">Confirmar contraseña</label>

                <input
                    type="password"
                    name="password_confirmation"
                    class="form-control"
                    required
                >
            </div>

            <button type="submit" class="btn btn-primary">
                Registrarse
            </button>

        </form>

        <p class="mt-3">
            ¿Ya tienes cuenta?
            <a href="/login">Iniciar sesión</a>
        </p>

    </div>
</div>

@endsection