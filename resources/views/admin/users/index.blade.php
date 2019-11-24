<!-- create.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                        Usuarios
                         <a href="{{route('adminusers.create')}}" class="btn btn-sm btn-primary btn-right"> Crear</a>
                    </div>
                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th width="10px">ID</th>
                        <th>Nombre</th>
                        <th>Correo</th>
                        <th>Estado</th>
                        <th colspan="3">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $val)
                            <tr>
                                <td>{{ $val->id }}</td>
                               <td> {{ $val->name }}</td>
                               <td> {{ $val->email }} </td>
                               <td>@if($val->estatus == 1)Activo @endif @if($val->estatus == 0)Desactivado @endif</td>
                               <td width ="10px">
                                <a href="{{ route('adminusers.show', $val->id) }}" class="btn">
                                    ver
                                </a>
                                </td>
                                <td width ="10px">
                                <a href="{{ route('adminusers.edit', $val->id) }}" class="btn">
                                    Editar
                                </a>
                                </td>
                                <td width ="10px">
                                    {!! Form::open(['route' => ['adminusers.destroy', $val->id], 'method' => 'DELETE']) !!}
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
