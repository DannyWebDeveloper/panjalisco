@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{!! asset('css/slider.css') !!}">

    <div class="container justity-center">
        <div class="row">
            <div class="col-md-10 col-offset-2">
                <div class="card card-default">
                    <div class="card-header">
                            Editar Slider
                    </div>

                <div class="card-body">
                @if($slider->img)
                    <img src="{{$slider->img}}" width="100"><br>
                    @endif
                    {!! Form::model($slider, ['route' => ['adminsliders.update', $slider->id], 'method' => 'PUT', 'files' => true]) !!}
                        {{  Form::hidden('id', $slider->id)}}
                        @include('admin.sliders.partials.form')
                    {!! Form::close() !!}

                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;


