<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                        Lista de noticias
                        <a href="{{route('adminnoticias.create')}}" class="btn btn-sm btn-primary btn-right"> Crear</a>
                    </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th width="10px">ID</th>
                        <th>Titulo</th>
                        <th colspan="3">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($noticias as $cat)
                            <tr>
                                <td>{{ $cat->id }}</td>
                               <td> {{ $cat->titulo }}</td>
                               <td width ="10px">
                                <a href="{{ route('adminnoticias.show', $cat->id) }}" class="btn">
                                    ver
                                </a>
                                </td>
                                <td width ="10px">
                                <a href="{{ route('adminnoticias.edit', $cat->id) }}" class="btn">
                                    Editar
                                </a>
                                </td>
                                <td width ="10px">
                                    {!! Form::open(['route' => ['adminnoticias.destroy', $cat->id], 'method' => 'DELETE']) !!}
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
