@extends('layouts.app')

@section('content')
    <div class="contaniner">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                            Crear Noticia
                    </div>

                <div class="card-body">
                    {!! Form::open(['route' => 'adminnoticias.store', 'files' => true]) !!}

                        @include('admin.noticias.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;
