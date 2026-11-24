
@extends('trainers.layout')

@section('content')

    <h2 class="mb-4">Entrenadores</h2>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <!-- Botones principales -->
    <div class="d-flex flex-wrap gap-2 mb-4">

        <a href="{{ route('trainers.create') }}"
           class="btn btn-primary">
            Crear Trainer
        </a>

        <a href="{{ route('trainers.pdf') }}"
           class="btn btn-danger">
            Exportar a PDF
        </a>

        <a href="{{ route('trainers.excel') }}"
           class="btn btn-success">
            Exportar a Excel
        </a>

    </div>

    <!-- Buscador -->
    <form action="{{ route('trainers.index') }}"
          method="GET"
          class="mb-4">

        <div class="input-group">

            <input type="text"
                   name="buscar"
                   class="form-control"
                   placeholder="Buscar por nombre o apellido"
                   value="{{ request('buscar') }}">

            <button type="submit" class="btn btn-primary">
                Buscar
            </button>

            <a href="{{ route('trainers.index') }}"
               class="btn btn-secondary">
                Limpiar
            </a>

        </div>

    </form>

    
    <p class="text-muted">
        Total de entrenadores encontrados: {{ $trainers->total() }}
    </p>

    <!-- Tarjetas de entrenadores -->
    <div class="row g-4">

        @forelse($trainers as $trainer)

            <div class="col-md-4">

                <div class="card text-center h-100">

                    <div class="card-body">

                        @if($trainer->avatar)

                            <img src="{{ asset('storage/' . $trainer->avatar) }}"
                                 class="rounded-circle mx-auto d-block mb-3"
                                 style="width:100px; height:100px; object-fit:cover;"
                                 alt="{{ $trainer->name }}">

                        @else

                            <div class="rounded-circle bg-secondary-subtle mx-auto mb-3"
                                 style="width:100px; height:100px;">
                            </div>

                        @endif

                        <h5 class="card-title">
                            {{ $trainer->name }}
                        </h5>

                        <p class="card-text text-muted">
                            {{ $trainer->apellido }}
                        </p>

                        <div class="d-flex justify-content-center gap-2">

                            <a href="{{ route('trainers.show', $trainer) }}"
                               class="btn btn-primary btn-sm">
                                Ver más...
                            </a>

                            <a href="{{ route('trainers.edit', $trainer) }}"
                               class="btn btn-warning btn-sm">
                                Editar
                            </a>

                            <form method="POST"
                                  action="{{ route('trainers.destroy', $trainer) }}"
                                  onsubmit="return confirm('¿Deseas eliminar este entrenador?');">

                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-danger btn-sm">
                                    Eliminar
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        @empty

            <div class="col-12">

                <div class="alert alert-warning">
                    No se encontraron entrenadores.
                </div>

            </div>

        @endforelse

    </div>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $trainers->links() }}
    </div>

@endsection
