<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                        Comité
                        <a href="{{route('admincomite.create')}}" class="btn btn-sm btn-primary right">Nuevo Integrante</a>
                    </div>

                <div class="card-body">

                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th>Nombre</th>
                        <th>Puesto</th>
                        <th>Foto</th>
                        <th>Visible</th>
                        <th colspan="3">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($comites as $val)
                            <tr>
                               <td> {{ $val->nombre }}</td>
                               <td>{{ $val->puesto }}</td>
                               <td><img src="{{ asset($val->foto) }}" width="50"></td>
                               <td>
                               @if($val->visible == 1)
                                SI
                                @else
                                NO
                                @endif
                               </td>
                                <td width ="10px">
                                <a href="{{ route('admincomite.edit', $val->id) }}" class="btn">
                                    Editar
                                </a>
                                </td>
                                <td width ="10px">
                                    {!! Form::open(['route' => ['admincomite.destroy', $val->id], 'method' => 'DELETE']) !!}
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
