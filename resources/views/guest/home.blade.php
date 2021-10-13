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

        <div class="container">

            <div class="row">

                <div class="col-lg-12 col-sm-12 col-12 main-section">

                    <div class="dropdown">

                        <button type="button" class="btn btn-info" data-toggle="dropdown">

                            <i class="fa fa-shopping-cart" aria-hidden="true"></i> Cart 
                            @if(count((array) session('cart')) > 0)
                            <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>
                            @endif

                        </button>

                        <div class="dropdown-menu">

                            <div class="row total-header-section">

                                <div class="col-lg-6 col-sm-6 col-6">

                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> <span class="badge badge-pill badge-danger">{{ count((array) session('cart')) }}</span>

                                </div>

                                @php $total = 0 @endphp

                                @foreach((array) session('cart') as $id => $details)

                                    @php $total += $details['price'] * $details['quantity'] @endphp

                                @endforeach

                                <div class="col-lg-6 col-sm-6 col-6 total-section text-right">

                                    <p>Total: <span class="text-info">$ {{ $total }}</span></p>

                                </div>

                            </div>

                            @if(session('cart'))

                                @foreach(session('cart') as $id => $details)

                                    <div class="row cart-detail">

                                        <div class="col-lg-4 col-sm-4 col-4 cart-detail-img">

                                            <img src="{{ $details['image'] }}" />

                                        </div>

                                        <div class="col-lg-8 col-sm-8 col-8 cart-detail-product">

                                            <p>{{ $details['name'] }}</p>

                                            <span class="price text-info"> ${{ $details['price'] }}</span> <span class="count"> Quantity:{{ $details['quantity'] }}</span>

                                        </div>

                                    </div>

                                @endforeach

                            @endif

                            @if((array) session('cart'))
                            <div class="row">

                                <div class="col-lg-12 col-sm-12 col-12 text-center checkout">

                                    <a href="{{ route('cart') }}" class="btn btn-primary btn-block">View all</a>
                                    <a href="#" class="btn btn-success btn-block">Checkout</a>

                                </div>

                            </div>
                            @endif

                        </div>

                    </div>

                </div>

            </div>

        </div>

        
        


        <!-- QUI INIZIA LA PARTE PER IL LOGIN -->
        <ul>
            @guest
            <li class="d-inline-block dropdown">
                <a class="nav-link" href="{{ route('login') }}">
                    Sei un ristorante?
                </a>

                @if (Route::has('register'))
                    <li class="d-inline-block">
                        <a class="nav-link text-white" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif

            @else
                <li class="d-inline-block dropdown">
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
                    </div>
                </li>
            @endguest
    </div>
    
    <div id="root">
    </div>
    
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>