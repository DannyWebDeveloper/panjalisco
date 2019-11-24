<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        Directorio
                        <a href="{{route('admindirectorio.create')}}" class="btn btn-sm btn-primary btn-right">Nuevo</a>
                    </div>

                <div class="card-body">

                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th>Nombre</th>
                        <th>Teléfono</th>
                        <th>Ext.</th>
                        <th>Correo</th>
                        <th>Área</th>
                        <th>Titular</th>
                        <th>Visible</th>
                        <th colspan="2">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($dirs as $val)
                            <tr>
                               <td> {{ $val->nombre }}</td>
                               <td> {{ $val->telefono }}</td>
                               <td> {{ $val->ext }}</td>
                               <td> {{ $val->email }}</td>
                               <td> {{ $val->area }}</td>
                               <td>{{ $val->titular }}</td>
                               <td>
                               @if($val->visible == 1)
                                SI
                                @else
                                NO
                                @endif
                               </td>
                                <td width ="10px">
                                <a href="{{ route('admindirectorio.edit', $val->id) }}" class="btn">
                                    Editar
                                </a>
                                </td>
                                <td width ="10px">
                                    {!! Form::open(['route' => ['admindirectorio.destroy', $val->id], 'method' => 'DELETE']) !!}
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
