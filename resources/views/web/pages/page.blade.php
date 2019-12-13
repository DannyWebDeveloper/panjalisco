@extends('layouts.header')


<div role="main" class="page">
@section('content')
    @if($pagina->img)
        <div class="img-portada" style="background:url('{{ $pagina->img }}');"></div>
    @endif
    <div class="container">
      <div class="row">
        <div class="col-md-12">
            <h1>{{ $pagina->titulo }}</h1>
            <hr>
                {!! $pagina->body !!}

                @if($archivos)
                    <hr>
                    <h3>Documentos de página</h3>
                    <table class="table">
                        <thead><tr><th>Documento</th><th colspan="3">Fecha</th></tr></thead>
                        <tbody>
                        @foreach($archivos as $file)
                        <tr>
                                <td>{{ $file->nombre }}</td>
                                 <td> {{$file->fecha}} </td>
                                <td></td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                    @endif
        </div>

      </div>
    </div>
</div>

    @extends('layouts.footer')
