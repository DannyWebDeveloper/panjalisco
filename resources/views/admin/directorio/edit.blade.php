@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{!! asset('css/slider.css') !!}">

    <div class="container justity-center">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                            Editar integrante
                    </div>

                <div class="card-body">
                    {!! Form::model($dir, ['route' => ['admindirectorio.update', $dir->id], 'method' => 'PUT', 'files' => true]) !!}
                        {{  Form::hidden('id', $dir->id)}}
                        @include('admin.directorio.partials.form')
                    {!! Form::close() !!}

                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;


