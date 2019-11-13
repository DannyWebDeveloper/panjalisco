@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Bienvenido a la administración del sitio</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <img src="{{ asset('img/logo.JPG') }}" width="300">

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
