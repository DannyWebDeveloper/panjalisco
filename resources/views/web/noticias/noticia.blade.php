@extends('layouts.header')
@section('content')
<div class="container main">
  <div class="row">
    <div class="col-md-8">
        <h1>{{ $noticia->titulo }}</h1>
        <a href="{{ route('categoria', $categoria[0]->slug) }}">{{ $categoria[0]->nombre }}</a>

                    @if($noticia->img)
                        <img src="{{ $noticia->img }}" class="img-responsive" width="100%" height="300">
                    @endif
                    <hr>

                    {!! $noticia->body !!}

                    <hr>

    </div>

    <div class="col-md-4 more-notes">
        <h3>Más notas</h3>
        @foreach($noticias as $not)
            <li>
                <a href="{{ route('noticia', $not->slug) }}">{{ $not->titulo }}</a>
            </li>

        @endforeach
    </div>
 </div>
</div>


@extends('layouts.footer')
