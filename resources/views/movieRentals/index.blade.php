@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('movieRentals.create')}}" class="btn btn-primary">Película Rentas</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>id</th>
                                <th>Pelicula</th>
                                <th>observacion</th>
                                <th>precio</th>
                                <th>fecha inicio</th>
                                <th>editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($movieRentals as $rental)
                            <tr>
                                <td>{{ $rental->id }}</td>
                                <td>{{ $rental->movie }}</td>
                                <td>{{ $rental->observations }}</td>
                                <td>{{ $rental->price }}</td>
                                <td>{{ $rental->rental }}</td>
                                <td>
                                    <a href="{{url('movieRentals/' . $rental->id . '/edit')}}" class="btn btn-secondary">
                                    ✎ Editar
                                    </a>
                                </td>
                                <td>
                                    <form action="{{url('movieRentals/' . $rental->id)}}" method="post">
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