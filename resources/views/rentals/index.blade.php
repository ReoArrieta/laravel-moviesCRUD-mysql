@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('rentals.create')}}" class="btn btn-primary">Rentas</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Dia de inicio</th>
                                <th>Dia fin</th>
                                <th>total</th>
                                <th>usuario</th>
                                <th>Estado</th>
                                <th>editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rentals as $rental)
                            <tr>
                                <td>{{ $rental->inicio }}</td>
                                <td>{{ $rental->fin }}</td>
                                <td>{{ $rental->total }}</td>
                                <td>{{ $rental->user }}</td>
                                <td>{{ $rental->estatus }}</td>
                                <td>
                                    <a href="{{url('rentals/' . $rental->id . '/edit')}}" class="btn btn-secondary">
                                    ✎ Editar
                                    </a>
                                </td>
                                <td>
                                    <form action="{{url('rentals/' . $rental->id)}}" method="post">
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