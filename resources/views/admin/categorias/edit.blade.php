
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-offset-2">
                <div class="card card-default">
                    <div class="card-header">
                            Editar Categoria
                    </div>

                <div class="card-body">
                    {!! Form::model($categoria, ['route' => ['admincategorias.update', $categoria->id], 'method' => 'PUT']) !!}

                        @include('admin.categorias.partials.form')

                    {!! Form::close() !!}
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;
