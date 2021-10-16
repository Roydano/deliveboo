<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    
    <div id="jumbo" class="fixed-top text-uppercase text-right">

        
        <!-- QUI INIZIA LA PARTE PER IL LOGIN -->
        <ul class="d-inline">
            @guest
            <li class="d-inline-block dropdown">
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    Sei un ristorante?
                </a>

                <div class="dropdown-menu dropdown-menu-right text-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('login') }}">{{ __('Login') }}</a>

                    @if (Route::has('register'))
                        <a class="dropdown-item" href="{{ route('register') }}">{{('Register') }}</a>
                    @endif
                </div>
            </li>
            @endguest
                
            @auth
                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                    {{ Auth::user()->restaurant->name }}
                </a>

                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                    <a class="dropdown-item" href="{{ route('admin.index') }}">la tua area</a>
                </div>
            @endauth
                
    </div>
    
    <div id="root">
    </div>
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>