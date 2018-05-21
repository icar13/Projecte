


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/ico/favicon.png">

    <title>DragonTournament</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/estils.css">
    <!-- Custom styles for this template -->
    <link href="css/main.css" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
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

    <!-- Fixed navbar -->
   	 
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
                               <span class='head_text'>
                               {{ __('Hearthstone') }}
                           </span>
                           </a>

                           <a class="dropdown-item" href="{{ route('Torneo.VerLOL') }}">
                               <img src="img/LOLLogo.jpg">
                                 <span class='head_text'>
                               {{ __('League of Legends') }}
                           </span>
                           </a>
                            <a class="dropdown-item" href="{{ route('Torneo.VerMario')}}">
                               <img src="img/MarioKartLogo.png">
                                <span class='head_text'>
                               {{ __('Mario Kart') }}
                           </span>
                           </a>
                                                      <a class="dropdown-item" href="{{ route('Torneo.VerOverwatch')}}">
                               <img src="img/OverwatchLogo.png">
                                <span class='head_text'>
                               {{ __('Overwatch') }}
                           </span>
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
                              <span class='head_text'>
                            {{ Auth::user()->name }} 
                              </span>
                             
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                           <a class="dropdown-item" href="{{ url('/perfil') }}">
                               <img src="img/logoperfil.png">  <span class='head_text'>
                               {{ __('Ver Perfil') }}
                           </span>
                           </a>

                           <a class="dropdown-item" href="{{ route('Torneo.index') }}">
                               <img src="img/logogestion.png">
                                 <span class='head_text'>
                               {{ __('Gestión de Torneos') }}
                           </span>
                           </a>

                           <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                           <img src="img/logoLogout.png">
                             <span class='head_text'>
                           {{ __('Cerrar sesión') }}
                       </span>
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

    
    
	<div id="headerwrap">
		<div class="container">
			<div class="row centered">
				<div class="col-lg-8 col-lg-offset-2">
				<h1>DragonTournament </h1>
				<h2>Plataforma de Torneos Online</h2>
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- headerwrap -->


	<div class="container w">
		<div class="row centered">
			<br><br>
			<div class="col-lg-4">
				<i class="fa fa-gamepad"></i>
				<h4>Juega</h4>
				<p>Con esta plataforma podras llegar a mejorar tu nivel de juego,da igual que nivel seas podras competir sin ningun requisito previo </p>
			</div><!-- col-lg-4 -->

			<div class="col-lg-4">
				<i class="fa fa-user"></i>
				<h4>Descubre</h4>
				<p>Personaliza tu usuario y unete a la comunidad de DragonTournament,encontraras jugadores que aspiren a mejorar como tú competitivamente </p>
			</div><!-- col-lg-4 -->

			<div class="col-lg-4">
				<i class="fa fa-trophy"></i>
				<h4>Gana</h4>
				<p>Con nuestro sistema de premio por puntos podras lograr conseguir esa skin que tanto deseas en tu juego a la vez que te diviertes.</p>
			</div><!-- col-lg-4 -->
		</div><!-- row -->
		<br>
		<br>
	</div><!-- container -->


	<!-- PORTFOLIO SECTION -->
	<div id="dg">
		<div class="container">
			<div class="row centered">
				<h2>Equipo</h2>
				<br>
				<div class="col-lg-4">
					<div class="">
					<a href="https://twitter.com/BolduIcar"><img src="img/icar.png" alt="icar"></a>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="tilt">
					<a href="#"><img src="img/p03.png" alt=""></a>
					</div>
				</div>

				
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- DG -->


	<!-- FEATURE SECTION -->
	
	<
	
	<div id="r">
		<div class="container">
			<div class="row centered">
				<div class="col-lg-8 col-lg-offset-2">
					<h4>WE ARE STORYTELLERS. BRANDS ARE OUR SUBJECTS. DESIGN IS OUR VOICE.</h4>
					<p>We believe ideas come from everyone, everywhere. At BlackTie, everyone within our agency walls is a designer in their own right. And there are a few principles we believe—and we believe everyone should believe—about our design craft. These truths drive us, motivate us, and ultimately help us redefine the power of design.</p>
				</div>
			</div><!-- row -->
		</div><!-- container -->
	</div><! -- r wrap -->
	
	
	<!-- FOOTER -->
	<div id="f">
		<div class="container">
			<div class="row centered">
				<a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-dribbble"></i></a>
		
			</div><!-- row -->
		</div><!-- container -->
	</div><!-- Footer -->


	<!-- MODAL FOR CONTACT -->
	<!-- Modal -->
	<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
	        <h4 class="modal-title" id="myModalLabel">contact us</h4>
	      </div>
	     
	     
	  </div><!-- /.modal-dialog -->
	</div><!-- /.modal -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
  </body>
</html>
