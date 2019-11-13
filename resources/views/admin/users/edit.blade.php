@extends('layouts.app')
@section('content')
    <div class="container justity-center">
        <div class="row">
            <div class="col-md-10 col-offset-2">
                <div class="card card-default">
                    <div class="card-header">
                            Editar usuario
                    </div>

                <div class="card-body">
                    {!! Form::model($user, ['route' => ['adminusers.update', $user->id], 'method' => 'PUT']) !!}
                        {{  Form::hidden('id', $user->id)}}
                        @include('admin.users.partials.form')
                    {!! Form::close() !!}

                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;


