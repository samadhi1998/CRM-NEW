
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title','Backup')</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="{{ asset('vendor/laravel_backup_panel/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/laravel_backup_panel/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dashboard.js') }}" defer></script>
    <script src="https://use.fontawesome.com/d690ff1854.js"></script>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>

    @livewireStyles
</head>
<body>
<body>
<div>
  <div id="app">
    <nav class="navbar navbar-light sticky-top bg-light flex-md-nowrap p-0 shadow navbar-expand-lg" style="background-color: #D8D5DB  !important">
      <a class="navbar-brand col-md-3 col-lg-2 px-5" href="{{ url('/home') }}">
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
        <ul class="navbar-nav px-3  justify-content-end ml-auto">
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
            <li class="nav-item dropdown ml-10 my-2">
              <?php $notifications = auth()->user()->unreadNotifications; ?>
                <a id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span data-feather="bell"></span> <b>{{$notifications->count()}}</b>
                </a>
              <ul class="dropdown-menu">
                <li class="head text-light bg-dark">
                  <div class="row">
                    <div class="col-lg-12 col-sm-12 col-12">
                      <span>Notifications ({{ $notifications->count()}})</span>
                      <a href="/mark-all-as-read" class="float-right text-light" > Mark all as read</a>
                    </div>
                  </div>
                </li>
                                  
                @foreach($notifications as $notification)
                  <li class="notification-box">
                    <div class="row justify-content-center">    
                      <div class="alert alert-success" role="alert">
                        <a href="/view-notifications">[{{ $notification->created_at }}] A new user has just registered.</a>
                        <br>
                        <a href="/mark-as-read" class="float-right mark-as-read" data-id="{{ $notification->id }}">
                          Mark as read
                        </a>
                      </div>
                    </div>
                  </li>
                @endforeach
                </ul>
            </li>
                              
            <li class="nav-item dropdown ml-2">
              <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
          </div>
          @endguest
        </ul>  
    </nav>

    <main class="py-1 pb-5">
      @guest
        @if (Route::has('login'))
          @yield('content1')
        @endif
                            
        @if (Route::has('register'))
          @yield('content2')
        @endif
                                     
        @else
          <div class="container-fluid d-flex flex-column pb-5" style="background-color: #F4F2F3">
            <div class="row">
              <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse" style="background-color: #2D3142 !important">
                <div class="position-sticky pt-3 pb-5">
                  <ul class="nav flex-column">
                    <li class="nav-item">
                      <a class="nav-link" aria-current="page" href="/home">
                        <span data-feather="home"></span>
                          Dashboard
                      </a>
                    </li>
                    @if(Auth::user()->can('view-order', App\Models\Order::class))
                      <li class="nav-item">
                        <a class="nav-link" href="/index">
                          <span data-feather="file"></span>
                            Orders
                        </a>
                      </li>
                    @endif

                    @if(Auth::user()->can('view-product', App\Models\product::class))
                      <li class="nav-item">
                        <a class="nav-link" href="/product/viewproduct">
                          <span data-feather="shopping-cart"></span>
                            Products
                        </a>
                      </li>
                    @endif

                    @if(Auth::user()->can('view-customer', App\Models\customer::class))
                      <li class="nav-item">
                        <a class="nav-link" href="/ViewCustomers">
                          <span data-feather="users"></span>
                            Customers
                        </a>
                      </li>
                    @endif

                    @if(Auth::user()->can('view-task', App\Models\Task::class))
                      <li class="nav-item">
                        <a class="nav-link" href="/View-Task">
                          <span data-feather="target"></span>
                            Tasks
                        </a>
                      </li>
                    @endif
                                
                    @if(Auth::user()->can('view-user', App\Models\User::class))
                      <li class="nav-item">
                        <a class="nav-link" href="/viewuser">
                          <span data-feather="user"></span>
                            Users
                        </a>
                      </li>
                    @endif

                    @if(Auth::user()->can('view-role', App\Models\Role::class))
                      <li class="nav-item">
                        <a class="nav-link" href="/View-Role">
                          <span data-feather="settings"></span>
                            Role Management
                        </a>
                      </li>
                      @endif
                  </ul>

                  <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                  <span>Other</span>
                  </h6>
                  <ul class="nav flex-column mb-2">
                    @if(Auth::user()->can('view-calendar', App\Models\Event::class))
                      <li class="nav-item">
                        <a class="nav-link" href="/reminder">
                          <span data-feather="calendar"></span>
                            Reminders
                        </a>
                      </li>
                    @endif

                    @if(Auth::user()->can('view-report', App\Models\Report::class))
                      <li class="nav-item">
                        <a class="nav-link" href="/bydaily">
                          <span data-feather="bar-chart-2"></span>
                            Reports
                        </a>
                      </li>
                    @endif

                    @if(Auth::user()->can('view-note', App\Models\Note::class))
                      <li class="nav-item">
                        <a class="nav-link" href="/note/viewnote">
                          <span data-feather="file-text"></span>
                            Notes
                        </a>
                      </li>
                    @endif

                    @if(Auth::user()->can('view-chat', App\Models\Message::class))
                      <li class="nav-item">
                        <a class="nav-link" href="/chat/message">
                          <span data-feather="message-circle"></span>
                            Chat
                        </a>
                      </li>
                      @endif

                    @if(Auth::user()->can('view-charge', App\Models\extra_charge::class))
                      <li class="nav-item">
                        <a class="nav-link" href="/ViewChargers">
                          <span data-feather="dollar-sign"></span>
                            Additional Charges
                        </a>
                      </li>
                    @endif

                    @if(Auth::user()->can('view-notification', App\Models\Notification::class))
                      <li class="nav-item">
                        <a class="nav-link" href="/view-notifications">
                          <span data-feather="bell"></span>
                            Notifications
                        </a>
                      </li>
                    @endif

                      <li class="nav-item">
                        <a class="nav-link" href="/backup">
                          <span data-feather="bell"></span>
                            Backup
                        </a>
                      </li>
                  </ul>
                </div>
              </nav>

              <main class="col-md-8 ms-sm-auto col-lg-10 px-md-4">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 header1"> <b>@yield('header','Backup Panel')</b></h1>
              </div>

              @yield('content')
              <livewire:laravel_backup_panel::app />
              @endguest
            </main>

        </div>
        </div>
      </main>
  </div>
</div>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      
      <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>



    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    @livewireScripts
</body>
</html>
