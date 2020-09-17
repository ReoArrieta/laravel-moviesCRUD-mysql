@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('categories.create')}}" class="btn btn-primary">Categorías</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Estado</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($categories as $category)
                            <tr>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->status }}</td>
                                <td>
                                    <a href="{{url('categories/' . $category->id . '/edit')}}" class="btn btn-secondary">
                                        ✎ Editar
                                    </a>
                                </td>
                                <td>
                                    <form action="{{url('categories/' . $category->id)}}" method="post">
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