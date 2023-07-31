<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">



    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- Favicon -->
    <link href="{{asset('img/favicon.ico')}}" rel="icon">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <!-- Google Web Fonts -->
   <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
   
   
    
    <script>

        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
            ]) !!};

    </script>

</head>
<body>
    <div id="app">
   
        <!-- </nav>  -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <a class="navbar-brand" href="{{url('/')}}">Product Management</a>

          <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
             <!--  <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
              </li> -->
             <!--  <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
              </li>
              <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
              </li> -->
            </ul>
    <form class="form-inline my-2 my-lg-0">
      <ul class="nav navbar-nav navbar-right mr-auto mt-2 mt-lg-0">
                       {{-- Notifications  --}}
                        @if(Auth::guard('admin')->check())
                                @php 
                                $admin = Auth::guard('admin')->user();
                                @endphp
                         <notifications :userid="{{ $admin->id }}" :unreads="{{ $admin->unreadNotifications }}"></notifications>       

                        @endif

                        <!-- Authentication Links -->
                        @if (Auth::guard('admin')->guest() && Auth::guard('web')->guest())
                      <div class="btn-group">
  
                            <li class="nav-link"><a href="{{ route('login') }}" class="nav-link">Login</a></li>
                            <li class="nav-link"><a href="{{ route('register') }}" class="nav-link">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    @if(Auth::guard('admin')->check()) {{ Auth::guard('admin')->user()->name }} @else {{ Auth::guard('web')->user()->name }} @endif<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        @if(Auth::guard('web')->check())
                                        <a href="{{ route('user.logout') }}"
                                            >
                                            User Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    @endif

                                    @if(Auth::guard('admin')->check())
                                        <a href="{{ route('admin.logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form-admin').submit();">
                                            Admin Logout
                                        </a>

                                        <form id="logout-form-admin" action="{{ route('admin.logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    @endif
                                    </li>

                                </ul>
                            </li>
                        @endif
                              
                    </ul>
                </div>
    </form>
  </div>
</nav>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!--  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> -->
</body>
</html>
