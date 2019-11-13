@extends('layouts.app')

@section('content')
    <div class="contaniner">
        <div class="row">
            <div class="col-md-8 col-offset-2">
                <div class="card card-default">
                    <div class="card-header">
                            Ver Noticia
                    </div>

                <div class="card-body">
                    <p><strong>Titulo</strong> {{ $noticia->tiutlo }} </p>
                    <p><strong>Slug</strong> {{ $noticia->slug }} </p>
                    <p><strong>Categoria</strong> {{ $categoria[0]->nombre }}<p>
                    <p><strong>Extracto</strong> {{ $noticia->extracto}}</p>
                    <img src="{{ $noticia->img }}" width="200">
                    <br>
                    {!! $noticia->body !!}
                 </div>
            </div>
            </div>
        </div>
    </div>
@endsection
