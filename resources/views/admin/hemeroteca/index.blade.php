<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                        Hemeroteca
                        <a href="{{route('adminhemeroteca.create')}}" class="btn btn-sm btn-primary btn-right">Nuevo</a>
                    </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th>Nombre </th>
                        <th>Archivo</th>
                        <th>Fecha</th>
                        <th>Visible</th>
                        <th colspan="3">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($hemes as $val)
                            <tr>
                               <td> {{ $val->nombreArchivo }}</td>
                               <td><a href="/{{ $val->archivo }}">Archivo<a></td>

                               <td>{{ $val->fecha }}</td>
                               <td>
                               @if($val->visible == 1)
                                SI
                                @else
                                NO
                                @endif
                               </td>
                                <td width ="10px">
                                <a href="{{ route('adminhemeroteca.edit', $val->id) }}" class="btn btn-default">
                                    Editar
                                </a>
                                </td>
                                <td width ="10px">
                                    {!! Form::open(['route' => ['adminhemeroteca.destroy', $val->id], 'method' => 'DELETE']) !!}
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
