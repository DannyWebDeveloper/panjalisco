@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                            Agregar sub-categoria
                    </div>

                <div class="card-body">
                    {!! Form::open(['route' => 'subcategoriaEstradoPost', 'files' => true]) !!}

                        @include('admin.estrados.subcategorias.partials.form')


                    {!! Form::close() !!}

                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;
