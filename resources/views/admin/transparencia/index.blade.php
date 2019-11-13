@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        Administración transparencia
                    </div>

                    <div class="card-body">
                    <a class="btn" href="{{ route('articuloForm') }}">Nuevo articulo</a>
                     <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No. art</th>
                                <th>Titulo</th>
                                <th>Visible</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($articulos as $art)
                            <tr>
                                <td> {{ $art->Numero }}</td>
                                <td>{{ $art->Titulo }}</td>
                                <td>@if($art->Visible == 1)
                                    SI
                                    @else NO
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('showParrafosAdmin', $art->id) }}">Parrafos</a>
                                    <a class="btn btn-primary" href="{{ route('articuloEdit', $art->id) }}">Editar</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                     </table>

                    <hr>
                    @if(session('parrafos'))
                    <h4>parrafos</h4>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                            <th>No. Parrafo</th>
                            <th>Titulo</th>
                            <th>Visible</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach(session('parrafos') as $p)
                        <tr>
                        <td>{{ $p->Numero_Parrafo }}</td>
                        <td>{{ $p->Titulo }}</td>
                        <td>@if($art->Visible == 1)
                                    SI
                                    @else NO
                                    @endif</td>
                        <td>
                         <a class="btn btn-primary" href="{{ route('showIncisosAdmin', $p->idtras_Parrafos) }}">Detalles</a>
                        </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                    @endif

                    @if(session('incisos'))
                    <h4>Incisos</h4>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                            <th>No. inciso  </th>
                            <th>Titulo</th>
                            <th>Visible</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach(session('incisos') as $inc)
                        <tr>
                        <td>{{ $inc->Numero_Parrafo }}</td>
                        <td>{{ $inc->Titulo }}</td>
                        <td>@if($inc->Visible == 1)
                                    SI
                                    @else NO
                                    @endif</td>
                        <td>
                        <a class="btn btn-primary" href="{{ route('showDocumentosAdmin', $inc->idtrans_Incisos) }}">Detalles</a>
                         </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                    @endif

                    @if(session('documentos'))
                    <h4>Documentos</h4>
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                            <th>Documento  </th>
                            <th>Fecha </th>
                            <th>Visible</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach(session('documentos') as $doc)
                        <tr>
                        <td>{{ $doc->NombreDocumento }}</td>
                        <td>{{ $doc->FechaDocumento }}</td>
                        <td>@if($doc->visible == 1) SI @else NO @endif</td>
                        <td>
                         </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                    @endif
                    </div>
                </div>

        </div>
    </div>
</div>
@endsection;
