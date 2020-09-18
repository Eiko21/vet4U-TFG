@extends('layouts.app')

@section('csslinks')
    <link href="{{ asset('css/responsive-design/loginPageStyle.css') }}" rel="stylesheet">
@endsection

@section('content')
<div class="container">
    <div class="title m-b-md">VetForU</div>

    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group row1">
                <label id="emailabel" for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" value="veterinario@gmail.com"
                        class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row2">
                <label id="passwdLabel" for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" value="soyvet"
                        class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-0">
                <div id="div-signIn-register" class="col-md-8 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Iniciar sesión') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
    <div id="registerLink" class="form-group row">
        <label class="form-check-label" for="remember">
            ¿No tienes una cuenta? Regístrate <a href="{{ route('register') }}">aquí</a>
        </label>
    </div>
</div>
@endsection
