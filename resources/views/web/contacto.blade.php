@extends('layouts.header')
  <div class="container main">
    <h1>Contácto</h1>
@if(session('info'))
<div class="row">
    <div class="col-md-8 col-offset-2">
        <div class="alert alert-success">
            {{ session('info') }}
        </div>
    </div>
</div>
@endif
@if(count($errors))
    <div class="row">
                        <div class="col-md-8 col-offset-2">
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                @endforeach

                            </div>
                        </div>
                    </div>
@endif

<div class="row">
    <div class="col-md-8 col-offset-2">
    {!! Form::open(['route' => 'send-contacto', 'files' => true]) !!}
    <div class="form-group">
        {{ Form::label('name', 'Nombre') }}
        {{ Form::text('name', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('email', 'Correo electrónico') }}
        {{ Form::text('email', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
        {{ Form::label('telefono', 'Teléfono') }}
        {{ Form::text('telefono', null, ['class' => 'form-control']) }}
    </div>

    <div class="form-group">
    {{ Form::label('msg', 'Mensaje') }}
    {{ Form::textarea('msg', null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group">

    {{ Form::submit('Enviar', ['class' => 'btn btn-md btn-primary']) }}
    </div>


    {!! Form::close() !!}

</div>
</div>
</div>


@extends('layouts.footer')
