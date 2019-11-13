{{  Form::hidden('id_user', auth()->user()->id)}}

<div class="form-group">

    {{ Form::label('nombre', 'Nombre del slider') }}
    {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
</div>

<div class="form-group">


    {{ Form::label('img', 'Imagen') }}
    {{ Form::file('img', ['class' => 'form-control' ]) }}
</div>

<div class="form-group">

    {{ Form::label('descripcion', 'Descrpción que llevará el slider') }}
    {{ Form::textarea('descripcion', null, ['class' => 'form-control', 'id' => 'descripcion']) }}
</div>

<div class="form-group">

    {{ Form::label('link', 'Link del slider') }}
    {{ Form::text('link', null, ['class' => 'form-control', 'id' => 'link']) }}
</div>


<div class="form-group">
    {{ Form::label('estado', 'Estado del slider') }}
    <br>
    <label>
    {{ Form::radio('estado', 'PUBLICADO') }} Publicado
    </label>
    <label>
    {{ Form::radio('estado', 'BORRADOR') }} Borrador
    </label>

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
            $('input').attr('autocomplete','off');
        });
    </script>
@endsection
