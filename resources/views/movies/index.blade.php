@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('movies.create')}}" class="btn btn-primary">Movies</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Usuario</th>
                                <th>Estado</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($movies as $movie)
                            <tr>
                                <td>{{ $movie->name }}</td>
                                <td>{{ $movie->description }}</td>
                                <td>{{ $movie->user }}</td>
                                <td>{{ $movie->status }}</td>
                                <td>
                                    <a href="{{url('movies/' . $movie->id . '/edit')}}" class="btn btn-secondary">
                                        ✎ Editar
                                    </a>
                                </td>
                                <td>
                                    <form action="{{url('movies/' . $movie->id)}}" method="post">
                                        @method('delete')
                                        @csrf
                                        <input type="submit" class="btn btn-danger" value="🗑 Eliminar">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                </div>
            </div>
        </div>
    </div>
</div>
</div>

@endsection