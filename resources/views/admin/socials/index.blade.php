<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                        Link's Sociales
                        <a href="{{route('adminsocials.create')}}" class="btn btn-sm btn-primary right"> Crear</a>

                    </div>

                <div class="card-body">
                    <div class="text-justify-right" style="width:100%; text-align:right;">
                        <a href="#whatsapp" class="btn btn-sm btn-success">WhatsApp</a>
                    </div>
                    <br>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th width="10px">ID</th>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Link</th>
                        <th colspan="3">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($socials as $val)
                            <tr>
                                <td>{{ $val->id }}</td>
                               <td> {{ $val->red }}</td>
                               <td> <img src="{{ asset($val->icon) }}" width="40"></td>
                               <td>{{ $val->link }}</td>
                               <td width ="10px">
                                <a href="{{ route('adminsocials.show', $val->id) }}" class="btn">
                                    ver
                                </a>
                                </td>
                                <td width ="10px">
                                <a href="{{ route('adminsocials.edit', $val->id) }}" class="btn">
                                    Editar
                                </a>
                                </td>
                                <td width ="10px">
                                    {!! Form::open(['route' => ['adminsocials.destroy', $val->id], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="col-sm-6" id="whatsapp">
                        <h2>WhatsApp</h2>
                        {!! Form::model($what, ['route' => ['update-whatsapp', $what->id], 'method' => 'POST']) !!}
                        {{  Form::hidden('id', $what->id)}}
                        <div class="form-group">
                            {{ Form::label('numero', 'Número de WhatsApp') }}
                            {{ Form::text('numero', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('msg', 'Texto inical en el chat') }}
                            {{ Form::textarea('msg', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                                {{ Form::label('visible', 'Visibilidad') }}
                                {!! Form::select('visible',['1' => 'Visible','0'=>'No visible'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
                        </div>
                        <div class="form-group">
                            {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;
