@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                            Crear Página
                    </div>

                <div class="card-body">
                    {!! Form::open(['route' => 'adminpaginas.store', 'files' => true]) !!}

                        @include('admin.paginas.partials.form')


                    {!! Form::close() !!}

                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;
