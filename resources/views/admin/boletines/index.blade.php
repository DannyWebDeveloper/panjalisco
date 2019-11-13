<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                        Boletines
                        <a href="{{route('adminboletines.create')}}" class="btn btn-sm btn-primary right">Nuevo boleitn</a>
                    </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th>Titulo</th>
                        <th>Documento</th>
                        <th>Fecha</th>
                        <th>Visible</th>
                        <th colspan="3">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($boletines as $val)
                            <tr>
                               <td> {{ $val->titulo }}</td>
                               <td><a href="/{{ $val->documento }}">documento<a></td>
                               <td>{{ $val->fecha }}</td>
                               <td>
                               @if($val->visible == 1)
                                SI
                                @else
                                NO
                                @endif
                               </td>
                                <td width ="10px">
                                <a href="{{ route('adminboletines.edit', $val->id) }}" class="btn">
                                    Editar
                                </a>
                                </td>
                                <td width ="10px">
                                    {!! Form::open(['route' => ['adminboletines.destroy', $val->id], 'method' => 'DELETE']) !!}
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
