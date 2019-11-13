@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-offset-2">
                <div class="card card-default">
                    <div class="card-header">
                            Ver Categoria
                    </div>

                <div class="card-body">
                    <p><strong>Nombre</strong> {{ $categoria->nombre }} </p>
                    <p><strong>Slug</strong> {{ $categoria->slug }} </p>
                 </div>
            </div>
            </div>
        </div>
    </div>
@endsection;
