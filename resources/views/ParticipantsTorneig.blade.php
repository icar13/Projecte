<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <title>DragonTournament</title>
    <link rel="stylesheet" href="../css/estils.css">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
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
    <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ url('/') }}">
               <img src="../img/logo.png">
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
                               <img src="../img/HearthstoneLogo.png">
                               {{ __('Hearthstone') }}
                           </a>

                           <a class="dropdown-item" href="{{ route('Torneo.VerLOL') }}">
                               <img src="../img/LOLLogo.jpg">
                               {{ __('League of Legends') }}
                           </a>
                            <a class="dropdown-item" href="{{ route('Torneo.VerMario')}}">
                               <img src="../img/MarioKartLogo.png">
                               {{ __('Mario Kart') }}
                           </a>
                              <a class="dropdown-item" href="{{ route('Torneo.VerOverwatch')}}">
                               <img src="../img/OverwatchLogo.png">
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
                        <img src="../{{ Auth::user()->fotoperfil }}" class="imagenperfil">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="{{ url('/perfil') }}">
                         <img src="../img/logoperfil.png">
                         {{ __('Ver Perfil') }}
                     </a>

                     <a class="dropdown-item" href="{{ route('Torneo.index') }}">
                         <img src="../img/logogestion.png">
                         {{ __('Gestión de Torneos') }}
                     </a>
                     <a class="dropdown-item" href="{{ route('logout') }}"
                     onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                     <img src="../img/logoLogout.png">
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
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gestión de Torneos</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="col-md-12" align="center">
                                    <img class="img-responsive img-portfolio img-hover imatgegran" src="../{{Auth::user()->fotoperfil}}">
                                </div>
                                <div class="col-md-12">
                                    <p class="text-center"><strong> {{ Auth::user()->name }}</strong></p>
                                </div>
                                <div class="col-md-15">
                                    <ul class="list-group list-primary">
                                        <a href="{{ route('Torneo.index') }}" class="list-group-item" >Listar Torneos</a>
                                    </ul>
                                      <ul class="list-group list-primary">
                                        <a href="{{ route('Torneo.index') }}" class="list-group-item" >Ver participantes</a>
                                    </ul>

                                </div>
                            </div>
                            <div class="col-md-9">
                                <h2 align="center">Lista de Participantes</h2>
                                <!-- Se inicia el form (ojo todos los elementos de formulario deben ir dentro de esta etiqueta-->
                                <table class="table table-striped table-bordered panel-body">
                  <thead>
                    <tr>
                      
                      <td>Nombre de usuário</td>
                      
                      <td>Acciones</td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($participantes as $key => $value)
                    <tr>
                      <td>{{ $value->name }}</td>
                     <td> <form action="{{action('ParticipantesController@destroy', $value->id)}}" method="post" >
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
              
                   <button class="btn btn-danger btn-xs" onclick="return confirm('Seguro que quieres eliminar este particpante?');" type="submit"><img class='icon' src="../img/delete.png"></button>
                 </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
</div>
</form>
</td>
</tr>
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</body>
<html>
