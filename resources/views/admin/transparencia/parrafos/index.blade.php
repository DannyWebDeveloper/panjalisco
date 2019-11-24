<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                        Lista de parrafos
                        <a href="{{route('parrafoForm')}}" class="btn btn-sm btn-primary btn-right"> Crear</a>
                    </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th width="10px">Articulo</th>
                        <th>Parrafo</th>
                        <th>Titulo</th>
                        <th>Visible</th>
                        <th colspan="3">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($parrafos as $cat)
                            <tr>
                               <td>{{ $cat->Numero }}</td>
                               <td> {{ $cat->Numero_Parrafo }} </td>
                               <td> {{ $cat->Titulo }}

                               </td>
                               <td width ="10px">
                                @if($cat->Visible == 1)
                                SI
                                @else
                                NO
                                @endif
                                </td>
                                <td width ="10px">
                                <a href="{{ route('parrafoEdit', $cat->id) }}" class="btn">
                                    Editar
                                </a>
                                </td>
                                <td width ="10px">

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
