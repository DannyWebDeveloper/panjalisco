@extends('layouts.app')
@section('content')
    <div class="container justity-center">
        <div class="row">
            <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                            Editar documento
                    </div>

                <div class="card-body">
                    {!! Form::model($doc, ['route' => ['docEstradoUpdate', $doc->id], 'method' => 'PUT', 'files' => true]) !!}
                        {{  Form::hidden('id', $doc->id)}}
                        @include('admin.estrados.documentos.partials.form')
                    {!! Form::close() !!}

                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;


