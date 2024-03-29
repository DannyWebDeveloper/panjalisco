@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{!! asset('css/pagina.css') !!}">

    <div class="container justity-center">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                            Editar Inciso
                    </div>

                <div class="card-body">
                    {!! Form::model($inciso, ['route' => ['incisoUpdate', $inciso->id], 'method' => 'PUT', 'files' => true]) !!}
                        @include('admin.transparencia.incisos.partials.form')
                    {!! Form::close() !!}

                    <hr>

                    @if(count($documentos)>0)
                    <table class="table">
                    <thead>
                    <tr><th>Documento</th> <th>Fecha documento</th><th>Visible</th><th colspan="2"></th> </tr>
                    </thead>
                    <tbody>
                        @foreach($documentos as $doc)
                        <tr>
                        <td>
                            @if($doc->Archivo)
                            <a href="{{ asset($doc->Archivo) }}">{{ $doc->NombreDocumento }}</a><br>
                            @else
                            <a href="{{ $doc->Link }}">{{ $doc->NombreDocumento }}</a>
                            @endif
                        </td>
                        <td>
                            @if($doc->FechaAutoDoc == 1)
                            <b>Automática</b>
                            @else
                            {{ $doc->FechaDocumento }}
                            @endif
                        </td>
                        <td>@if($doc->visible == 1)
                                SI
                                @else
                                NO
                                @endif
                                </td>
                       <td>
                            <a class="btn btn-sm edit-doc" href="{{ url('adm/admintransparencia/documentos/edit/'.$doc->id)}}">Editar</a>
                        </td>
                        <td>
                            <a class="btn btn-danger" onclick="return confirm('¿Está seguro que desea eliminar el documento?')" href="{{route('documentoDelete',['id' => $doc->id])}}">Eliminar</a>
                        </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    @endif
                        <div id="new-documento">
                            <h3>Agregar documento</h3>
                            {!! Form::open(['route' => 'documentoAddInciso', 'files' => true]) !!}
                            {{  Form::hidden('id_user', auth()->user()->id)}}
                            {{  Form::hidden('Id_Inciso', $inciso->id )}}
                            <div class="form-group row">
                                <div class="col-md-6">
                                    {{ Form::label('NombreDocumento', 'Nombre del documento') }}
                                    {{ Form::text('NombreDocumento', null, ['class' => 'form-control']) }}
                                </div>
                                <div class="col-md-6">
                                    {{ Form::label('Link', 'Link') }}
                                    {{ Form::text('Link', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">

                                {{ Form::label('Archivo', 'Archivo') }}
                                {{ Form::file('Archivo', ['class' => 'form-control' ]) }}
                            </div>
                            <div class="form-group row">
                            <div class="col-md-6">
                                {{ Form::label('FechaDocumento', 'Fecha') }}
                                {{ Form::text('FechaDocumento', $FechaDocumento,  ['class' => 'form-control datepicker', 'id' => 'FechaDocumento' ]) }}
                            </div>
                            <div class="col-md-6">
                                {{ Form::label('FechaCorresponde', 'Fecha correspondiente') }}
                                {{ Form::text('FechaCorresponde', $FechaCorresponde,  ['class' => 'form-control datepicker', 'id' => 'FechaCorresponde' ]) }}
                            </div>
                            </div>
                            <div class="form-group">
                                                {!! Form::label('FechaAutoDoc', 'Fecha automatica', []) !!}
                                                {!! Form::checkbox('FechaAutoDoc', null, false, [] ) !!}
                            </div>
                            <div class="form-group row">
                            <div class="col-md-6">
                                {{ Form::label('visible', 'Visibilidad') }}
                                {!! Form::select('visible',['1' => 'Visible','0'=>'No visible'], 1 ,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
                            </div>
                            </div>

                            <div class="form-group">

                            {{ Form::submit('Agregar', ['class' => 'btn btn-sm btn-primary']) }}
                            </div>
                            {!! Form::close() !!}
                        </div>


                </div>


            </div>
            </div>
        </div>
    </div>


<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
jQuery(function($){
    $( ".edit-doc" ).click(function(){

    });
    $('input').attr('autocomplete','off');

    $( "#FechaActualizacion" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
    });


    $("#FechaCorresponde").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
    });


    $("#FechaDocumento").datepicker({
        changeMonth: true,
        changeYear: true,
        dateFormat: 'yy-mm-dd',
        onSelect: function(dateText) {
            var date = $(this).datepicker('getDate'),
            day  = date.getDate(),
            month = date.getMonth() + 1,
            year =  date.getFullYear();
            newdate = new Date(date.setMonth(date.getMonth()-1));
            //$datepicker.datepicker('setDate', new Date());
            //var newdate = (month-1)+'/'+day+'/'+year;
             $('#FechaCorresponde').datepicker('setDate', newdate);
        }
    });

});
</script>
@endsection;


