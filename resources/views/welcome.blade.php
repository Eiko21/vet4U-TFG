<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>VetForU</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <!-- Styles -->
        <link href="{{ asset('css/responsive-design/welcomeStyle.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="content">
            <div class="title m-b-md">
                VetForU
            </div>
            <div class="links">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <form action="{{ route('login') }}" method="get">
                            @csrf
                            <input type="submit" class="loginbtn" value="Iniciar sesión">
                        </form>
                        <form action="{{ route('register') }}" method="get">
                            @csrf
                            <input type="submit" class="registerbtn" value="Registrarse">
                        </form>
                    @endauth
                @endif
            </div>
            <div class="principalImage">
                <img src="{{ asset('principalimg/petsImage.png') }}">
            </div>
        </div>
    </body>
</html>
