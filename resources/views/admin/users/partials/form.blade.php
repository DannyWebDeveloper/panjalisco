{{  Form::hidden('id_user', auth()->user()->id)}}

<div class="form-group">
    {{ Form::label('name', 'Nombre del usuario') }}
    {{ Form::text('name', null, ['class' => 'form-control', 'required' => 'required']) }}
</div>
<div class="form-group">
    {{ Form::label('email', 'Email de usuario') }}
    {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) }}
    @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    {{ Form::label('password', 'Contraseña') }}
    {{ Form::password('password',  ['class' => 'form-control']) }}
    <!-- <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
    -->
    @error('password')
        <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
<div class="form-group">
    {{ Form::label('password_confirmation', 'Confirmar contraseña') }}
    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"  autocomplete="new-password">
</div>


<div class="form-group">
    {{ Form::label('estatus', 'Estado del usuario') }}
    <br>
    <label>
    {{ Form::radio('estatus', 1) }} Activo
    </label>
    <label>
    {{ Form::radio('estatus', 0) }} Desactivado
    </label>

</div>

<div class="form-group">
    {{ Form::submit('Guardar', ['class' => 'btn btn-sm btn-primary']) }}
    <a class="btn btn-warning btn-sm"  href="{{ url('adm/adminusers') }}">Cancelar</a>

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
