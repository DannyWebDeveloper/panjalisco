{{  Form::hidden('id_user', auth()->user()->id)}}
<div class="form-group">
{{ Form::label('Id_Parrafo', 'Parrafo') }}
{{ Form::select('Id_Parrafo', $parrafos, $inciso->Id_Parrafo, ['class' => 'form-control']) }}
</div>

<div class="form-group">
    {{ Form::label('Numero_Letra_Inciso', 'Número o Letra de inciso') }}
    {{ Form::text('Numero_Letra_Inciso', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
    {{ Form::label('Titulo', 'Título del inciso') }}
    {{ Form::text('Titulo', $inciso->Titulo, ['class' => 'form-control']) }}
</div>
<div class="form-group">

    {{ Form::label('Texto', 'Texto') }}
    {{ Form::text('Texto', $inciso->Texto, ['class' => 'form-control']) }}
</div>

<div class="form-group">
       {{ Form::label('Visible', 'Visibilidad') }}
       {!! Form::select('Visible',['1' => 'Visible','0'=>'No visible'],$inciso->Visible,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
</div>
<div class="form-group">
       {{ Form::label('Orden', 'Orden') }}
       {{ Form::text('Orden', $inciso->Orden, ['class' => 'form-control']) }}
</div>
<div class="form-group">

    {{ Form::label('Fecha', 'Fecha de actualización') }}
    {{ Form::text('Fecha', $inciso->Fecha,  ['class' => 'form-control datepicker' ]) }}
</div>

<div class="form-group">

    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
    <a class="btn btn-warning btn-sm"  href="{{ url('adm/admintransparencia/incisos') }}">Cancelar</a>
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
