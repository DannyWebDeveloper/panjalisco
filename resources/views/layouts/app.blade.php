<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'PAN Jalisco') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/functions.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style-admin.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light fixed-top bg-white shadow-sm ">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'PAN Jalisco') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                        </li>
                    </ul>

                    <!-- Right Side Of Navbar -->

                    <ul class="navbar-nav ml-auto">

                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                            </li>
                        @else


                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Salir') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <br><br>
                        @guest
                        @else
                        <a id="menu-movil" onclick="myFunction()">Menu</a>
                        <ul class="sidebar" id="sidebar">
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admincategorias.index') }}">Categorias</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('adminnoticias.index') }}">Noticias</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('adminpaginas.index') }}">Páginas</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('adminmenus.index') }}">Menús</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('adminsliders.index') }}">Sliders</a></li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="{{ route('admintransparencia') }}" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Transparencia</a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <a class="dropdown-item" href="{{ route('articulos') }}">Articulos</a>
                                <a class="dropdown-item" href="{{ route('parrafos')  }}">Parrafos</a>
                                <a class="dropdown-item" href="{{ route('incisos')}}">Incisos</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="itemEstrado" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Estrados</a>
                                <div class="dropdown-menu" aria-labelledby="itemEstrado">
                                <a class="dropdown-item" href="{{ route('categoriaEstrado') }}">Categoria padre</a>
                                <a class="dropdown-item" href="{{ route('subcategoriaEstrado')  }}">Categoria Hijo</a>
                                <a class="dropdown-item" href="{{ route('grupoEstrado')}}">Grupo extrado</a>
                                </div>
                            </li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('adminboletines.index') }}">Boletines</a></li>

                            <li class="nav-item"> <a class="nav-link" href="{{ route('adminhemeroteca.index') }}">Hemeroteca</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admindirectorio.index') }}">Directorio</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admincomite.index') }}">Comité</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('admincomision.index') }}">Comisión</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('adminsocials.index') }}">Redes sociales</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('adminenlaces.index') }}">Enlaces</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('adminmapas.index') }}">Mapas</a></li>
                            <li class="nav-item"> <a class="nav-link" href="{{ route('adminusers.index') }}">Usuarios</a></li>
                            </ul>
                        @endguest


        <main class="py-4 contenedor-general">
            @if(session('info'))
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-offset-2">
                            <div class="alert alert-success">
                                {{ session('info') }}
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if(count($errors))
            <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-offset-2">
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                @endforeach

                            </div>
                        </div>
                    </div>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    @yield('scripts')
</body>
@guest
@else
<style>
/*menu sidebar new*/
.sidebar{
    list-style: none;
    position: fixed !important;
    height: 88vh;
    width:15%;
    overflow-y: scroll;
}
.sidebar li{
    color:#000;
}
.contenedor-general{
    width:85%;
    float:right;
}
</style>
@endguest
</html>
