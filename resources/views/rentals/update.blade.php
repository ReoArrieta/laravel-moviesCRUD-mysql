@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Peliculas') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('rentals/' . $rental->id) }}" autocomplete="off">
                        @method('put')
                        @csrf
                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Fecha inicio') }}</label>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="finicio" value="{{$rental->start_date}}" required autofocus>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-4 col-form-label text-md-right">{{ __('Fecha fin') }}</label>
                            <div class="col-md-6">
                            <input type="date" class="form-control" name="ffin" value="{{$rental->end_date}}" required autofocus>
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