@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card card-default">
                    <div class="card-header">
                            Crear Menu
                    </div>

                <div class="card-body">
                    {!! Form::open(['route' => 'adminmenus.store']) !!}

                        @include('admin.menus.partials.form')


                    {!! Form::close() !!}

                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;
