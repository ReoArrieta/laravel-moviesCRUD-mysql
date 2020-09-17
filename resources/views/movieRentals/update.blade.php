@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Película Rentas') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('movieRentals/' . $movieRental->id) }}" autocomplete="off">
                        @method('put')
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Películas') }}</label>
                            <div class="col-md-6">
                                <select name="movie" class="form-control">
                                    @foreach ($movies as $movie)
                                    <option value="{{$movie->id}}">{{$movie->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Observación') }}</label>
                            <div class="col-md-6">
                            <textarea type="text" class="form-control" name="obs" required autofocus>{{$movieRental->observations}}</textarea>
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