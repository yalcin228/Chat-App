<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" id="csrf_token">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
   
    <!-- Styles -->
 
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
<style>
     .message-container {
    position: relative;
  }
  .message-container form {
    position: absolute;
    z-index: 999;
    bottom: 0;
    left: 0;
    right: 0;
  }
</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
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
                        
                        @php($friendRequests = friendRequests())
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Dostluq isteyi
                                    @if ($friendRequests->count() != 0)
                                    <span style="font-size:0.6rem;font-weight:300;padding:2px 4px;" class="badge badge-danger navbar-badge">{{$friendRequests->count()}}</span>
                                   
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        @foreach ($friendRequests as $friendRequest)
                                                
                                            <a class="dropdown-item" href="{{route('check-friend.edit', $friendRequest->from_id)}}">{{$friendRequest->user->name}} {{$friendRequest->user->surname}}</a>
                                                
                                        @endforeach
                                                                       
                                    </div>
                                    @else
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <p class="pl-2">Dostluq isteyi yoxdur</p>
                                    </div>

                                    @endif

                                </a>
                                
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                
                               

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    
                                    <a class="dropdown-item" href="{{route('home')}}">Ana Sehife</a>
                                    <a class="dropdown-item" href="{{route('show_my_friends.index')}}">Dostlarını Gör</a>
                                    <a class="dropdown-item" href="{{route('profile.index')}}">Profil Düzənlə</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Çıxış') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        

        <main class="py-4">
            @yield('content')
        </main>
    </div>
  
    
</body>
</html>
