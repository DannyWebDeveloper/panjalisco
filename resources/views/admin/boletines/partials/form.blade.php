{{  Form::hidden('id_user', auth()->user()->id)}}

<div class="form-group">

    {{ Form::label('titulo', 'Titulo del boletin') }}
    {{ Form::text('titulo', null, ['class' => 'form-control', 'id' => 'nombre']) }}
</div>

<div class="form-group">
    {{ Form::label('documento', 'Documento') }}
    {{ Form::file('documento', ['class' => 'form-control' ]) }}
    <br>
    @if(isset($boletin))
    <b>Actual documento: </b>
    <a>{{ $boletin->documento }}</a>
    @endif
</div>

<div class="form-group">
        {{ Form::label('visible', 'Visibilidad') }}
        {!! Form::select('visible',['1' => 'Visible','0'=>'No visible'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
</div>
<div class="form-group">
       {{ Form::label('fecha', 'Fecha de boleitn') }}
       {{ Form::text('fecha', null,  ['class' => 'form-control datepicker' ]) }}
</div>
<div class="form-group">

    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
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
