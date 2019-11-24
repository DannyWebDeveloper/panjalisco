<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                        Enlaces
                        <a href="{{route('adminenlaces.create')}}" class="btn btn-sm btn-primary btn-right">Nuevo Enlace</a>
                    </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Link</th>
                        <th colspan="3">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($enlaces as $val)
                            <tr>
                               <td> {{ $val->nombre }}</td>
                               <td>
                                <img src="{{asset($val->img)}}" width="60">
                               </td>
                               <td>
                               <a href="{{$val->link}}" target="_blank"> {{ $val->link }}</a>
                               </td>
                                <td width ="10px">
                                <a href="{{ route('adminenlaces.edit', $val->id) }}" class="btn">
                                    Editar
                                </a>
                                </td>
                                <td width ="10px">
                                    {!! Form::open(['route' => ['adminenlaces.destroy', $val->id], 'method' => 'DELETE']) !!}
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
