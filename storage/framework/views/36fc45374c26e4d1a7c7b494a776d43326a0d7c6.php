
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/ico/favicon.png">
    <title>DragonTournament</title>
    <link rel="stylesheet" href="../css/estils.css">
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
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
            <a class="navbar-brand" href="<?php echo e(url('/')); ?>">
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
                           <a class="dropdown-item" href="<?php echo e(route('Torneo.VerHearthstone')); ?>">
                               <img src="../img/HearthstoneLogo.png">
                               <?php echo e(__('Hearthstone')); ?>

                           </a>

                           <a class="dropdown-item" href="<?php echo e(route('Torneo.VerLOL')); ?>">
                               <img src="../img/LOLLogo.jpg">
                               <?php echo e(__('League of Legends')); ?>

                           </a>
                            <a class="dropdown-item" href="<?php echo e(route('Torneo.VerMario')); ?>">
                               <img src="../img/MarioKartLogo.png">
                               <?php echo e(__('Mario Kart')); ?>

                           </a>
                              <a class="dropdown-item" href="<?php echo e(route('Torneo.VerOverwatch')); ?>">
                               <img src="../img/OverwatchLogo.png">
                               <?php echo e(__('Overwatch')); ?>

                           </a>

                           
                </div>
            </li>
        </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                <?php if(auth()->guard()->guest()): ?>
                <li><a class="nav-link" href="<?php echo e(route('login')); ?>"><?php echo e(__('Iniciar sesión')); ?></a></li>
                <li><a class="nav-link" href="<?php echo e(route('register')); ?>"><?php echo e(__('Registrarse')); ?></a></li>
                <?php else: ?>
                <div>

                </div>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        <img src="../<?php echo e(Auth::user()->fotoperfil); ?>" class="imagenperfil">
                        <?php echo e(Auth::user()->name); ?> <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                     <a class="dropdown-item" href="<?php echo e(url('/perfil')); ?>">
                         <img src="../img/logoperfil.png">
                         <?php echo e(__('Ver Perfil')); ?>

                     </a>

                     <a class="dropdown-item" href="<?php echo e(route('Torneo.index')); ?>">
                         <img src="../img/logogestion.png">
                         <?php echo e(__('Gestión de Torneos')); ?>

                     </a>
                     <a class="dropdown-item" href="<?php echo e(route('logout')); ?>"
                     onclick="event.preventDefault();
                     document.getElementById('logout-form').submit();">
                     <img src="../img/logoLogout.png">
                     <?php echo e(__('Cerrar sesión')); ?>

                 </a>
                 <form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
                    <?php echo csrf_field(); ?>
                </form>

            </div>
        </li>
        <?php endif; ?>
    </ul>
</div>
</div>
</nav>
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gestión de Torneos</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>
                    <div class="container">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="col-md-12" align="center">
                                    <img class="img-responsive img-portfolio img-hover imatgegran" src="../<?php echo e(Auth::user()->fotoperfil); ?>">
                                </div>
                                <div class="col-md-12">
                                    <p class="text-center"><strong> <?php echo e(Auth::user()->name); ?></strong></p>
                                </div>
                                <div class="col-md-15">
                                    <ul class="list-group list-primary">
                                        <a href="<?php echo e(route('Torneo.index')); ?>" class="list-group-item" >Listar Torneos</a>
                                    </ul>

                                       <ul class="list-group list-primary">
                                        <a href="<?php echo e(route('Participantes.VerParticipantes',[$torneo->id] )); ?>" class="list-group-item" >Ver participantes</a>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <!-- Se inicia el form (ojo todos los elementos de formulario deben ir dentro de esta etiqueta-->
                                <?php $user=Auth::user() ?>
                                <?php echo e(Form::model(Auth::user(),array('route' => array('Torneo.update', $torneo->id), 'method' => 'PUT'))); ?>


                                <!-- Inicio del div central parte de formulario información básica -->
                                <div class="col-md-12" style="border-width: 1px 1px 0px 1px; border-style: solid; border-color: lightgrey; background: #f1f3f6;">
                                    <div class="col-md-8 col-md-offset-2">
                                        <div class="control-group form-group">
                                            <div class="controls">
                                                <br>
                                                <h3>Información de Torneo</h3>
                                                <div>
                                                    <label for="Nombre">Nombre del torneo:</label>
                                                    <input type="text" name="Nombre" class="form-control" id="Nombre" required="" data-validation-required-message="Por favor introduzca un nombre de torneo." value="<?php echo e($torneo->Nombre); ?>">
                                                </div>
                                                <br>
                                                <div>
                                                    <label for="Fecha">Fecha del Torneo:</label>
                                                    <input type="datetime" name="Fecha" class="form-control" id="Fecha"  required="" data-validation-required-message="Por favor introduzca una fecha para el torneo." value="<?php echo e($torneo->Fecha); ?>">
                                                </div>
                                                <br>
                                                <div>
                                                    <label for="MaxParticipantes">Número maximo de participantes:</label> 
                                                    <input type="number" class="form-control" id="MaxParticipantes" data-validation-required-message="Por favor introduzca el numero de Participantes maximos." name="MaxParticipantes" value="<?php echo e($torneo->MaxParticipantes); ?>" min="1" max="999999999">
                                                </div>
                                                <br>    
                                                <div>
                                                    <label for="Puntos">Recompensa de puntos:  </label>   
                                                    <input type="number" name="Puntos" class="form-control" id="Puntos" data-validation-required-message="Por favor introduzca un numero de puntos como recompensa del torneo." value="<?php echo e($torneo->Puntos); ?>" min="1" max="999999999">
                                                </div>
                                                <br>
                                                <div>
                                                    <label for="Juego">Juego</label>
                                                    <select name="Juego">
                                                      <option value="Hearthstone">Hearthstone</option>
                                                      <option value="League of Legends">League of Legends</option>
                                                      <option value="Mario Kart">MarioKart</option>
                                                      <option value="Overwatch">Overwatch</option> </select>        
                                                  </div>
                                                  <br>
                                                  <div>
                                                    <label for="Estado">Estado</label>
                                                    <select name="Estado">
                                                      <option value="Pendiente">Pendiente</option>
                                                      <option value="En Curso">En Curso</option>
                                                      <option value="Finalizado">Finalizado</option> </select>        
                                                  </div>

                                              </div>
                                          </div>
                                      </div>
                                      <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                    </div>
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
