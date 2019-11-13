@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{!! asset('css/slider.css') !!}">

    <div class="container justity-center">
        <div class="row">
            <div class="col-md-10 col-offset-2">
                <div class="card card-default">
                    <div class="card-header">
                            Editar miembro de comision
                    </div>

                <div class="card-body">
                    {!! Form::model($comision, ['route' => ['admincomision.update', $comision->id], 'method' => 'PUT', 'files' => true]) !!}
                        {{  Form::hidden('id', $comision->id)}}
                        @include('admin.comision.partials.form')
                    {!! Form::close() !!}

                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;


