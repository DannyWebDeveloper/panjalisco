{{  Form::hidden('id_user', auth()->user()->id)}}

<div class="form-group row">
  <div class="col-sm-4">
    {{ Form::label('nombre', 'Nombre del integrante') }}
    {{ Form::text('nombre', null, ['class' => 'form-control']) }}
  </div>
  <div class="col-sm-4">
    {{ Form::label('p_apellido', 'Primer apellido') }}
    {{ Form::text('p_apellido', null, ['class' => 'form-control']) }}
  </div>
  <div class="col-sm-4">
    {{ Form::label('s_apellido', 'Segundo apellido') }}
    {{ Form::text('s_apellido', null, ['class' => 'form-control']) }}
  </div>
</div>
<div class="form-group row">
    <div class="col-sm-4">
    {{ Form::label('telefono', 'Telefono') }}
    {{ Form::text('telefono', null, ['class' => 'form-control', 'maxlength' => 10 ]) }}
    </div>
    <div class="col-sm-4">
    {{ Form::label('ext', 'Extensión') }}
    {{ Form::text('ext', null, ['class' => 'form-control', 'maxlength' => 10 ]) }}
    </div>
    <div class="col-sm-4">
    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', null, ['class' => 'form-control', ]) }}
    </div>
</div>

<div class="form-group row">
<div class="col-sm-6">
    {{ Form::label('area', 'Área') }}
    {{ Form::text('area', null, ['class' => 'form-control']) }}
</div>
<div class="col-sm-6">
        {{ Form::label('titular', 'Titular del área') }}
        {!! Form::select('titular',['NO' => 'No','SI'=>'Si, es titular'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
</div>
</div>
<div class="form-group">
    {{ Form::label('cargo', 'Cargo') }}
    {{ Form::text('cargo', null, ['class' => 'form-control']) }}
</div>
<div class="form-group">
        {{ Form::label('visible', 'Visibilidad') }}
        {!! Form::select('visible',['1' => 'Visible','0'=>'No visible'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
</div>

<div class="form-group">

    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
    <a class="btn btn-warning btn-sm"  href="{{ url('adm/admindirectorio') }}">Cancelar</a>
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
