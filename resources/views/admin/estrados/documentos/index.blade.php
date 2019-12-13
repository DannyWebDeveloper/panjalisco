<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                        Categorias hija
                        <a href="{{route('subcategoriaEstradoCreate')}}" class="btn btn-sm btn-primary btn-right">Nueva sub-categoria</a>
                    </div>

                <div class="card-body">
                    <br>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th>Nombre</th>
                        <th>Categoria </th>
                        <th>Fecha</th>
                        <th>Visible</th>
                        <th colspan="2">&nbsp;</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($subcategorias as $subcat)
                            <tr>
                            <td>{{ $subcat->nombre }}</td>
                            <td>
                                @foreach($categorias as $cat)
                                    @if($cat->id == $subcat->id_categoria)
                                        {{ $cat->nombre }}
                                    @endif
                                @endforeach
                            </td>

                            <td>{{ $subcat->fecha }}</td>
                            <td>
                               @if($subcat->visible == 1)
                                SI
                                @else
                                NO
                                @endif
                               </td>
                               <td width ="10px">
                                <a href="{{ route('subcategoriaEstradoEdit', $subcat->id) }}" class="btn">
                                    Editar
                                </a>
                                </td>
                                <td width ="10px">
                                    {!! Form::open(['route' => ['subcategoriaEstradoDelete', $subcat->id], 'method' => 'DELETE']) !!}
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
