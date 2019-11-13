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
                <hr>
        </div>

      </div>
    </div>
</div>

    @extends('layouts.footer')
