{{  Form::hidden('id_user', auth()->user()->id)}}

<div class="form-group">

    {{ Form::label('titulo', 'Titulo de la pagina') }}
    {{ Form::text('titulo', null, ['class' => 'form-control', 'id' => 'titulo']) }}
</div>

<div class="form-group">

    {{ Form::label('slug', 'URL Amigable') }}
    {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>

<div class="form-group">

    {{ Form::label('img', 'Imagen') }}
    {{ Form::file('img', ['class' => 'form-control' ]) }}
</div>

<div class="form-group">
    {{ Form::label('estado', 'Estado de la pagina') }}
    <br>
    <label>
    {{ Form::radio('estado', 'PUBLICADO') }} Publicada
    </label>
    <label>
    {{ Form::radio('estado', 'BORRADOR') }} Borrador
    </label>

</div>
<div class="form-group">

    {{ Form::label('body', 'Cuerpo de la pagina') }}
    {{ Form::textarea('body', null, ['id' => 'body']) }}
</div>
<div class="form-group">
    {{ Form::label('has_file', 'Esta página mostrará archivos') }}
    {{Form::checkbox("has_file","SI",false, ["class" => "form-group"])}}
</div>

<div class="form-group">
Archivos (can attach more than one): <br>
<input multiple="multiple" name="archivos[]" type="file">
</div>


<div class="form-group">

    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
    <a class="btn btn-warning btn-sm"  href="{{ url('adm/adminpaginas') }}">Cancelar</a>
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

            $("#titulo, #slug").stringToSlug({
                callback: function(text){
                    $("#slug").val(text);
                }
            });

            CKEDITOR.replace( 'body', {
                filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                filebrowserUploadMethod: 'form'
            });

            //click, para ver opciones de un archivo, en editar pagina
            $(".ver").click(function () {
                $( this ).next( ".filei" ).css( "display", "block" );
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
