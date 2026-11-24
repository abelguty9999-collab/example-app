@extends('trainers.layout')

@section('content')

    <div class="card p-4 text-center">

        @if($trainer->avatar)

            <img src="{{ asset('storage/' . $trainer->avatar) }}"
                 class="rounded-circle mx-auto mb-3"
                 style="width:150px; height:150px; object-fit:cover;"
                 alt="{{ $trainer->name }}">

        @endif

        <h3>{{ $trainer->name }} {{ $trainer->apellido }}</h3>

        <p>
            Fecha de registro: {{ $trainer->created_at }}
        </p>

        <div>

            <a href="{{ route('trainers.edit', $trainer) }}"
               class="btn btn-warning">
                Editar
            </a>

            <a href="{{ route('trainers.index') }}"
               class="btn btn-secondary">
                Volver
            </a>

        </div>

    </div>

@endsection