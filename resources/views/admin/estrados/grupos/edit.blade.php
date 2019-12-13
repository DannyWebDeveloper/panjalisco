@extends('layouts.app')
@section('content')
    <div class="container justity-center">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                            Editar grupo de sxtrado
                    </div>

                <div class="card-body">
                    {!! Form::model($grupo, ['route' => ['grupoEstradoUpdate', $grupo->id], 'method' => 'PUT', 'files' => true]) !!}
                        {{  Form::hidden('id', $grupo->id)}}
                        @include('admin.estrados.grupos.partials.form')
                    {!! Form::close() !!}



                    <h2>Documentos del grupo</h2>
                    <a href="{{route('docEstradoCreate', ['nivel' => 3, 'id' => $grupo->id])}}" class="btn btn-sm btn-primary btn-right">Nuevo Documento</a>

                    <table class="table">
                    <thead><tr><td>Nombre</td><td>Documento</td><td>Fecha documento</td><td>Visible</td><td colspan="2"></td></tr></thead>
                    <tbody>
                    @foreach($docs as $doc)
                        <tr>
                            <td>{{ $doc->nombre }}</td>
                            <td>{{ $doc->documento }}</td>
                            <td>{{ $doc->fechaDocumento }}</td>
                            <td>{{ $doc->fechaUpdate }}</td>
                            <td>
                               @if($doc->visible == 1)
                                SI
                                @else
                                NO
                                @endif
                            </td>
                            <td width ="10px">
                                <a href="{{ route('docEstradoEdit', ['nivel' => 3, 'id' => $doc->id]) }}" class="btn">
                                    Editar
                                </a>
                            </td>
                            <td width ="10px">
                                    {!! Form::open(['route' => ['docEstradoDelete', $doc->id], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                            </td>

                        </tr>


                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;


