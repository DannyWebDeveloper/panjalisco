{{  Form::hidden('id', $categoria->id)}}

<div class="form-group">

    {{ Form::label('nombre', 'Nombre de la categoria') }}
    {{ Form::text('nombre', null, ['class' => 'form-control', 'id' => 'nombre']) }}
</div>

<div class="form-group">

    {{ Form::label('slug', 'URL Amigable') }}
    {{ Form::text('slug', null, ['class' => 'form-control', 'id' => 'slug']) }}
</div>
<div class="form-group">

    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
</div>

@section('scripts')
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script  src="{{ asset('vendor/stringToSlug/src/jquery.stringtoslug.js') }}"></script>
    <script  src="{{ asset('vendor/stringToSlug/src/speakingurl.min.js') }}"></script>
    <script>
        jQuery(function($){

            $("#nombre, #slug").stringToSlug({
                callback: function(text){
                    $("#slug").val(text);
                }
            })


        });

        </script>
@endsection
