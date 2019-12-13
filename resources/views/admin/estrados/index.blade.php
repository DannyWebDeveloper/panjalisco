<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>Administración de estrados</h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
                <div class="card card-default">
                    <div class="card-header">
                        Categorias
                    </div>
                <div class="card-body">
                    <div class="text-justify-right" style="width:100%; text-align:right;">
                        <a href="{{route ('categoriaEstrado')}}" class="btn btn-sm btn-primary">Categorias de estrado</a>
                    </div>
                    <br>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th>Titulo</th>
                        <th>Fecha</th>
                        <th>Visible</th>
                        <th colspan="3">&nbsp;</th>
                        </tr>
                        </thead>
                    <tbody>
                    @foreach($categorias as $cat)
                        <tr><td>{{ $cat->nombre }}</td><td>{{ $cat->fecha }}</td><td>{{ $cat->visible }}</td></tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-4">
                <div class="card card-default">
                    <div class="card-header">
                        Sub categorias
                    </div>
                <div class="card-body">
                    <div class="text-justify-right" style="width:100%; text-align:right;">
                        <a href="{{route ('subcategoriaEstrado')}}" class="btn btn-sm btn-primary">Sub categorias de estrado</a>
                    </div>
                    <br>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th>Titulo</th>
                        <th>Fecha</th>
                        <th>Visible</th>
                        <th colspan="3">&nbsp;</th>
                        </tr>
                        </thead>
                    <tbody>
                    @foreach($subcategorias as $cat)
                        <tr><td>{{ $cat->nombre }}</td><td>{{ $cat->fecha }}</td><td>{{ $cat->visible }}</td></tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>

        </div>

        <div class="col-md-4">
                <div class="card card-default">
                    <div class="card-header">
                        Grupos
                    </div>
                <div class="card-body">
                    <div class="text-justify-right" style="width:100%; text-align:right;">
                        <a href="{{route ('grupoEstrado')}}" class="btn btn-sm btn-primary">Grupo de estrado</a>
                    </div>
                    <br>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th>Titulo</th>
                        <th>Fecha</th>
                        <th>Visible</th>
                        <th colspan="3">&nbsp;</th>
                        </tr>
                        </thead>
                    <tbody>
                    @foreach($grupos as $cat)
                        <tr><td>{{ $cat->nombre }}</td><td>{{ $cat->fecha }}</td><td>{{ $cat->visible }}</td></tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>

        <div class="row">
        <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        Documentos de estrado
                    </div>
                <div class="card-body">
                    <div class="text-justify-right" style="width:100%; text-align:right;">
                        <a href="{{route ('docEstrado')}}" class="btn btn-sm btn-primary">Documentos de estrado</a>
                    </div>
                    <br>
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th>Titulo</th>
                        <th>Fecha Documento</th>
                        <th>Visible</th>
                        </tr>
                        </thead>
                    <tbody>
                    @foreach($docs as $cat)
                        <tr><td>{{ $cat->nombre }}</td><td>{{ $cat->fechaDocumento }}</td><td>{{ $cat->visible }}</td></tr>
                    @endforeach
                    </tbody>
                    </table>
                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;
