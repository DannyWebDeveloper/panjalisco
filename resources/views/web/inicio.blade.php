@extends('layouts.header')
<main role="main">

  <div id="myCarousel" class="carousel slide container" data-ride="carousel">
    <ol class="carousel-indicators">
    @foreach($sliders as $sli)
        @if($loop->first)
        <li data-target="#myCarousel" data-slide-to="{{$loop->iteration-1}}" class="active"></li>
        @else
        <li data-target="#myCarousel" data-slide-to="{{$loop->iteration-1}}"></li>
        @endif
    @endforeach

    </ol>
    <div class="carousel-inner">
        @foreach($sliders as $sli)
        @if($loop->first)
        <div class="carousel-item active">
        @else
        <div class="carousel-item">
        @endif
            <img class="bd-placeholder-img" width="100%" height="100%" focusable="false" role="img" src="{{ $sli->img }}">
            <div class="carousel-caption text-left">
                <p>{{ $sli->descripcion }}</p>
                @if($sli->link)
                <a class="btn">{{ $sli->link }}</a>
                @endif
            </div>
        </div>
        @endforeach
    </div>
    <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


  <div class="container">

    <!-- Three columns of text below the carousel -->
    <h2>ÚLTIMAS NOTICIAS</h2>
    <div class="row">
            @foreach($noticias as $nota)
            <div class="col-md-4">
                <div class="card border-primary flex-md-row mb-4 shadow-sm h-md-250 item-noticia">
                <img class="card-img-left flex-auto d-none d-lg-block" alt="{{ $nota->titulo }}" src="{{ $nota->img }}" style="width: 150px; height: 150px;">
                    <div class="card-body d-flex flex-column align-items-start">

                        <strong class="d-inline-block mb-2 text-primary">{{$nota->nombre }}</strong>
                        <h6 class="mb-0">
                            <a class="text-dark"  href="{{ route('noticia', $nota->slug_noticia)  }}">{{ $nota->titulo }}</a>
                        </h6>
                        <div class="mb-1 text-muted small">{{$nota->created_at->format("m/d/Y")}}</div>
                        <p class="card-text mb-auto resumen-nota">{{ $nota->extracto }}</p>
                        <a class="btn btn-outline-primary btn-sm" role="button" href="{{ route('noticia', $nota->slug_noticia)  }}">Leer nota</a>
                        </div>

                </div>
            </div>
            @endforeach
            <div class="col-sm-12">
                <a href="{{ route('noticias') }}" class="show-more">Ver todas</a>
            </div>

    </div><!-- /.row -->
    <br><br>
    <div class="row map-links">
        @foreach($mapas as $map)
        <div class="col-sm-6">
            <a href="{{ $map->link }}"><img src="{{ asset($map->img) }}" class="img_mapa"></a>
        </div>
        @endforeach

    </div>


  </div><!-- /.container -->


  @extends('layouts.footer')
