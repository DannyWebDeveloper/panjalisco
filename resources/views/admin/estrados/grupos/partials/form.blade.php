{{  Form::hidden('id_user', auth()->user()->id)}}

<div class="form-group">
        {{ Form::label('id_subcategoria', 'Sub Categoria') }}
        {!! Form::select('id_subcategoria', $subcategorias, null,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
</div>
<div class="form-group">

    {{ Form::label('nombre', 'Nombre del grupo') }}
    {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
</div>
<div class="form-group">
    {{ Form::label('texto', 'Texto del grupo') }}
    {{ Form::text('texto', null, ['class' => 'form-control', 'id' => 'texto']) }}
</div>
<div class="form-group">
    @if(isset($grupo))
        {{ Form::label('visible', 'Visibilidad') }}
        {!! Form::select('visible',['1' => 'Visible','0'=>'No visible'], null,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
    @else
        {{ Form::label('visible', 'Visibilidad') }}
        {!! Form::select('visible',['1' => 'Visible','0'=>'No visible'], 1,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
    @endif
</div>
<div class="form-group">
       {{ Form::label('fecha', 'Fecha') }}
       {{ Form::text('fecha', null,  ['class' => 'form-control datepicker' ]) }}
</div>
<div class="form-group">

    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
    <a class="btn btn-warning btn-sm"  href="{{ url('adm/adminestrados/grupos') }}">Cancelar</a>
</div>

@section('scripts')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script>
        jQuery(function($){
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
