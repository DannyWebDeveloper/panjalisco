<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                        Lista de Articulos
                        <a href="{{route('articuloForm')}}" class="btn btn-sm btn-primary btn-right"> Crear</a>
                    </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th width="10px">ID</th>
                        <th>Articulo</th>
                        <th>Titulo</th>
                        <th>Visible</th>
                        <th colspan="3">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($articulos as $art)
                            <tr>
                                <td>{{ $art->id }}</td>
                                <td>{{ $art->Numero }}</td>
                               <td> {{ $art->Titulo }}</td>
                               <td width ="10px">
                               @if($art->Visible == 1)
                                SI
                                @else
                                NO
                                @endif
                                </td>
                                <td width ="10px">
                                <a href="{{ route('articuloEdit', $art->id) }}" class="btn">
                                    Editar
                                </a>
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
