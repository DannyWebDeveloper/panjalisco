@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{!! asset('css/pagina.css') !!}">

    <div class="container justity-center">
        <div class="row">
            <div class="col-md-10 col-offset-2">
                <div class="card card-default">
                    <div class="card-header">
                            Editar Documento
                    </div>

                <div class="card-body">
                    {!! Form::model($documento, ['route' => ['documentoUpdate', $documento->id], 'method' => 'PUT', 'files' => true]) !!}
                        @include('admin.transparencia.documentos.partials.form')
                    {!! Form::close() !!}

                    <hr>


                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;


