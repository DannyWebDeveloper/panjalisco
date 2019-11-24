<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                        Extrados
                        <a href="{{route('adminextrados.create')}}" class="btn btn-sm btn-primary btn-right">Nuevo Extrado</a>
                    </div>

                <div class="card-body">
                    <div class="text-justify-right" style="width:100%; text-align:right;">
                        <a href="{{route ('admincategoriasextrado.index')}}" class="btn btn-sm btn-primary">Categorias de extrado</a>
                    </div>
                    <br>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th>Titulo</th>
                        <th>Documento</th>
                        <th>Categoria</th>
                        <th>Fecha</th>
                        <th>Visible</th>
                        <th colspan="3">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($extrados as $val)
                            <tr>
                               <td> {{ $val->titulo }}</td>
                               <td><a href="/{{ $val->documento }}">documento<a></td>
                               <td>
                                    @foreach($categorias as $cat)
                                        @if($cat->id == $val->id_categoria)
                                            {{ $cat->nombre }}
                                        @endif
                                    @endforeach
                               </th>
                               <td>{{ $val->fecha }}</td>
                               <td>
                               @if($val->visible == 1)
                                SI
                                @else
                                NO
                                @endif
                               </td>
                                <td width ="10px">
                                <a href="{{ route('adminextrados.edit', $val->id) }}" class="btn">
                                    Editar
                                </a>
                                </td>
                                <td width ="10px">
                                    {!! Form::open(['route' => ['adminextrados.destroy', $val->id], 'method' => 'DELETE']) !!}
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
