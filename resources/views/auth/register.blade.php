@extends('layouts.app')

@section('csslinks')
    <link href="{{ asset('css/responsive-design/registerPageStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="title m-b-md">Vet4U</div>

    <div class="card-body">
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div class="form-group row2">
                <label for="idRol" class="col-md-4 col-form-label text-md-right">{{ __('Tipo de perfil') }}</label>

                <div class="col-md-6">
                    <input id="idRol" type="radio" class="form-control @error('idRol') is-invalid @enderror" name="idRol" 
                        value="3" autocomplete="idRol" autofocus>Dueño de mascota
                    <input id="idRol" type="radio" class="form-control @error('idRol') is-invalid @enderror" name="idRol" 
                        value="2" autocomplete="idRol" autofocus>Veterinario

                    @error('idRol')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <script>
                $(function() {
                    $('div[id="surname-section"]').hide();
                    $('input[id="idRol"]').click(function() {
                        $(this).val() === '3' ? $('div[id="surname-section"]').show() : $('div[id="surname-section"]').hide();
                    });
                });
            </script>
            
            <div class="form-group row1">
                <label for="nombre" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>

                <div class="col-md-6">
                    <input id="nombre" type="text" class="form-control @error('nombre') is-invalid @enderror" name="nombre" value="{{ old('nombre') }}" required autocomplete="nombre" autofocus>

                    @error('nombre')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row2" id="surname-section">
                <label for="apellidos" class="col-md-4 col-form-label text-md-right">{{ __('Apellidos') }}</label>

                <div class="col-md-6">
                    <input id="apellidos" type="text" class="form-control @error('apellidos') is-invalid @enderror" name="apellidos" value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>

                    @error('apellidos')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            
            <div class="form-group row2">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row2">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row2">
                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmar contraseña') }}</label>

                <div class="col-md-6">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>

            <div class="form-group row mb-0">
                <div id="div-signIn-register" class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Registrarse') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
