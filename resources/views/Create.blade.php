<html>
    <head>
        <title>
</title>
<body>
    <p>Hola Mundo Abel</p>
</body>

</head>
</html>

@extends('layouts.app')
@section('title', 'Trainers Create')
@section('content')
            <div clas="form-group">
                <label for="">Nombre</label>
                <input type"text" class="from-control">
            </div>
            <button type="submit" class="btn btn-primary">
            Guardar</button>
@endsection