<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="css/estils.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>
        .botonsiko {
              background-color: orange;
              border: none;
              color: white;
              padding: 15px 32px;
              text-align: center;
              text-decoration: none;
              display: inline-block;
              font-size: 16px;
              margin: 4px 2px;
              cursor: pointer;
        }
</style>
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ url('/') }}">
                 <img src="img/logo.png">
             </a>
             <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    <div>

                    </div>
                    <li class="nav-item dropdown">
                        <a href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><button type="button" class="botonsiko">
                            Torneos </button>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="{{ route('Torneo.VerHearthstone') }}">
                               <img src="img/HearthstoneLogo.png">
                               {{ __('Hearthstone') }}
                           </a>

                           <a class="dropdown-item" href="{{ route('Torneo.VerLOL') }}">
                               <img src="img/LOLLogo.jpg">
                               {{ __('League of Legends') }}
                           </a>
                            <a class="dropdown-item" href="{{ route('Torneo.VerMario')}}">
                               <img src="img/MarioKartLogo.png">
                               {{ __('Mario Kart') }}
                           </a>
                                                      <a class="dropdown-item" href="{{ route('Torneo.VerOverwatch')}}">
                               <img src="img/OverwatchLogo.png">
                               {{ __('Overwatch') }}
                           </a>

                           
                </div>
            </li>
        </ul>
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                    <li><a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar sesión') }}</a></li>
                    <li><a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a></li>
                    @else
                    <div>

                    </div>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <img src="{{ Auth::user()->fotoperfil }}" class="imagenperfil">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="{{ url('/perfil') }}">
                               <img src="img/logoperfil.png">
                               {{ __('Ver Perfil') }}
                           </a>

                           <a class="dropdown-item" href="{{ route('Torneo.index') }}">
                               <img src="img/logogestion.png">
                               {{ __('Gestión de Torneos') }}
                           </a>

                           <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                           <img src="img/logoLogout.png">
                           {{ __('Cerrar sesión') }}
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
</nav>

<main class="py-4">
    @yield('content')
</main>
</div>
</body>
</html>
