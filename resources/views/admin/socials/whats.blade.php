<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                        Link's Sociales
                    </div>

                <div class="card-body">
                    <div class="col-sm-6">
                        <h2>WhatsApp</h2>
                        {!! Form::open(['route' => ['update-whatsapp'], 'method' => 'POST']) !!}
                        <div class="form-group">
                            {{ Form::label('numero', 'Número de WhatsApp') }}
                            {{ Form::text('numero', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('msg', 'Texto inical en el chat') }}
                            {{ Form::textarea('msg', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                                {{ Form::label('visible', 'Visibilidad') }}
                                {!! Form::select('visible',['1' => 'Visible','0'=>'No visible'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
                        </div>
                        <div class="form-group">
                            {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;
