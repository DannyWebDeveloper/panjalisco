<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                        Categorias de extrados
                    </div>

                <div class="card-body">
                    @if(session('edit'))
                    <h4>Actualizar categoria</h4>
                      {!! Form::model(session('edit'), ['route' => ['admincategoriasextrado.update', session('edit')[0]->id], 'method' => 'PUT']) !!}
                        <div class="form-group">
                        {{ Form::label('nombre', 'Nombre de la categoria') }}
                        {{ Form::text('nombre', session('edit')[0]->nombre, ['class' => 'form-control', 'id' => 'nombre']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::submit('Actualizar', ['class' => 'btn btn-sm btn-primary']) }}
                        </div>
                        {!! Form::close() !!}
                    @else
                    <h4>Aggar nueva</h4>
                    {!! Form::open(['route' => 'admincategoriasextrado.store', 'files' => true]) !!}
                    <div class="form-group">
                    {{ Form::label('nombre', 'Nombre de la categoria') }}
                    {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
                    </div>
                    {!! Form::close() !!}
                    @endif
                    </div>


                    <h4>Lista de categorias</h4>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Cantidad de extrados</th>
                        <th colspan="2">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($categorias as $val)
                            <tr>
                                <td>{{ $val->id }}</td>
                               <td> {{ $val->nombre }}</td>
                               <td>
                                @foreach($extrados as $cat)
                                    @if($cat->id_categoria == $val->id)
                                        {{$cat->cantidad}}
                                    @endif
                                @endforeach
                               </td>

                                <td width ="10px">
                                <a href="{{ route('admincategoriasextrado.edit', $val->id) }}" class="btn">
                                    Editar
                                </a>
                                </td>
                                <td width ="10px">

                                    {!! Form::open(['route' => ['admincategoriasextrado.destroy', $val->id], 'method' => 'DELETE']) !!}
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
