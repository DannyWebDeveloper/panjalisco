<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                        Imagenes de acceso a mapas
                        <a href="{{route('adminmapas.create')}}" class="btn btn-sm btn-primary right"> Crear</a>

                    </div>

                <div class="card-body">

                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th width="10px">ID</th>
                        <th>Tipo</th>
                        <th>Imagen</th>
                        <th>Link</th>
                        <th colspan="2">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($mapas as $val)
                            <tr>
                                <td>{{ $val->id }}</td>
                               <td> {{ $val->tipo }}</td>
                               <td> <img src="{{ asset($val->img) }}" width="40"></td>
                               <td>{{ $val->link }}</td>

                                <td width ="10px">
                                <a href="{{ route('adminmapas.edit', $val->id) }}" class="btn">
                                    Editar
                                </a>
                                </td>
                                <td width ="10px">
                                    {!! Form::open(['route' => ['adminmapas.destroy', $val->id], 'method' => 'DELETE']) !!}
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
