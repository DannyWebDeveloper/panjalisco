@extends('layouts.app')
@section('content')
<link rel="stylesheet" href="{!! asset('css/pagina.css') !!}">

    <div class="container justity-center">
        <div class="row">
            <div class="col-md-10 col-offset-2">
                <div class="card card-default">
                    <div class="card-header">
                            Editar Menu
                    </div>

                <div class="card-body">
                    {!! Form::model($menu, ['route' => ['adminmenus.update', $menu->id], 'method' => 'PUT', 'files' => true]) !!}
                        {{  Form::hidden('id', $menu->id)}}
                        @include('admin.menus.partials.form')
                    {!! Form::close() !!}

                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;


