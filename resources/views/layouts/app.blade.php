<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gold Center</title>
    <link rel="shortcut icon" href="{{ asset('admin/assets/images/favicon.ico') }}" type="image/x-icon">
    <!-- Scripts -->
{{--    <script src="{{ asset('js/app.js') }}"></script>--}}

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <link href="{{ asset('lib/css/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
          integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
{{--    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css">--}}
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">--}}
{{--    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">--}}
{{--    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>--}}
{{--    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>--}}
    <!-- Styles -->
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{asset('slick/slick.css')}}">

    <link rel="stylesheet" href="{{asset('slick/slick-theme.css')}}">
    <link href="{{ asset('css/mobile.css') }}?v=456" rel="stylesheet">
    <script src="{{ asset('/admin/assets/plugins/jquery/jquery-min.js') }}"></script>
    <link href="{{ asset('css/lib.css') }}?v=456" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}?v=456" rel="stylesheet">
    <link href="{{ asset('css/fix.css') }}?v=456" rel="stylesheet">


</head>
<body>
<input type="hidden" value="{{ route("home") }}" id="get-app-url">
<input type="hidden" value="{{ route("chartAjaxRequest.post") }}" id="get-home-url">
<input type="hidden" value="{{ route("ajaxRequest.getChart") }}" id="get-chart-url">
<input type="hidden" value="{{ route("ajaxRequest.getChartGlobal") }}" id="get-chart-global-url">
<input type="hidden" value="{{ route("ajaxRequest.getLogin") }}" id="get-login-url">
<input type="hidden" value="{{ route("ajaxRequest.getReg") }}" id="get-reg-url">
<input type="hidden" value="{{ route("favoriteAjax.post") }}" id="get-fav-url">
<input type="hidden" value="{{ route("filterAjax.post") }}" id="get-filter">
<input type="hidden" value="{{ route("watchFilter.post") }}" id="watch-filter">
<input type="hidden" value="{{ route("servicesFilter.post") }}" id="services-filter">
<input type="hidden" value="{{ route("ajaxRequest.make_offer") }}" id="make-offer">

    <div id="app">
        {{--<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('news') }}">News</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('chart') }}">Chart</a></li>
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ Lang::get('lang.LOGIN') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ Lang::get('lang.REG') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                        {{ __('Dashboard') }}
                                    </a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>--}}

        @include('layouts.header')
        <main >
            @yield('content')
        </main>
        @include('layouts.footer')



    </div>



    @if( route("chart") === url()->current())
{{--        <script src="{{ asset('/js/chart.js') }}"></script>--}}
    @endif
    <script src="{{ asset('/admin/assets/plugins/jquery/jquery-min.js') }}"></script>
    <script src="{{ asset('/lib/js/owl.carousel.min.js') }}" ></script>
    <script src="{{ asset('/js/script.js') }}"></script>
    <script src="{{ asset('/js/lib.js') }}"></script>
    <script type="text/javascript" src="{{asset('slick/slick.min.js')}}"></script>



</body>
</html>
