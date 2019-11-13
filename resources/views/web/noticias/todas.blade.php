@extends('layouts.header')
@section('content')
<div class="container main">
      <!-- Three columns of text below the carousel -->
      <h2>ÚLTIMAS NOTICIAS</h2>
    <div class="row">
            @foreach($noticias as $nota)
            <div class="col-md-12">
                <div class="card border-primary flex-md-row mb-4 shadow-sm h-md-250">
                    <div class="card-body d-flex flex-column align-items-start">
                    <img class="card-img-left flex-auto d-none d-lg-block" alt="{{ $nota->titulo }}" src="{{ $nota->img }}" style="width: 200px; height: 200px;">
                    <strong class="d-inline-block mb-2 text-primary">{{$nota->nombre }}</strong>
                    <h6 class="mb-0">
                        <a class="text-dark" href="#">{{ $nota->titulo }}</a>
                    </h6>
                    <div class="mb-1 text-muted small">{{$nota->created_at->format("m/d/Y")}}</div>
                        <p class="card-text mb-auto resumen-nota">{{ $nota->extracto }}</p>
                        <a class="btn btn-outline-primary btn-sm" role="button" href="{{ asset('/notas/'.$nota->slug) }}">Leer nota</a>
                    </div>
                    </div>
            </div>
            @endforeach
        {{ $noticias->render() }}
    </div>

</div>

@extends('layouts.footer')

