@extends('trainers.layout')

@section('content')

    <h2 class="mb-4">Registrar entrenador</h2>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST"
          action="{{ route('trainers.store') }}"
          enctype="multipart/form-data">

        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre:</label>

            <input type="text"
                   id="name"
                   name="name"
                   class="form-control"
                   value="{{ old('name') }}"
                   required>
        </div>

        <div class="mb-3">
            <label for="apellido" class="form-label">Apellido:</label>

            <input type="text"
                   id="apellido"
                   name="apellido"
                   class="form-control"
                   value="{{ old('apellido') }}"
                   required>
        </div>

        <div class="mb-3">
            <label for="avatar" class="form-label">Avatar:</label>

            <input type="file"
                   id="avatar"
                   name="avatar"
                   class="form-control"
                   accept="image/*">

            <small class="text-muted">
                Tamaño máximo: 2 MB.
            </small>
        </div>

        <button type="submit" class="btn btn-primary">
            Guardar
        </button>

        <a href="{{ route('trainers.index') }}" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

@endsection