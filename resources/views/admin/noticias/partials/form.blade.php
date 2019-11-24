{{  Form::hidden('id_user', auth()->user()->id)}}

<div class="form-group">

    {{ Form::label('titulo', 'Titulo de la noticia') }}
    {{ Form::text('titulo', null, ['class' => 'form-control', 'id' => 'titulo']) }}
</div>

<div class="form-group">

    {{ Form::label('slug', 'URL Amigable') }}
    {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>

<div class="form-group">

    {{ Form::label('id_categoria', 'Categorias') }}
    {{ Form::select('id_categoria', $categorias,  null, ['class' => 'form-control']) }}
</div>

<div class="form-group">

    {{ Form::label('img', 'Imagen') }}
    {{ Form::file('img', ['class' => 'form-control' ]) }}
</div>

<div class="form-group">
    {{ Form::label('estado', 'Estado de la noticia') }}
    <br>
    <label>
    {{ Form::radio('estado', 'PUBLICADO') }} Publicado
    </label>
    <label>
    {{ Form::radio('estado', 'BORRADOR') }} Borrador
    </label>

</div>
<div class="form-group">
    {{ Form::label('extracto', 'Extracto de la noticia (resumen)') }}
    <br>
    {{ Form::textarea('extracto', null, ['id' => 'extracto', 'rows'=>2]) }}
</div>
<div class="form-group">

    {{ Form::label('body', 'Cuerpo de la noticia') }}
    {{ Form::textarea('body', null, ['id' => 'body']) }}
</div>
<div class="form-group">

    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
    <a class="btn btn-warning btn-sm"  href="{{ url('adm/adminnoticias') }}">Cancelar</a>
</div>

@section('scripts')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
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

        });




        </script>
@endsection
