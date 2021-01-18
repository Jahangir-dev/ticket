<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />

     <!--Bootstrap Css-->
    <link rel="stylesheet" href="{{ asset('css/vendor/bootstrap.min.css') }}">
    <!--Font-Awesome Css-->
    <link rel="stylesheet" href="{{ asset('css/vendor/font-awesome.min.css') }}">
    <!--Flaticon Css-->
    <link rel="stylesheet" href="{{ asset('css/vendor/flaticon.css') }}">
    <!--Owl-Carousel Css-->
    <link rel="stylesheet" href="{{ asset('css/vendor/owl.carousel.min.css') }}">
    <!--Owl Theme Default-->
    <link rel="stylesheet" href="{{ asset('css/vendor/owl.theme.default.min.css') }}">
    <!--Animate Css-->
    <link rel="stylesheet" href="{{ asset('css/vendor/animate.css') }}">
    <!--Jquery Ui Css-->
    <link rel="stylesheet" href="{{ asset('css/vendor/jquery-ui.min.css') }}">
    <!--Lightbox Css-->
    <link rel="stylesheet" href="{{ asset('css/vendor/lightbox.css') }}">
    <!--Style Css-->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!--Responsive Css-->
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <!--Modernizr Css-->
    <script src="{{ asset('js/vendor/modernizr-2.8.3.min.js') }}"></script>

</head>
<body>
    <div class='loader'>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--dot'></div>
        <div class='loader--text'></div>
    </div>
    <div id="app" class="main-container">
         <!--Preloder-->
        
        <!--Header Start Here-->
        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-lg-2">
                        <div class="brand-logo text-white">
                            <a class="navbar-brand" href="{{ url('/') }}">
                                <h2>{{ config('app.name', 'Laravel') }}</h2>
                            </a>
                        </div>
                    </div>
                    <!-- /col end-->
                    <div class="col-lg-7">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"><i class="fa fa-bars"></i></span>
                          </button>

                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav ml-auto">
                                    <li class="nav-item active ">
                                        <a class="nav-link " href="index.html">Home <span class="sr-only">(current)</span></a>
                                        
                                    </li>
                                  
                                    
                                    
                                    <li class="nav-item ">
                                        <a class="nav-link " href="#about">About</a>
                                    </li>

                                    <li class="nav-item ">
                                        <a class="nav-link " href="#events">Events</a>
                                    </li>

                                    <li class="nav-item ">
                                        <a class="nav-link " href="#sponsors">sponsors</a>
                                    </li>

                                    <li class="nav-item ">
                                        <a class="nav-link " href="#clients">Happy Clients</a>
                                    </li>
                                  
                                </ul>
                            </div>
                        </nav>
                    </div>
                    <!-- /col end-->
                    <div class="col-lg-3 d-none d-lg-block">
                        <ul class="navbar-nav ml-auto d-lg-inline-block">
                            <li class="header-ticket float-left mr-lg-2" >
                                <a class="pr-0" href="#events">Buy Ticket</a>
                            </li>
                              @guest
                            <li class="header-ticket float-left">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="header-ticket float-left">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown float-left">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                    <!-- /col end-->
                </div>
                <!-- /row end-->
            </div>
            <!-- container end-->
        </header>
        <!--Header End Here-->
        
            @yield('content')
        
    </div>
     @include('partials.footer')
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>

    <!-- Google Map js -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBlUJtsIi_FRurx0i2WUGoxf_KaNoHmc4o"></script>
    <script src="{{ asset('js/vendor/map.js') }}"></script>
    <!-- jquery latest version -->
    <script src="{{ asset('js/vendor/jquery-3.2.1.min.js') }}"></script>
    <!--Migrate Js-->
    <script src="{{ asset('js/vendor/jquery-migrate.js') }}"></script>
    <!--Popper Js-->
    <script src="{{ asset('js/vendor/popper-1.12.9.min.js') }}"></script>
    <!--Bootstrap Js-->
    <script src="{{ asset('js/vendor/bootstrap.min.js') }}"></script>
    <!--Owl-Carousel Js-->
    <script src="{{ asset('js/vendor/owl.carousel.min.js') }}"></script>
    <!--Counter-Up Js-->
    <script src="{{ asset('js/vendor/jquery.counterup.min.js') }}"></script>
    <!--Waypoints Js-->
    <script src="{{ asset('js/vendor/waypoints-jquery.js') }}"></script>
    <!--Lightbox Js-->
    <script src="{{ asset('js/vendor/lightbox.js') }}"></script>
    <!--Appear Js-->
    <script src="{{ asset('js/vendor/jquery.appear.js') }}"></script>
    <!--Jquery Ui Js-->
    <script src="{{ asset('js/vendor/jquery-ui.min.js') }}"></script>
    <!--Wow Js-->
    <script src="{{ asset('js/vendor/wow.min.js') }}"></script>
    <!--Plugins Js-->
    <script src="{{ asset('js/vendor/plugins.js') }}"></script>

    <!-- template main js file -->
    <script src="{{asset('js/main.js') }}"></script>

     
    <script type="text/javascript">
        /*preloader*/
        $(window).on('load', function () {
            $('.loader').fadeOut('slow', function () {
                $(this).remove();
            })
        });
    </script>
    @yield('scripts')
</body>
</html>
