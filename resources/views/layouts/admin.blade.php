<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive Admin Dashboard Template">
    <meta name="keywords" content="admin,dashboard">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title>Responsive Admin Dashboard Template</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <script src="{{ asset('/admin/assets/plugins/jquery/jquery-min.js') }}"></script>

    {{--    <link href="{{ asset('/admin/assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">--}}
    <link href="{{ asset('/admin/assets/plugins/font-awesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/assets/plugins/icomoon/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/assets/plugins/switchery/switchery.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('slick/slick.css')}}">
    <link rel="stylesheet" href="{{asset('slick/slick-theme.css')}}">


    <!-- Theme Styles -->
    <link href="{{ asset('/admin/assets/css/concept.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/admin/assets/css/custom.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">

{{--boostrap table--}}

    @yield('top-scripts')

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <![endif]-->
</head>
<body>

<section>
    <div class="admin-inner">
        <div class="admin-container">
            <div class="admin-page  ">
<!-- Page Container -->
{{--<div class="page-container">--}}
{{--    @include('admin.includes.admin-left-settings')--}}

{{--    <!-- Page Content -->--}}
{{--    <div class="page-content">--}}
        @include('admin.includes.admin-main-menu')
        <!-- Page Header -->
{{--        <div class="page-header">--}}
{{--            <div class="search-form">--}}
{{--                <form action="#" method="GET">--}}
{{--                    <div class="input-group">--}}
{{--                        <input type="text" name="search" class="form-control search-input" placeholder="Type something...">--}}
{{--                                <span class="input-group-btn">--}}
{{--                                    <button class="btn btn-default" id="close-search" type="button"><i class="icon-close"></i></button>--}}
{{--                                </span>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
{{--            <nav class="navbar navbar-default navbar-expand-md">--}}
{{--                <div class="container-fluid">--}}
{{--                    <!-- Brand and toggle get grouped for better mobile display -->--}}
{{--                    <div class="navbar-header">--}}
{{--                        <div class="logo-sm">--}}
{{--                            <a href="javascript:void(0)" id="sidebar-toggle-button"><i class="fas fa-bars"></i></a>--}}
{{--                            <a class="logo-box" href="index.html"><span>concept</span></a>--}}
{{--                        </div>--}}
{{--                        <button type="button" class="navbar-toggler collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">--}}
{{--                            <i class="fas fa-angle-down"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}

{{--                    <!-- Collect the nav links, forms, and other content for toggling -->--}}

{{--                    <div class="collapse navbar-collapse justify-content-between" id="bs-example-navbar-collapse-1">--}}
{{--                        <ul class="nav navbar-nav mr-auto">--}}
{{--                            <li class="collapsed-sidebar-toggle-inv"><a href="javascript:void(0)" id="collapsed-sidebar-toggle-button"><i class="fas fa-bars"></i></a></li>--}}
{{--                            <li><a href="javascript:void(0)" id="toggle-fullscreen"><i class="fas fa-expand"></i></a></li>--}}
{{--                            <li><a href="javascript:void(0)" id="search-button"><i class="fas fa-search"></i></a></li>--}}
{{--                        </ul>--}}
{{--                    </div><!-- /.navbar-collapse -->--}}
{{--                    <div class="dropdown-content animate" style="min-width:80px;">--}}
{{--                        <a href="{{route('lang', 'am')}}">am</a>--}}
{{--                        <a href="{{route('lang', 'ru')}}">ru</a>--}}
{{--                        <a href="{{route('lang', 'en')}}">en</a>--}}
{{--                        <!----}}
{{--                        <li class="nav-item d-md-block"><a href="javascript:void(0)" class="right-sidebar-toggle" data-sidebar-id="main-right-sidebar"><i class="fas fa-envelope"></i></a></li>--}}
{{--                        <li class="dropdown nav-item d-md-block">--}}
{{--                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bell"></i></a>--}}
{{--                            <ul class="dropdown-menu dropdown-menu-right dropdown-lg dropdown-content">--}}
{{--                                <li class="drop-title">Notifications<a href="#" class="drop-title-link"><i class="fas fa-angle-right"></i></a></li>--}}
{{--                                <li class="slimscroll dropdown-notifications">--}}
{{--                                    <ul class="list-unstyled dropdown-oc">--}}
{{--                                        <li>--}}
{{--                                            <a href="#"><span class="notification-badge bg-info"><i class="fas fa-at"></i></span>--}}
{{--                                                            <span class="notification-info">--}}
{{--                                                                <span class="notification-info"><b>John Doe</b> mentioned you in a post "Update v1.5"</span>--}}
{{--                                                                <small class="notification-date">06:07</small>--}}
{{--                                                            </span></a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#"><span class="notification-badge bg-danger"><i class="fas fa-bolt"></i></span>--}}
{{--                                                            <span class="notification-info">--}}
{{--                                                                <span class="notification-info">4 new special offers from the apps you follow!</span>--}}
{{--                                                                <small class="notification-date">Yesterday</small>--}}
{{--                                                            </span></a>--}}
{{--                                        </li>--}}
{{--                                        <li>--}}
{{--                                            <a href="#"><span class="notification-badge bg-success"><i class="fas fa-bullhorn"></i></span>--}}
{{--                                                            <span class="notification-info">--}}
{{--                                                                <span class="notification-info">There is a meeting with <b>Ethan</b> in 15 minutes!</span>--}}
{{--                                                                <small class="notification-date">Yesterday</small>--}}
{{--                                                            </span></a>--}}
{{--                                        </li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                        -->--}}
{{--                        <li class="dropdown nav-item d-md-block">--}}
{{--                           --}}{{--id="navbarDropdown" data-toggle="dropdown"--}}
{{--                            <a href="{{ route('admin.about') }}" class="nav-link dropdown-toggle"  role="button" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('/uploads/profiles/' . $info->pictures )}}" alt="" class="rounded-circle w-100 h-100"></a>--}}
{{--                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
{{--                                <li><a href="{{ route('admin.about') }}">Profile</a></li>--}}
{{--                                <li><a href="#"><span class="badge float-right badge-info">64</span>Messages</a></li>--}}
{{--                                <li role="separator" class="divider"></li>--}}
{{--                                <li><a href="{{ route('logout') }}">{{Lang::get('lang.LOG_OUT')}}</a></li>--}}
{{--                            </ul>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </div><!-- /.container-fluid -->--}}
{{--            </nav>--}}
{{--        </div><!-- /Page Header -->--}}
        <!-- Page Inner -->
{{--        <div class="page-inner no-page-title">--}}
{{--            <div id="main-wrapper">--}}
                @yield('content')
            </div><!-- Main Wrapper -->
        </div><!-- /Page Inner -->
    </div><!-- /Page Content -->
{{--</div><!-- /Page Container -->--}}
{{--    </div>--}}
</section>


<!-- Javascripts -->
<script src="{{ asset('/admin/assets/plugins/jquery/jquery-min.js') }}"></script>
<script src="{{ asset('/admin/assets/plugins/bootstrap/popper.min.js') }}"></script>
<script src="{{ asset('/admin/assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/admin/assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<script src="{{ asset('/admin/assets/plugins/switchery/switchery.min.js') }}"></script>
<script src="{{ asset('/admin/assets/plugins/apexcharts/dist/apexcharts.min.js') }}"></script>
<script src="{{ asset('/admin/assets/js/concept.min.js') }}"></script>
<script src="{{ asset('/admin/assets/js/pages/dashboard.js') }}"></script>

{{--boostrap table--}}
<script src="{{ asset('/admin/assets/js/script.js') }}"></script>
<script type="text/javascript" src="{{asset('slick/slick.min.js')}}"></script>


@yield('tableDnD-js')
@yield('attribute-js')



@yield('bottom-scripts')
</body>
</html>
