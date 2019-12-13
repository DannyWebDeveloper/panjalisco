{{  Form::hidden('id_user', auth()->user()->id)}}
<div class="form-group">
        {{ Form::label('nivel', 'Nivel de extrado') }}
        {!! Form::select('nivel', [1 => 'Categoria', 2 => 'Subcategoria', 3 => 'Grupo'], $nivel,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
</div>

<div class="form-group" id="categoria">
    @if(isset($id))
        {{ Form::label('id_categoria', 'Categoria padre') }}
        {!! Form::select('id_categoria', $categorias, $id,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
    @else
    {{ Form::label('id_categoria', 'Categoria padre') }}
        {!! Form::select('id_categoria', $categorias, null,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
    @endif

</div>
<div class="form-group" id="subcategoria">
    @if(isset($id))
        {{ Form::label('id_subcategoria', 'Categoria hijo') }}
        {!! Form::select('id_subcategoria', $subcategorias, $id,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
    @else
        {{ Form::label('id_categoria', 'Categoria hijo') }}
        {!! Form::select('id_subcategoria', $subcategorias, null,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
    @endif
</div>
<div class="form-group" id="grupo">
    @if(isset($id))
        {{ Form::label('id_grupo', 'Grupo') }}
        {!! Form::select('id_grupo', $grupos, $id,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
    @else
        {{ Form::label('id_grupo', 'Grupo') }}
        {!! Form::select('id_grupo', $grupos, null,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
    @endif

</div>

<div class="form-group">
    {{ Form::label('nombre', 'titulo del documento') }}
    {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
</div>
<div class="form-group">
    {{ Form::label('documento', 'Documento') }}
    {{ Form::file('documento', ['class' => 'form-control' ]) }}
    <br>
    @if(isset($doc))
    <b>Actual documento: </b>
    <a>{{ $doc->documento }}</a>
    @endif
</div>

<div class="form-group">
@if(isset($documento))
        {{ Form::label('visible', 'Visibilidad') }}
        {!! Form::select('visible',['1' => 'Visible','0'=>'No visible'], null,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
    @else
        {{ Form::label('visible', 'Visibilidad') }}
        {!! Form::select('visible',['1' => 'Visible','0'=>'No visible'], 1,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
    @endif
</div>
<div class="form-group row">
    <div class="col-sm-6">
       {{ Form::label('fechaDocumento', 'Fecha de documento') }}
       {{ Form::text('fechaDocumento', null,  ['class' => 'form-control datepicker' ]) }}
    </div>
    <div class="col-sm-6">
       {{ Form::label('fechaUpdate', 'Fecha de actualización') }}
       {{ Form::text('fechaUpdate', null,  ['class' => 'form-control datepicker' ]) }}
    </div>
</div>
<div class="form-group">

    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
    <a class="btn btn-warning btn-sm"  href="{{ url('adm/adminestrados') }}">Cancelar</a>
</div>
@section('scripts')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script>
        jQuery(function($){

            var nivel = $("#nivel").val();
                    if(nivel == 1){
                        $("#categoria").show();
                        $("#subcategoria").hide();
                        $("#grupo").hide();
                    }
                    else if(nivel == 2){
                        $("#categoria").hide();
                        $("#subcategoria").show();
                        $("#grupo").hide();
                    }
                    else if(nivel == 3){
                        $("#categoria").hide();
                        $("#subcategoria").hide();
                        $("#grupo").show();
                    }
                    else{
                        $("#categoria").hide();
                        $("#subcategoria").hide();
                        $("#grupo").hide();
                    }
                $("#nivel").change(function(){
                    var nivel = $("#nivel").val();
                    if(nivel == 1){
                        $("#categoria").show();
                        $("#subcategoria").hide();
                        $("#grupo").hide();
                    }
                    if(nivel == 2){
                        $("#categoria").hide();
                        $("#subcategoria").show();
                        $("#grupo").hide();
                    }
                    if(nivel == 3){
                        $("#categoria").hide();
                        $("#subcategoria").hide();
                        $("#grupo").show();
                    }
                });

            // $( ".datepicker" ).focus(function(){
                $( ".datepicker" ).datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: 'yy-mm-dd'
                });
            //});
            $('input').attr('autocomplete','off');
        });
    </script>
@endsection
