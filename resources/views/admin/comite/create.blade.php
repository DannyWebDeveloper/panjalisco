@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-offset-2">
                <div class="card card-default">
                    <div class="card-header">
                            Nuevo mienbro de comité
                    </div>

                <div class="card-body">
                    {!! Form::open(['route' => 'admincomite.store', 'files' => true]) !!}

                        @include('admin.comite.partials.form')


                    {!! Form::close() !!}

                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;
