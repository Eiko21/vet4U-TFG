<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Vet4U</title>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/layoutBasicStyle.css') }}" rel="stylesheet">

    <!-- Libraries -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" 
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    @yield('styles')

</head>
<body>
    <header id='section-nav'>
        <nav id='home-nav'>
            <div class="title m-b-md">
                <a id="homelink" href="{{ route('home') }}">Vet<p class="titleFor">For</p>U</a>
            </div>
            <div id="spacer"></div>
            <div class="user-name">{{ Auth::user()->nombre }}</div>
            <div id="logout-div" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">{{ __('Cerrar sesión') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
            @if (Auth::user()->idRol == 2)
                <div id="export-div" class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('exports') }}">{{ __('Exportar datos') }}</a>

                </div>
                <div id="import-div">
                    <a class="dropdown-item" href="{{ route('imports') }}">{{ __('Importar datos') }}</a>
                </div>
            @endif
        </nav>
    </header>
    <section id="section-body">
        @yield('content')
    </section>
    <footer>
        <p>©Vet4U 2020</p>
    </footer>
</body>
</html>