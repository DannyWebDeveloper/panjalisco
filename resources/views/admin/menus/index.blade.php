<!-- create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
                <div class="card card-default">
                    <div class="card-header">
                        Lista de menus
                        <a href="{{route('adminmenus.create')}}" class="btn btn-sm btn-primary right"> Crear</a>
                    </div>

                <div class="card-body">
                    <table class="table table-striped table-hover">
                        <thead>
                        <tr>
                        <th width="10px">ID</th>
                        <th>Nombre</th>
                        <th>Nivel</th>
                        <th>URL</th>
                        <th colspan="3">&nbsp;</th>
                        </tr>
                        </thead>
                        <tbody>
                            @foreach($menus as $menu)
                            <tr>
                                <td>{{ $menu->id }}</td>
                                <td> {{ $menu->nombre }}</td>
                                <td> {{ $menu->nivel }}</td>
                               <td>
                                @if($menu->id_pagina)
                                    @foreach($slugs as $slug)
                                        @if($slug->id == $menu->id)
                                            {{ $slug->slug }}
                                        @endif
                                    @endforeach
                                @else
                                    {{ $menu->link_externo }}
                                @endif
                               </td>
                               <td width ="10px">
                                <a href="{{ route('adminmenus.show', $menu->id) }}" class="btn">
                                    ver
                                </a>
                                </td>
                                <td width ="10px">
                                <a href="{{ route('adminmenus.edit', $menu->id) }}" class="btn">
                                    Editar
                                </a>
                                </td>
                                <td width ="10px">
                                    {!! Form::open(['route' => ['adminmenus.destroy', $menu->id], 'method' => 'DELETE']) !!}
                                        <button class="btn btn-sm btn-danger">Eliminar</button>
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
            </div>
        </div>
    </div>
@endsection;
