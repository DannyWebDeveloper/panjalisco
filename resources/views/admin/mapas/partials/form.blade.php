{{  Form::hidden('id_user', auth()->user()->id)}}

<div class="form-group">
        {{ Form::label('tipo', 'Visibilidad') }}
        {!! Form::select('tipo',['jalisco' => 'Jalisco','diputados'=>'Diputados'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
</div>


<div class="form-group">

    {{ Form::label('img', 'Imagen') }}
    {{ Form::file('img', ['class' => 'form-control' ]) }}
    @if(isset($mapa->img))
                    <img src="{{asset($mapa->img)}}" width="40"><br>
                    @endif
</div>

<div class="form-group">

    {{ Form::label('link', 'Link del perfil de la red') }}
    {{ Form::text('link', null, ['class' => 'form-control', 'id' => 'link']) }}
</div>

<div class="form-group">
        {{ Form::label('visible', 'Visibilidad') }}
        {!! Form::select('visible',['1' => 'Visible','0'=>'No visible'],null,['class'=>'form-control','placeholder'=>'Seleccione una opcion']) !!}
</div>


<div class="form-group">

    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
    <a class="btn btn-warning btn-sm"  href="{{ url('adm/adminmapas') }}">Cancelar</a>
</div>

@section('scripts')
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


    <script>
        jQuery(function($){
            $('input').attr('autocomplete','off');
        });
    </script>
@endsection
