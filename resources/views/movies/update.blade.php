@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Peliculas') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('movies/' . $movie->id) }}" autocomplete="off">
                        @method('put')
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{$movie->name}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Descripción') }}</label>
                            <div class="col-md-6">
                                <textarea name="description" rows="5" class="form-control">{{$movie->description}}</textarea>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Estados') }}</label>
                            <div class="col-md-6">
                                <select name="status_id" class="form-control">
                                    @foreach ($statuses as $status)
                                    <option value="{{$status->id}}">{{$status->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Actualizar') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection