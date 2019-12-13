<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Pan Jalisco</title>

    <!-- Bootstrap core CSS -->
    <!-- <link href="https://getbootstrap.com/docs/4.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    -->

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="css/carousel.css" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::asset('/css/home.css')}}">
    <link rel="stylesheet" href="{{URL::asset('/css/styles.css')}}">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

  </head>
  <body>
    <header>
  <nav class="navbar navbar-expand-md fixed-top">
    <a class="navbar-brand" href="{{ route('inicio') }}">
        <img src="{{URL::asset('/img/logo_pan.png')}}" class="img-logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fa fa-bars"></i>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav ml-auto">
      @foreach($menus as  $i => $menu)
        @if($menu->nivel == 'Padre')
        <li class="nav-item {{ ($menu->cantidad_subs > 0) ? 'dropdown' : ''  }}">
         @if($menu->link_externo == null && $menu->id_pagina != null)
            @foreach($slugs as $slug)
                @if($slug->id == $menu->id)
                <a class="nav-link {{ ($menu->cantidad_subs  > 0) ? 'dropdown-toggle': '' }} " href="/{{ $slug->slug }}" @if($menu->cantidad_subs  > 0) id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" @endif>
                            {{ $menu->nombre }}
                </a>

                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @foreach($menus as $sub)
                        @if($sub->nivel == 'Hijo' && $sub->id_padre == $menu->id)
                          @if($sub->link_externo == null)
                            @foreach($slugs as $slug)
                                @if($slug->id == $sub->id)
                                <a class="dropdown-item" href="{{ $slug->slug }}">{{ $sub->nombre }}</a>
                                @endif
                            @endforeach
                          @else
                            <a class="dropdown-item" href="{{ $sub->link_externo }}" target="_blank">{{ $sub->nombre }}</a>
                          @endif
                        @endif

                    @endforeach
                </div>
                @endif
            @endforeach
        @elseif($menu->link_externo != null && $menu->id_pagina == null)
            <a class="nav-link {{ ($menu->cantidad_subs  > 0) ? 'dropdown-toggle': '' }} " href="{{ $menu->link_externo }}" target="_blank" @if($menu->cantidad_subs  > 0) id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" @endif>
                {{ $menu->nombre }}
            </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @foreach($menus as $sub)
                        @if($sub->nivel == 'Hijo' && $sub->id_padre == $menu->id)
                          @if($sub->link_externo == null)
                            @foreach($slugs as $slug)
                                @if($slug->id == $sub->id)
                                <a class="dropdown-item" href="/{{ $slug->slug }}">{{ $sub->nombre }}</a>
                                @endif
                            @endforeach
                          @else
                          <a class="dropdown-item" href="{{ $sub->link_externo }}" target="_blank">{{ $sub->nombre }}</a>
                          @endif
                        @endif

                    @endforeach
                </div>
        @else
            <a class="nav-link {{ ($menu->cantidad_subs  > 0) ? 'dropdown-toggle': '' }} " href="#" target="_blank" @if($menu->cantidad_subs  > 0) id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" @endif>
                {{ $menu->nombre }}
            </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                    @foreach($menus as $sub)
                        @if($sub->nivel == 'Hijo' && $sub->id_padre == $menu->id)
                          @if($sub->link_externo == null)
                            @foreach($slugs as $slug)
                                @if($slug->id == $sub->id)
                                <a class="dropdown-item" href="/{{ $slug->slug }}">{{ $sub->nombre }}</a>
                                @endif
                            @endforeach
                          @else
                          <a class="dropdown-item" href="{{ $sub->link_externo }}" target="_blank">{{ $sub->nombre }}</a>
                          @endif
                        @endif

                    @endforeach
                </div>
         @endif
        </li>
        @endif

      @endforeach
        <!--

      <li class="nav-item {{ ($submenus[0]->id_padre !=  $menu->id) ? 'dropdown' : ''  }}" >
                    @if($menu->id_pagina)
                          @foreach($slugs as $slug)
                                @if($slug->id == $menu->id)
                                    @foreach($submenus as $sub)
                                             @if($sub->id_padre == $menu->id)
                                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink{{ $i }}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        {{ $menu->nombre }}
                                                </a>
                                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink{{ $i }}">
                                                    @if($sub->id_pagina)
                                                        @foreach($slugs as $slug)
                                                            @if($slug->id == $menu->id)
                                                            <a class="dropdown-item" href="{{ asset($slug->slug) }}">{{ $sub->nombre }}</a>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </div>
                                            @elseif($sub->id_padre)

                                                <a class="nav-link" href="{{ asset($slug->slug) }}">{{ $menu->nombre }}</a>
                                            @endif
                                        @endforeach
                                @endif
                          @endforeach
                    @endif
        </li>

    -->



      <!--
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ACTUALIDAD
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Boletínes y comunicados</a>
          <a class="dropdown-item" href="#">En los medios</a>
          <a class="dropdown-item" href="#">Convocatorias</a>
          <a class="dropdown-item" href="#">Estrados Electrónicos</a>
          <a class="dropdown-item" href="#">Videos</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          PARTICIPA
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Afílate</a>
          <a class="dropdown-item" href="#">Opina</a>
          <a class="dropdown-item" href="#">Redes Sociales</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          EN ACCIÓN
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">En acción</a>
          <a class="dropdown-item" href="#">Nuestros Gobiernos</a>
        </div>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          ESTRUCTURA
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Consejo Estatal</a>
          <a class="dropdown-item" href="#">Comité Directivo Estatal</a>
          <a class="dropdown-item" href="#">Dirigencias</a>
          <a class="dropdown-item" href="#">Panistas jaliscienses en el CEN</a>
          <a class="dropdown-item" href="#">Comité Directivo Estatal</a>
          <a class="dropdown-item item-submenu" href="#">
          Comisiones
          </a>
          <div class="dropdown-menu submenu" href="#" aria-labelledby="navbarDropdownSubMenuLink">
            <a class="dropdown-item" href="#">Comisión Organizadora de elecciones</a>
            <a class="dropdown-item" href="#">Comisión Organizadora Electoral del PAN Jalisco</a>
          </div>
        </div>
      </li>

      <li class="nav-item active">
        <a class="nav-link" href="transparencia">TRANSPARENCIA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">CONTÁCTANOS</a>
      </li>
      -->
      <li class="nav-item">
        <a class="nav-link" href="{{asset('/transparencia')}}">TRANSPARENCIA</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('contacto') }}">CONTÁCTANOS</a>
      </li>
    </ul>

     </div>
  </nav>
</header>

