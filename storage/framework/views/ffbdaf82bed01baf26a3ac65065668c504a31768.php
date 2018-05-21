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
                                        <a href="<?php echo e(route('Torneo.index')); ?>" class="list-group-item" >Ver participantes</a>
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
                    <?php $__currentLoopData = $participantes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($value->name); ?></td>
                     <td> <form action="<?php echo e(action('ParticipantesController@destroy', $value->id)); ?>" method="post" >
                   <?php echo e(csrf_field()); ?>

                   <input name="_method" type="hidden" value="DELETE">
              
                   <button class="btn btn-danger btn-xs" onclick="return confirm('Seguro que quieres eliminar este particpante?');" type="submit"><img class='icon' src="../img/delete.png"></button>
                 </td>
                  </tr>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
