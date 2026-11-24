<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trainers</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-expand bg-white shadow-sm mb-4">
        <div class="container">

            <a class="navbar-brand" href="{{ route('trainers.index') }}">
                Laravel
            </a>

            <div class="navbar-nav ms-auto">

                <a class="nav-link" href="{{ route('trainers.index') }}">
                    Trainers
                </a>

                <a class="nav-link" href="{{ route('trainers.create') }}">
                    Nuevo
                </a>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button class="btn btn-outline-danger" type="submit">
                        Cerrar sesión
                    </button>
                </form>

            </div>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

</body>
</html>