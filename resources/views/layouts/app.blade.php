<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>


    <!-- Fonts -->

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                   <img src="{{ asset('logo.png') }}" style="width: 50px">
                </a>
              <ul class=" navbar-nav ms-auto">
                  <li>
                      <a class="navbar-brand" href="{{ url('/') }}">
                          Á propos
                      </a>
                  </li>
                  <li>
                      <a class="navbar-brand" href="{{ url('/') }}">
                          Contact
                      </a>
                  </li>
              </ul>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->


                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest

                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>



                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link"  href="{{route('admin.login')}}"><i class="fas fa-user-lock" style="color: #084298"></i></a>
                                </li>
                            @endif
                        @else
                            @if(auth()->guard("admin")->check())
                                <li class="nav-item mx-2">
                                    <b> {{ auth()->guard("admin")->user()->name }}</b>
                                </li>

                                <li class="nav-item">
                                    <a  href="{{ route('admin.logout') }}" class="btn btn-secondary ">
                                      Logout  <i class="fas fa-sign-out-alt"></i>
                                    </a>
                                </li>

                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link " href="#" >
                                        <strong>{{ Auth::user()->name }}</strong>
                                    </a>

                                    <li>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </li>

                            @endif

                        @endguest
                        <li class="nav-item " style="margin-left: 4px">
                            <a  href="{{ route("cart.index") }}" class="btn btn-info">
                                Panier  <i class="fas fa-cart-plus"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-8 mx-auto ">
                @include('layouts.alerts')
            </div>
        </div>
        <main class="py-3">
            @yield('content')
        </main>
    </div>
</body>
</html>
