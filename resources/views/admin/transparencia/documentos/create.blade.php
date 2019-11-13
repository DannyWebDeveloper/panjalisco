@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{!! asset('css/pagina.css') !!}">

    <div class="container justity-center">
        <div class="row">
            <div class="col-md-10 col-offset-2">
                <div class="card card-default">
                    <div class="card-header">
                            Nuevo Parrafo
                    </div>

                <div class="card-body">
                {!! Form::open(['route' => 'parrafoCreate', 'files' => true]) !!}  {{  Form::hidden('id_user', auth()->user()->id)}}

                <div class="form-group">
                {{ Form::label('Id_Articulo', 'Articulo') }}
                {{ Form::select('Id_Articulo', $articulos, '', ['class' => 'form-control']) }}
                </div>

                <div class="form-group">
                    {{ Form::label('Numero_Parrafo', 'Número de parrafo') }}
                    {{ Form::text('Numero_Parrafo', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">

                    {{ Form::label('Titulo', 'Título del parrafo') }}
                    {{ Form::text('Titulo', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">

                    {{ Form::label('Texto', 'Texto') }}
                    {{ Form::text('Texto', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">

                    {{ Form::label('Link', 'Link') }}
                    {{ Form::text('Link', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">

                    {{ Form::label('Archivo', 'Archivo') }}
                    {{ Form::file('Archivo', ['class' => 'form-control' ]) }}
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

                    {{ Form::label('Fecha', 'Fecha de actualización') }}
                    {{ Form::text('Fecha', '',  ['class' => 'form-control datepicker' ]) }}
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
@endsection;

@section('scripts')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        jQuery(function($){
           // $( ".datepicker" ).focus(function(){
                $( ".datepicker" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
                });
            //});
            $('input').attr('autocomplete','off');
    });
        </script>
@endsection


