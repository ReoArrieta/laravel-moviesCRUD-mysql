@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    <a href="#" class="btn btn-primary">Usuarios</a>
                </div>

                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    <a href="{{url('users/' . $user->id . '/edit')}}" class="btn btn-secondary">
                                        ✎ Editar
                                    </a>
                                </td>
                                <td>
                                    <form action="{{url('users/' . $user->id)}}" method="post">
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