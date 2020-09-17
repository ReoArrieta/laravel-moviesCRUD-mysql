<!doctype html>
<html lang="es-co">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootswatch/4.5.2/darkly/bootstrap.min.css">
    <title>Películas</title>
</head>

<body>

    <h3>Un reporte de todas las películas</h3>

    <div class="card-body">
        <table class="table">
            <thead class="thead-light">
                <tr>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Usuario</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($movies as $movie)
                <tr>
                    <td>{{ $movie->name }}</td>
                    <td>{{ $movie->description }}</td>
                    <td>{{ $movie->user }}</td>
                    <td>{{ $movie->status }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>