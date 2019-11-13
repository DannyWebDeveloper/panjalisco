@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-offset-2">
                <div class="card card-default">
                    <div class="card-header">
                            Ver Página
                    </div>

                <div class="card-body">
                    <p><strong>Titulo</strong> {{ $pagina->tiutlo }} </p>
                    <p><strong>Slug</strong> {{ $pagina->slug }} </p>

                    <img src="{{ $pagina->img }}" width="200">
                    <br>
                    {!! $pagina->body !!}
                    <br>
                    @if($archivos)
                    <hr>
                    <h5>Archivos en la página</h5>
                    <table class="table">
                        <thead><tr><th>Documento</th><th>Fecha</th></tr></thead>
                        <tbody>
                        @foreach($archivos as $file)
                        <tr class="ver">
                                <td><a href="{{ $file->file }}"> {{ $file->nombre }} </a></td> <td> {{$file->fecha}} </td>

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
@endsection
