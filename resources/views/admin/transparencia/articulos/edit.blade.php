@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                        Articulo {{ $articulo->Numero }}
                    </div>

                    <div class="card-body">

                    {!! Form::model($articulo, ['route' => ['articuloUpdate', $articulo->id], 'method' => 'PUT', 'files' => true]) !!}
                    @include('admin.transparencia.articulos.partials.form')


                    {!! Form::close() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
