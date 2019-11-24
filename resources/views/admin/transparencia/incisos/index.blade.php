<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        Incisos
                        <a href="{{route('incisoForm')}}" class="btn btn-sm btn-primary btn-right"> Crear</a>
                    </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th>Articulo</th>
                        <th>Parrafo</th>
                        <th>inciso</th>
                        <th>Titulo</th>
                        <th>Visible</th>
                        <th colspan="2">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($incisos->sortBy(['Numero_Parrafo']) as $inc)
                            <tr>

                                <td>{{ $inc->Numero }} </td>
                                <td>{{ $inc->Numero_Parrafo }}</td>
                                <td>{{ $inc->Numero_Letra_Inciso }}</td>
                               <td> {{ $inc->Titulo }}
                               <br>
                                    <b>Archivo</b> {{ $inc->Archivo }}
                                    <br>
                                    <b>Link</b> {{ $inc->Link }}
                               </td>
                               <td width ="10px">
                               @if($inc->Visible == 1)
                                SI
                                @else
                                NO
                                @endif
                                </td>
                                <td width ="10px">
                                <a href="{{ route('incisoEdit', $inc->id) }}" class="btn">
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
