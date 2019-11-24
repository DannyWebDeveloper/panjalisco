@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{!! asset('css/pagina.css') !!}">

    <div class="container">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                            Editar Página
                    </div>

                <div class="card-body">
                    {!! Form::model($pagina, ['route' => ['adminpaginas.update', $pagina->id], 'method' => 'PUT', 'files' => true]) !!}
                        {{  Form::hidden('id', $pagina->id)}}
                        @include('admin.paginas.partials.form')
                    {!! Form::close() !!}


                    @if($archivos)
                    <hr>
                    <h5>Archivos en la página</h5>
                    <table class="table">
                        <thead><tr><th>Documento</th><th colspan="3">Fecha</th></tr></thead>
                        <tbody>
                        @foreach($archivos as $file)
                        <tr class="ver">
                                <td><a href="{{ $file->file }}"> {{ $file->nombre }} </a></td> <td> {{$file->fecha}} </td>
                                <td>Editar</td>
                                <td><a href="{{ route('delete-archivo-pagina', $file->id) }}" class="btn btn-danger"> Eliminar </a> </td>
                        </tr>
                        <tr class="filei" id="file{{ $file->id }}" style="display:none;">
                            <td colspan="3">
                            {!! Form::open(['route' => ['update-archivo-pagina', $file->id]]) !!}
                                {{ Form::label('nombre', 'Nombre de archivo') }}
                                {{ Form::text('nombre', $file->nombre, ['class' => 'form-control', 'id' => 'nombre'.$file->id]) }}

                                {{ Form::label('fecha', 'Fecha de archivo') }}
                                {{ Form::text('fecha', $file->fecha, ['class' => 'form-control datepicker', 'id' => 'fecha'.$file->id, 'autocomplete' => false]) }}

                                {{ Form::submit('Guardar', ['class' => 'btn btn-primary']) }}
                            {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @endif

                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;


