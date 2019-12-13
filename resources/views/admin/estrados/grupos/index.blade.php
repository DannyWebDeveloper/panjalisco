<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                        Grupos de estrados
                        <a href="{{route('grupoEstradoCreate')}}" class="btn btn-sm btn-primary btn-right">Nuevo grupo</a>
                    </div>

                <div class="card-body">
                    <br>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th>Nombre</th>
                        <th>Subcategoria</th>
                        <th>Fecha</th>
                        <th>Visible</th>
                        <th colspan="2">&nbsp;</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach($grupos as $gr)
                            <tr>
                            <td>{{ $gr->nombre }}</td>
                            <td>
                                @foreach($subcategorias as $sub)
                                    @if($sub->id == $gr->id_subcategoria)
                                        {{ $sub->nombre }}
                                    @endif
                                @endforeach
                            </td>

                            <td>{{ $gr->fecha }}</td>
                            <td>
                               @if($gr->visible == 1)
                                SI
                                @else
                                NO
                                @endif
                               </td>
                               <td width ="10px">
                                <a href="{{ route('grupoEstradoEdit', $gr->id) }}" class="btn">
                                    Editar
                                </a>
                                </td>
                                <td width ="10px">
                                    {!! Form::open(['route' => ['grupoEstradoDelete', $gr->id], 'method' => 'DELETE']) !!}
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
