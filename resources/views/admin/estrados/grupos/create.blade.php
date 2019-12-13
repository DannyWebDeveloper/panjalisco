@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                            Agregar grupo de estrado
                    </div>

                <div class="card-body">
                    {!! Form::open(['route' => 'grupoEstradoPost', 'files' => true]) !!}

                        @include('admin.estrados.grupos.partials.form')


                    {!! Form::close() !!}

                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;
