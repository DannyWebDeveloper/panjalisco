{{  Form::hidden('id_user', auth()->user()->id)}}

<div class="form-group">

    {{ Form::label('nombre', 'Nombre del menu') }}
    {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
</div>

<div class="form-group">
    {{ Form::label('nivel', 'Nivel del menú') }}

    @if(!Request::is('*/adminmenus/*/edit'))
        {!! Form::select('nivel',['Padre' => 'Padre', 'Hijo'=>'Hijo'],'',['class'=>'form-control', 'id'=>'nivel']) !!}
    @else
    {!! Form::select('nivel',['Padre' => 'Padre', 'Hijo'=>'Hijo'],$menu->id_nivel,['class'=>'form-control', 'id'=>'nivel']) !!}
    @endif
</div>

@if(!Request::is('*/adminmenus/*/edit'))
<div class="form-group" id="sub-nivel"   style="display:none;">
    {{ Form::label('id_padre', 'Menú padre') }}
    {!! Form::select('id_padre', $menus_padre, '',['class'=>'form-control','placeholder'=>'Seleccione el menu padre']) !!}
</div>
@else
<div class="form-group" id="sub-nivel">
    {{ Form::label('id_padre', 'Menú padre') }}
    {!! Form::select('id_padre', $menus_padre, $menu->id_padre,['class'=>'form-control','placeholder'=>'Seleccione el menu padre']) !!}
</div>
@endif

<div class="form-group">
    {{ Form::label('id_pagina', 'Página interna') }}

    @if(Request::is('*/adminmenus/*/edit'))

        @if($menu->id_pagina)
            {{ Form::select('id_pagina', $paginas, $menu->id_pagina, ['class' => 'form-control', 'placeholder'=>'Seleccione la página' ]) }}
        @else
        {{ Form::select('id_pagina', $paginas, '', ['class' => 'form-control', 'placeholder'=>'Seleccione la página' ]) }}
        @endif

    @else
    {{ Form::select('id_pagina', $paginas, '', ['class' => 'form-control', 'placeholder'=>'Seleccione la página' ]) }}
    @endif
</div>

<div class="form-group">
    {{ Form::label('link_externo', 'URL externa') }}
    {{ Form::text('link_externo', null, ['class' => 'form-control', 'id' => 'link_externo']) }}
</div>

<div class="form-group">
    {{ Form::label('estado', 'Estado del menú') }}
    <br>
    <label>
    {{ Form::radio('estado', 'PUBLICADO') }} Activo
    </label>
    <label>
    {{ Form::radio('estado', 'BORRADOR') }} Borrador
    </label>
</div>
    {{ Form::hidden('orden', 0) }}
<div class="form-group text-right">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
    <a class="btn btn-warning btn-sm"  href="{{ url('adm/adminmenus') }}">Cancelar</a>
</div>

@section('scripts')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script  src="{{ asset('vendor/stringToSlug/src/jquery.stringtoslug.js') }}"></script>
    <script  src="{{ asset('vendor/stringToSlug/src/speakingurl.min.js') }}"></script>

    <script src="{{ asset('vendor/ckeditor/ckeditor.js') }}" defer></script>


    <script>


        jQuery(function($){

            //click, para ver opciones de un archivo, en editar pagina
            $(".ver").click(function () {
                $( this ).next( ".filei" ).css( "display", "block" );
            });

            $('input').attr('autocomplete','off');

            //select hijo and show padres
            $("#nivel").change(function(){
                if($(this).val() == "Hijo"){
                $("#sub-nivel").show();
                }else{
                $("#sub-nivel").hide();
                $("#id_padre").val('');
                }

            });
    });




        </script>
@endsection
