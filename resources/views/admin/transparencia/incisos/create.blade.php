@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{!! asset('css/pagina.css') !!}">

    <div class="container justity-center">
        <div class="row">
            <div class="col-md-10 col-offset-2">
                <div class="card card-default">
                    <div class="card-header">
                            Crear Inciso
                    </div>

                <div class="card-body">
                {!! Form::open(['route' => 'incisoCreate', 'files' => true]) !!}  {{  Form::hidden('id_user', auth()->user()->id)}}
                <div class="form-group">
                    {{ Form::label('Id_Parrafo', 'Parrafo') }}
                    {{ Form::select('Id_Parrafo', $parrafos, '', ['class' => 'form-control']) }}


                    <div class="form-group">
                        {{ Form::label('Numero_Letra_Inciso', 'Número o Letra de inciso') }}
                        {{ Form::text('Numero_Letra_Inciso', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Titulo', 'Título del inciso') }}
                        {{ Form::text('Titulo', '', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">

                        {{ Form::label('Texto', 'Texto') }}
                        {{ Form::text('Texto', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('Visible', 'Visibilidad') }}
                        {!! Form::select('Visible',['1' => 'Visible','0'=>'No visible'],'',['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Orden', 'Orden') }}
                        {{ Form::text('Orden', '', ['class' => 'form-control']) }}
                    </div>


                    <div class="form-group">
                        {{ Form::label('Link', 'Link') }}
                        {{ Form::text('Link', null, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('Fecha', 'Fecha de actualización') }}
                        {{ Form::text('Fecha', '',  ['class' => 'form-control datepicker', 'id' => 'FechaActualizacion']) }}
                    </div>
                    <div class="form-group">
                        {!! Form::label('FechaAuto', 'Fecha automatica', []) !!}
                        {!! Form::checkbox('FechaAuto', null, false, [] ) !!}
                    </div>

                    <div class="form-group">
                        {{ Form::label('Archivo', 'Archivo') }}
                        {{ Form::file('Archivo', ['class' => 'form-control' ]) }}
                    </div>


                    <div class="form-group">

                        {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
                        <a class="btn btn-warning btn-sm"  href="{{ url('adm/admintransparencia/incisos') }}">Cancelar</a>
                    </div>


                {!! Form::close() !!}



                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;
@section('scripts')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        jQuery(function($){
           // $( ".datepicker" ).focus(function(){
                       //});
            $( "#FechaActualizacion" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
            });
            $('input').attr('autocomplete','off');
    });
        </script>
@endsection



