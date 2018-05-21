
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
                    <a id="navbarDropdown " class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
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
                <div class="card-header">Datos del Torneo</div>

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
                                        <a href="{{ route('Participantes.VerParticipantes',[$torneo->id] )}}" class="list-group-item" >Ver participantes</a>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <!-- Se inicia el form (ojo todos los elementos de formulario deben ir dentro de esta etiqueta-->
                         
                               

                                <!-- Inicio del div central parte de formulario información básica -->
                                <div class="col-md-12" style="border-width: 1px 1px 0px 1px; border-style: solid; border-color: lightgrey; background: #f1f3f6;">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="control-group form-group">
                                            <div class="controls">
                                                <br>
                                                <h3>Información de Torneo</h3>
                                                <div>
                                                    <label for="Nombre">Nombre del torneo:</label>
                                                    <input type="text" name="Nombre" class="form-control" id="Nombre Form_Torneo" required="" data-validation-required-message="Por favor introduzca un nombre de torneo." value="{{ $torneo->Nombre }} " disabled>
                                                </div>
                                                <br>
                                                <div>
                                                    <label for="Fecha">Fecha del Torneo:</label>
                                                    <input type="datetime" name="Fecha" class="form-control" id="Fecha Form_Torneo"  required="" data-validation-required-message="Por favor introduzca una fecha para el torneo." value="{{ $torneo->Fecha }}" disabled>
                                                </div>
                                                <br>
                                                <div>
                                                    <label for="MaxParticipantes">Número maximo de participantes:</label> 
                                                    <input type="number" class="form-control" id="MaxParticipantes" data-validation-required-message="Por favor introduzca el numero de Participantes maximos." name="MaxParticipantes" value="{{ $torneo->MaxParticipantes }}" min="1" max="999999999" id="Form_Torneo" disabled>
                                                </div>
                                                <br>    
                                                <div>
                                                    <label for="Puntos">Recompensa de puntos:  </label>   
                                                    <input type="number" name="Puntos" class="form-control" id="Puntos Form_Torneo" data-validation-required-message="Por favor introduzca un numero de puntos como recompensa del torneo." value="{{ $torneo->Puntos }}" min="1" max="999999999" disabled>
                                                </div>
                                                <br>
                                                <div>
                                                    <label for="Juego">Juego</label>
                                                    <select name="Juego" id="Form_Torneo"disabled>
                                                      <option value="Hearthstone">Hearthstone</option>
                                                      <option value="League of Legends">League of Legends</option>
                                                      <option value="Mario Kart">MarioKart</option>
                                                      <option value="Overwatch">Overwatch</option> </select>        
                                                  </div>
                                                  <br>
                                                
                                          </div>
                                      </div>
                                      <div class="modal-footer">

                                    
                                           <form action="{{route('Participantes.inscripcion', $torneo->id)}}" method="post" >
                                          {{csrf_field()}}
                                      
                                       <button class="btn btn-danger btn-xs" onclick="return confirm('Seguro que quieres inscribr-te en  este torneo?');" type="submit">Inscribir-se</button>
                                     
                                      
                                          
                                    
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
</div>
</body>
