<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                        Lista de Documentos
                        <a href="{{route('parrafoForm')}}" class="btn btn-sm btn-primary right"> Crear</a>
                    </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th width="10px">Parrafo / Inciso</th>
                        <th>Nombre Documento</th>
                        <th>Archivo / Link</th>
                        <th>Visible</th>

                        <th>&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($documentos as $doc)
                            <tr>
                               <td>
                                @if($doc->Id_Inciso)
                                    <b>Inc. {{ $doc->Numero_Letra_Inciso}}</b>
                                    @else
                                    <b>Parr. {{ $doc->Numero_Parrafo}}</b>
                                    @endif
                               </td>
                               <td> {{ $doc->NombreDocumento }} </td>
                               <td> {{ $doc->Archivo }}
                               {{ $doc->Link }}
                               </td>
                               <td width ="10px">
                                @if($doc->visible == 1)
                                SI
                                @else
                                NO
                                @endif
                                </td>
                                <td width ="10px">


                                <a href="{{ route('documentoEdit', $doc->id) }}" class="btn">
                                    Editar
                                </a>
                                </td>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $documentos->links() }}
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;
