@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-offset-2">
                <div class="card card-default">
                    <div class="card-header">
                            Ver Slider <strong>{{ $slider->nombre }}</strong>

                            <a class="btn btn-danger text-justify-right" href="{{ route('adminsliders.index') }}">Regresar</a>
                    </div>

                <div class="card-body">
                    <img src="{{ $slider->img }}" width="100%" />
                    <p>{{ $slider->descripcion }}</p>
                    <a href="{{$slider->link }}
                    ">{{ $slider->link }}</a>

                    <p><strong>Estado </strong>{{ $slider->estado }}</p>
                 </div>
            </div>
            </div>
        </div>
    </div>
@endsection
