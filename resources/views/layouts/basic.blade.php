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
    <link href="{{ asset('css/basicStyle.css') }}" rel="stylesheet">

</head>
<body>
    <header id='section-nav'>
        <nav id='home-nav'>
            <div class="title m-b-md">
                Vet<p class="titleFor">For</p>U
            </div>
            <div id="spacer"></div>
            <div class="user-name">{{ Auth::user()->nombre }}</div>
        </nav>
    </header>
    <section id="section-body">
        @yield('content')
    </section>
    <footer></footer>
</body>
</html>