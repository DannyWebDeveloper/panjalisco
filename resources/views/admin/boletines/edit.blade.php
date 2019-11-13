@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{!! asset('css/slider.css') !!}">

    <div class="container justity-center">
        <div class="row">
            <div class="col-md-10 col-offset-2">
                <div class="card card-default">
                    <div class="card-header">
                            Editar Boletin
                    </div>

                <div class="card-body">
                    {!! Form::model($boletin, ['route' => ['adminboletines.update', $boletin->id], 'method' => 'PUT', 'files' => true]) !!}
                        {{  Form::hidden('id', $boletin->id)}}
                        @include('admin.boletines.partials.form')
                    {!! Form::close() !!}

                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;


