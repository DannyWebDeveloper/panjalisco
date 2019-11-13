@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-offset-2">
                <div class="card card-default">
                    <div class="card-header">
                            Nuevo Extrado
                    </div>

                <div class="card-body">
                    {!! Form::open(['route' => 'adminextrados.store', 'files' => true]) !!}

                        @include('admin.extrados.partials.form')


                    {!! Form::close() !!}

                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;
