@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                       Crear Articulo
                    </div>

                    <div class="card-body">
                    {!! Form::open(['route' => 'articuloCreate', 'files' => true]) !!}

                    {{  Form::hidden('id_user', auth()->user()->id)}}
                    <div class="form-group">
                    {{ Form::label('Numero', 'Número') }}
                    {{ Form::text('Numero', '', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                    {{ Form::label('titulo', 'Titulo') }}
                    {{ Form::text('Titulo', '', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                    {{ Form::label('Texto', 'Texto') }}
                    {{ Form::text('Texto', '', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                    {{ Form::label('Visible', 'Visibilidad') }}
                    {!! Form::select('Visible',['1' => 'Visible','0'=>'No visible'],'',['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
                    </div>
                    <div class="form-group">
                    {{ Form::label('Orden', 'Orden') }}
                    {{ Form::text('Orden', '', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group text-right">
                        {{ Form::submit('Guardar', ['class' => 'btn btn-bg btn-primary']) }}
                    </div>


                    {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
