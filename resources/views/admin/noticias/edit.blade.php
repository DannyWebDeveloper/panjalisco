
@extends('layouts.app')

@section('content')
    <div class="contaniner">
        <div class="row">
            <div class="col-md-8 col-offset-2">
                <div class="card card-default">
                    <div class="card-header">
                            Editar Noticia
                    </div>

                <div class="card-body">
                    {!! Form::model($noticia, ['route' => ['adminnoticias.update', $noticia->id], 'method' => 'PUT', 'files' => true]) !!}
                        {{  Form::hidden('id', $noticia->id)}}

                        @include('admin.noticias.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;
