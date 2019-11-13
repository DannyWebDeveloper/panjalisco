@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-offset-2">
                <div class="card card-default">
                    <div class="card-header">
                            Nuevo usuario
                    </div>

                <div class="card-body">
                    {!! Form::open(['route' => 'adminusers.store']) !!}

                        @include('admin.users.partials.form')

                    {!! Form::close() !!}
                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;
