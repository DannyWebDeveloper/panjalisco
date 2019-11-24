{{  Form::hidden('id_user', auth()->user()->id)}}
<div class="form-group">
                    {{ Form::label('Numero', 'Número') }}
                    {{ Form::text('Numero', $articulo->Numero, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                    {{ Form::label('titulo', 'Titulo') }}
                    {{ Form::text('Titulo', $articulo->Titulo, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                    {{ Form::label('Texto', 'Texto') }}
                    {{ Form::text('Texto', $articulo->Texto, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                    {{ Form::label('Visible', 'Visibilidad') }}
                    {!! Form::select('Visible',['1' => 'Visible','0'=>'No visible'],$articulo->Visible,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
                    </div>
                    <div class="form-group">
                    {{ Form::label('Orden', 'Orden') }}
                    {{ Form::text('Orden', $articulo->Orden, ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group text-right">
                        {{ Form::submit('Guardar', ['class' => 'btn btn-bg btn-primary']) }}
                        <a class="btn btn-warning btn-sm"  href="{{ url('adm/admintransparencia/articulos') }}">Cancelar</a>
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
