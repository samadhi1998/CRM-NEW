<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title','Master Page')</title>
        <link rel="stylesheet" href="{{asset('css/updateprogress.css')}}">
        <link rel="stylesheet" href="{{asset('css/viewprogress.css')}}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'CRM') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/dashboard.js') }}" defer></script>
    <script src="https://use.fontawesome.com/d690ff1854.js"></script>
    <script src="https://unpkg.com/feather-icons/dist/feather.min.js"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{asset('css/dashboard.css')}}">
    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/dashboard/">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

      user-wrapper, .message-wrapper{
    border: 1px solid #dddddd;
    overflow-y: auto;
    border-radius: 15px;
}

.user-wrapper{
  height:600px;
  border-radius: 15px;
}

.user{
  cursor: pointer; 
  padding : 5px 0;
  position : relative;
}

.user:hover{
  background : #eeeeee;
}

.user:last-child{
  margin-bottom :0;
}

.pending{
  position:absolute;
  left: 12px;
  top : 5px;
  background : #b600ff;
  margin : 0;
  border-radius : 50%;
  width : 15px;
  height :15px;
  line-height: 10px; 
  padding-left: 4px;
  color : #ffffff;
  font-size: 12px;
}

.media-left{
  margin : 0 10px;
  }

.media-left img{
  width :64px;
  border-radius:64px;

}

.media-body p{
  margin :6px 0;
}

ul{
  margin: 0;
  padding :0;
}
li{
  list-style: none;
}

.message-wrapper{
  padding :10px;
  height : 536px;
  background : #eeeeee;
}

.messages .message{
  margin-bottom :15px;
}

.messages .message:last-child{
  margin-bottom :0;
}

.received, .sent{
  width :45%;
  padding :3px 10px;
  border-radius :10px;
}

.received {
  background : #ffffff;
  float: left;
}

.sent {
  background : #C2DFFF ;
  float :right;
  text-align :right;
}

.message p{
  margin : 5px 0;
}

.date{
  color: #777777;
  font-size: 12px; 
}
.active{
  background: #eeeeee;
}
  
input[type=text]{
  width :100%;
  padding :12px 20px;
  margin : 15px 0 0 0;
  display: inline-block;
  border-radius: 4px;
  box-sizing : border-box;
  outline: none;
  border : 1px solid #cccccc;
}

input[type=text]:focus{
  border :1px solid #aaaaaa;
}

.user-wrapper, .message-wrapper{
    border: 1px solid #dddddd;
    overflow-y: auto;
}

.user-wrapper{
  height:600px;
}

.user{
  cursor: pointer; 
  padding : 5px 0;
  position : relative;
}

.user:hover{
  background : #eeeeee;
}

.user:last-child{
  margin-bottom :0;
}

.pending{
  position:absolute;
  left: 12px;
  top : 5px;
  background : #b600ff;
  margin : 0;
  border-radius : 50%;
  width : 15px;
  height :15px;
  line-height: 10px; 
  padding-left: 4px;
  color : #ffffff;
  font-size: 12px;
}

.media-left{
  margin : 0 10px;
  }

.media-left img{
  width :64px;
  border-radius:64px;

}

.media-body p{
  margin :6px 0;
}

ul{
  margin: 0;
  padding :0;
}

li{
  list-style: none;
}

.message-wrapper{
  padding :10px;
  height : 536px;
  background : #eeeeee;
}

.messages .message{
  margin-bottom :15px;
}

.messages .message:last-child{
  margin-bottom :0;
}

.received, .sent{
  width :45%;
  padding :3px 10px;
  border-radius :10px;
}

.received {
  background : #ffffff;
  float: left;
}

.sent {
  background : #233554;
  float :right;
  color: white;
  text-align :right;
}

.message p{
  margin : 5px 0;
}

.date{
  color: #777777;
  font-size: 12px; 
}

.active{
  background: #eeeeee;
}
  
input[type=text]{
  width :100%;
  padding :12px 20px;
  margin : 15px 0 0 0;
  display: inline-block;
  border-radius: 4px;
  box-sizing : border-box;
  outline: none;
  border : 1px solid #cccccc;
}

input[type=text]:focus{
  border :1px solid #aaaaaa;
}

table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 100%;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }

@page {
            bleed: 1cm;
            size: A4 portrait;
            size:  auto;  
            margin-bottom: 50pt;
            font-size: 12pt;
            #content, #page {
            width: 100%;
            margin: 0;
            float: none;
            }
            }
            @media print {  
            table{
                page-break-inside: auto;
            }
            tr.last-row {
                background-color: #555!important;
            }
            tr.last-row > th, tr.last-row > td {
                background-color: unset!important;
            }
            div.page-break{
                page-break-before: auto;
            }
            }
            .gray{
            color: #333;
            }
            .gray-ish{
            color: #666;
            }
            .almost-gray{
            color: #999;
            }
            
.page-holder {
  min-height: 100vh;
}

.bg-cover {
  background-size: cover !important;
}
            .login {
              background: linear-gradient(0deg, rgba(128, 128, 128, 0.4), rgba(128, 128, 128, 0.4)),url('{{asset("/img/background.jpg")}}');
              background-size: cover;
              font-family: 'Ubuntu', sans-serif;
              height: 100%; 
              background-position: center;
              background-repeat: no-repeat;
            }
            body{
            background-color: #eee;
            -webkit-print-color-adjust: exact !important;
            height: 100%;
            }
            div.container{
            background-color: white;
            border-radius: 25px;
            height: 100%;
            position: relative;
            margin-top: 50px;
            }
            div.invoice-header > div > h1{
            font-size: 4rem;
            }
            div.invoice-table{
            border-top: 3px solid rgb(255, 77, 77);
            }
            div.invoice-table > table.table > thead, div.invoice-table > table.table > thead.thead > tr, div.invoice-table > table.table > thead.thead > tr > th {
            border-top: none;
            }
            div.total-field{
            position: relative;
            }
            h5.due-date{
            position: absolute;
            bottom: 10px;
            right: 15px;
            }
            div.sub-table{
            border-left: 3px solid rgb(255, 77, 77);
            padding-left: 0;
            }
            div.sub-table > table{
            padding-bottom: 0;
            margin-bottom: 0;
            }
            tr.last-row{
            margin-top: 25px;
            background-color: #555;
            color: white;
            border-top: 3px solid rgb(255, 77, 77);
            }
            p.footer{
                bottom: 0;
                width: 100%;
                background-color: #333;
                color: white;
                padding-top: 15px;
                border-top: 3px solid red;
            }
    </style>

    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
	  <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
	  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.5.0/main.css"/>

    <link href="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.css" rel="stylesheet">

</head>

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
                    @if(Auth::user()->roles->name == 'Super-Admin')
                    <li class="nav-item">
                        <a class="nav-link" href="/backup">
                          <span data-feather="hard-drive"></span>
                            Backup
                        </a>
                      </li>
                      @endif
                      @if(Auth::user()->roles->name == 'Super-Admin' || Auth::user()->roles->name == 'Service-Person')
                    <li class="nav-item">
                        <a class="nav-link" href="/Route">
                          <span data-feather="compass"></span>
                            Map
                        </a>
                      </li>
                      @endif
                  </ul>
                </div>
              </nav>

            <main class="col-md-8 ms-sm-auto col-lg-10 px-md-4">
              <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2 header1">@yield('header','Dashboard')</h1>
              </div>

              @yield('content')
              @endguest
            </main>
        </div>
        </div>
      </main>
  </div>
</div>

        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.js"></script>

        <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script> -->
        <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js" integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous"></script>
      
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

        <script>
            var receiver_id ="";
            var my_id = "{{Auth::id()}}";
            
            $(document).ready(function(){
              $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
              });

              // Enable pusher logging - don't include this in production
                  Pusher.logToConsole = true;

              var pusher = new Pusher('c5a282501e463a2eed6a', {
                cluster: 'ap2'
              });

              var channel = pusher.subscribe('my-channel');
              channel.bind('my-event', function(data) {
                //app.messages.push(JSON.stringify(data));

                ///////////////////////////////////////////////

                if(my_id == data.from){
                $('#' + data.to).click();
                
              }else if(my_id == data.to){
                if(receiver_id == data.from){
                  $('#' + data.from).click();
                }else{
                  var pending =parseInt($('#' + data.from).find('pending').html());

                  if(pending){
                    $('#'+data.from).find('.pending').html(pending + 1);
                  }else{
                    $('#' + data.from).append('<span class = "pending">1</span>');
                  }
                }
              }

              ///////////////////////////////////////////////////////

              });

              // Vue application
              const app = new Vue({
                el: '#app',
                data: {
                  messages: [],
                },
              });
               
              $('.user').click(function(){
              $('.user').removeClass('active');
              $(this).addClass('active');
              $(this).find('.pending').remove();

              receiver_id =$(this).attr('id');
              
                $.ajax({
                    type: "get",
                    url: "/message/"+receiver_id,
                    data:"",
                    cache: false,
                    success: function(data){
                      $('#messages').html(data);
                      scrollToBottomFunc();
                    }
                  });
              });
              $(document).on('keyup','.input-text input', function(e){
                  var message = $(this).val();

                  if(e.keyCode == 13 && message != '' && receiver_id != ''){
                    $(this).val('');

                    var datastr = "receiver_id="+ receiver_id + "&message=" + message;
                    console.log(datastr);
                      $.ajax({
                        type:"post",
                        url :"/sendmessage",
                        data: datastr,
                        cache:false,
                        success: function(data){

                        },
                        error: function(jqXHR, status, err){
                        },
                        complete: function(){
                          scrollToBottomFunc();
                        }
                      })
                  }
              }) ;   
            });
            // make a function to scroll down auto
            function scrollToBottomFunc() {
                    $('.message-wrapper').animate({
                        scrollTop: $('.message-wrapper').get(0).scrollHeight
                    }, 50);
                }
         
    </script>
    <script >
        $(document).ready(function(){
        let row_number = 1;
        $('#add_row').click(function(e){
          e.preventDefault();
          let new_row_number = row_number - 1;
          $('#product' + row_number).html($('#product' + new_row_number).html()).find('td:first-child');
          $('#products_table').append('<tr id="product' + (row_number + 1) + '"></tr>');
          row_number++;
        });

        $("#delete_row").click(function(e){
          e.preventDefault();
          if(row_number > 1){
            $("#product" + (row_number - 1)).html('');
            row_number--;
          }
        });
        });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slim-select/1.27.0/slimselect.min.js"></script>
@stack('js')

    <footer class="footer text-center pt-3 pb-3 fixed-bottom" style="background-color: #D8D5DB  !important">
      © 2021 CRM by She Squad
    </footer>

    
</body>
</html>
