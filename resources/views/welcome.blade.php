<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>VetForU</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        
        <!-- Styles -->
        <link href="{{ asset('css/welcomeStyle.css') }}" rel="stylesheet">
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            
                <div class="top-right links">
                    
                    
                </div>
            

            <div class="content">
                <div class="title m-b-md">
                    Vet<p class="titleFor">For</p>U
                </div>

                <div class="links">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ url('/home') }}">Home</a>
                        @else
                            <a id='login' href="{{ route('login') }}"><p>Iniciar sesión</p></a>
                            <a id='register' href="{{ route('register') }}">Registrarse</a>
                        @endauth
                    @endif
                </div>
            <div class="principalImage">
                <img src="{{ asset('principalimg/petsImage.png') }}">
            </div>
            </div>
        </div>
    </body>
</html>
