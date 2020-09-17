@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('categoryMovies.create')}}" class="btn btn-primary">Categoría Peliculas</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Pelicula</th>
                                <th>Categoría</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categoryMovies as $categoryMovie)
                            <tr>
                                <td>{{ $categoryMovie->movie }}</td>
                                <td>{{ $categoryMovie->category }}</td>
                                <td>
                                    <a href="{{url('categoryMovies/' . $categoryMovie->id . '/edit')}}" class="btn btn-secondary">
                                        ✎ Editar
                                    </a>
                                </td>
                                <td>
                                    <form action="{{url('categoryMovies/' . $categoryMovie->id)}}" method="post">
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