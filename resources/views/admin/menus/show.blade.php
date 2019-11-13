@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-offset-2">
                <div class="card card-default">
                    <div class="card-header">
                            Ver Menú
                    </div>

                <div class="card-body">
                    <p><strong>Nombre</strong> {{ $menu->nombre }} </p>

                    @if($menu->id_pagina > 0)
                    <p><strong>Enlace</strong> {{ $slug_menu[0]->slug }} </p>
                    @else
                    <p><strong>Enlace</strong> {{ $menu->link_externo }} </p>
                    @endif
                    <br>

                    @if(count($submenus) > 0)
                    <h3>Submenus derivados</h3>
                    @endif
                    {!! Form::open(['route' => 'reorder-menu']) !!}
                    <table class="table">
                        <thead>
                            <tr><th>Nombre</th><th>URL</th><th style="width:50px;">Orden</th> </tr>
                        </thead>
                        <tbody>

                    @foreach($submenus as $sub)
                        <tr>
                            <td>
                            {{ $sub->nombre}}
                            </td>
                            <td>
                        @if($sub->id_pagina > 0)

                            @foreach($slug_submenu as $slu_sub  )
                                    {{ $slu_sub->slug }}
                            @endforeach
                        @else
                          {{ $sub->link_externo }}
                        @endif
                            </td>
                            <td>
                                {{ Form::text($sub->id, $sub->orden, ['class' => 'form-control input-sm', 'id' => 'orden' ]) }}
                            </td>
                        </tr>
                    @endforeach
                            <tr>
                                 <td colspan="2"></td>
                                 <td>
                                 {{ Form::hidden('rows', count($submenus)) }}
                                 {{ Form::submit('Reordenar ', ['class' => 'btn btn-primary']) }}
                                 </td>
                            </tr>

                        </tbody>
                    </table>

                    {!! Form::close() !!}
                    <br>

                 </div>
            </div>
            </div>
        </div>
    </div>
@endsection
