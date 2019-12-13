<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                        Categorias
                        <a href="{{route('categoriaEstradoCreate')}}" class="btn btn-sm btn-primary btn-right">Nueva categoria</a>
                    </div>

                <div class="card-body">
                    <br>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th>Nombre</th>
                        <th>Fecha</th>
                        <th>Visible</th>
                        <th colspan="2">&nbsp;</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($categorias as $cat)
                            <tr>
                            <td>{{ $cat->nombre }}</td>
                            <td>{{ $cat->fecha }}</td>
                            <td>
                               @if($cat->visible == 1)
                                SI
                                @else
                                NO
                                @endif
                               </td>
                               <td width ="10px">
                                <a href="{{ route('categoriaEstradoEdit', $cat->id) }}" class="btn">
                                    Editar
                                </a>
                                </td>
                                <td width ="10px">
                                    {!! Form::open(['route' => ['categoriaEstradoDelete', $cat->id], 'method' => 'DELETE']) !!}
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
