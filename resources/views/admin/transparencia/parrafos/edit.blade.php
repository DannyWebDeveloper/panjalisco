@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{!! asset('css/pagina.css') !!}">

    <div class="container justity-center">
        <div class="row">
            <div class="col-md-10 col-offset-2">
                <div class="card card-default">
                    <div class="card-header">
                            Editar Parrafo
                    </div>

                <div class="card-body">
                    {!! Form::model($parrafo, ['route' => ['parrafoUpdate', $parrafo->id], 'method' => 'PUT', 'files' => true]) !!}
                        @include('admin.transparencia.parrafos.partials.form')
                    {!! Form::close() !!}

                    <hr>
                    @if(count($documentos)>0)
                    <table class="table">
                    <thead>
                    <tr><th>Documento</th> <th>Fecha documento</th><th>Visible</th> </tr>
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
                        <td>{{ $doc->FechaDocumento }}</td>
                        <td>@if($doc->visible == 1)
                                SI
                                @else
                                NO
                                @endif
                                </td>
                        </tr>
                        @endforeach
                    </tbody>
                    </table>
                    @endif

                    <hr>
                    <h3>Agregar documento</h3>
                    {!! Form::open(['route' => 'documentoAddParrafo', 'files' => true]) !!}
                    {{  Form::hidden('id_user', auth()->user()->id)}}
                    {{  Form::hidden('id_parrafo', $parrafo->id )}}
                    <div class="form-group">

                        {{ Form::label('NombreDocumento', 'Nombre del documento') }}
                        {{ Form::text('NombreDocumento', null, ['class' => 'form-control']) }}
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
                        {{ Form::label('FechaDocumento', 'Fecha') }}
                        {{ Form::text('FechaDocumento', null,  ['class' => 'form-control datepicker' ]) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('visible', 'Visibilidad') }}
                        {!! Form::select('visible',['1' => 'Visible','0'=>'No visible'], 0 ,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
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
@endsection;


