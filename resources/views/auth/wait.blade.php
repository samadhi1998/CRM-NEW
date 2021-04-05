<html>
<head>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title','Wait Page')</title>
        <link rel="stylesheet" href="{{asset('css/updateprogress.css')}}">
        <link rel="stylesheet" href="{{asset('css/viewprogress.css')}}">
        <link rel="stylesheet" href="{{asset('css/login.css')}}">
       
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CRM') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dashboard.js') }}" defer></script>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>
    <link rel="stylesheet" href="{{asset('css/bootstrap-tagsinput.css')}}">
    <script src="{{ asset('js/bootstrap-tagsinput.js') }}"></script>

    <!-- Thilini -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/<version>/slimselect.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/<version>/slimselect.min.css"> 
    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">

    
</head>
<body>
    <nav class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0 shadow" style="background-color: #D8D5DB  !important">
        <a class="navbar-brand col-md-3 col-lg-2 px-5" href="{{ url('/') }}">
            <img src="/img/logo.png" width="110" height="60" alt="">
        </a>
        <button class="navbar-toggler  position-absolute d-md-none collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Left Side Of Navbar -->
        <ul class="navbar-nav px-3">
            @guest
                @if (Route::has('login'))
                @endif
                        
                @if (Route::has('register'))
                @endif

                @else
            @endguest
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="navbar-nav px-3  justify-content-end">
            <!-- Authentication Links -->
            @guest
                @if (Route::has('login'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                @endif
                        
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif

                @else
                    <li class="nav-item dropdown my-sm-0">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <b>{{ Auth::user()->name }}</b> 
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                {{ csrf_field() }}
                            </form>
                        </div>
                    </li>
                <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
                @endguest
        </ul>
    </nav>

    <div class="row justify-content-center align-items-center h-100">
        <div class="col-md-8">
            <div class="container">
                <h2 style="text-align:center">You are not authorized yet. Please wait for the permission</h2>
                <br>
                <div class="row justify-content-center">
                    <span data-feather="loader" style="width:50px; height:50px"></span>
                </div>
            </div>
        </div>
    </div>
<footer class="footer text-center pt-3 pb-3 fixed-bottom" style="background-color: #D8D5DB  !important">
    © 2021 CRM by She Squad
</footer>

    <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script><script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js" integrity="sha384-zNy6FEbO50N+Cg5wap8IKA4M/ZnLJgzc6w2NqACZaK0u0FXfOWRRJOnQtpZun8ha" crossorigin="anonymous"></script><script src="dashboard.js"></script>
   
<!--Thilini-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.23.0/slimselect.min.js"></script>

</body>
</html>