@extends('trainers.layout')

@section('content')

    <h2 class="mb-4">Editar entrenador</h2>

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
          action="{{ route('trainers.update', $trainer) }}"
          enctype="multipart/form-data">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Nombre:</label>

            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ old('name', $trainer->name) }}"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Apellido:</label>

            <input type="text"
                   name="apellido"
                   class="form-control"
                   value="{{ old('apellido', $trainer->apellido) }}"
                   required>
        </div>

        @if($trainer->avatar)
            <img src="{{ asset('storage/' . $trainer->avatar) }}"
                 class="rounded-circle mb-3"
                 style="width:100px; height:100px; object-fit:cover;"
                 alt="Avatar actual">
        @endif

        <div class="mb-3">
            <label class="form-label">Nueva fotografía:</label>

            <input type="file"
                   name="avatar"
                   class="form-control"
                   accept="image/*">

            <small class="text-muted">
                Deja vacío este campo para conservar la fotografía actual.
            </small>
        </div>

        <button type="submit" class="btn btn-success">
            Actualizar
        </button>

        <a href="{{ route('trainers.index') }}" class="btn btn-secondary">
            Cancelar
        </a>

    </form>

@endsection