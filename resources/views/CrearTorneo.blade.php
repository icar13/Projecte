@extends('layouts.app')
@section('content')


<script type="text/javascript">
    var check = function() {
        if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value)  {
            document.getElementById('message').style.color = 'green';
        document.getElementById('message').innerHTML = 'Coinciden';
        document.getElementById('submit').disabled = false;

    } else {
        document.getElementById('message').style.color = 'red';
        document.getElementById('message').innerHTML = 'Las contraseñas no coinciden';
        document.getElementById('submit').disabled = true;
    }
}
</script>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Gestión de torneos</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="container">

                        <!-- Encabezado de página / Breadcrumb -->

                        <!-- Fin Encabezado de página / Breadcrumb -->

                        <!-- Contact Form -->
                        <!-- Campos del formulario de contacto con validación de campos-->
                        <div class="row">
                            <!-- Columna de la izquierda -->
                            <div class="col-md-3">
                                <div class="col-md-12" align="center">
                                    <img class="img-responsive img-portfolio img-hover imatgegran" src="{{Auth::user()->fotoperfil}}">
                                </div>
                                <div class="col-md-12">
                                    <p class="text-center"><strong> {{ Auth::user()->name }}</strong></p>

                                </div>



                                <div class="col-md-15">
                                    <!-- Barra vertical de opciones del perfil de usuairo -->

                                    <ul class="list-group list-primary">
                                        <a href="{{ url('/Foto') }}" class="list-group-item" >Cambiar avatar</a>
                                        <a href="{{ url('/perfil') }}" class="list-group-item" >Ver perfil</a>
                                        <a href="{{ url('/Changepwd') }}" class="list-group-item">Cambiar contraseña</a>

                                    </ul>
                                </div>
                                <!-- Fin Barra vertical de opciones del perfil de usuario -->
                            </div>
                            <!-- Fin de Columna de la izquierda -->

                            <!-- Parte central -->
                            <div class="col-md-9">

                                <!-- Se inicia el form (ojo todos los elementos de formulario deben ir dentro de esta etiqueta-->
                                {{ Form::model(Auth::user(),array('route' => array('Torneo.store','method' => 'POST'))) }}
                                <!-- Inicio del div central parte de formulario información básica -->
                                <div class="col-md-12" style="border-width: 1px 1px 0px 1px; border-style: solid; border-color: lightgrey; background: #f1f3f6;">
                                    <div class="col-md-8 col-md-offset-2">

                                        <div class="control-group form-group">
                                            <div class="controls">
                                                <br>
                                                <h3>Crear torneo</h3>
                                                <br>
                                                <div>
                                                    <label for="nombre">Nombre del torneo </label>
                                                    <input type="text" name="Nombre" class="form-control" id="Nom" placeholder="Introduzca un nombre para el torneo" required="" data-validation-required-message="Por favor introduzca un nombre para el torneo.">
                                                </div>
                                                <br>
                                                <div>
                                                    <label for="data">Fecha </label>
                                                    <input type="datetime-local" name="Fecha" class="form-control" id="fecha" placeholder="Introduzca la Fecha del torneo" required="" data-validation-required-message="Por favor introduzca la fecha del torneo." >
                                                </div>
                                                <br>
                                                <div>
                                                    <label for="NumParticipantes">Número maximo de participantes: </label> 
                                                    <input type="number" class="form-control" id="maxparticipantes" placeholder="Inserte un número de participantes maximos" data-validation-required-message="Por favor introduzca el numero de Participantes maximos." name="MaxParticipantes" value="1" min="1" max="999999999">
                                                </div>
                                                <br>
                                                <div>
                                                    <label for="NumPuntos">Recompensa de puntos: </label> 
                                                    <input type="number" class="form-control" id="Puntos" placeholder="Inserte un número de puntos" data-validation-required-message="Por favor introduzca el numero de Puntos para la recompensa." name="Puntos" min="1" max="999999999">
                                                </div>
                                                <br>
                                                <div></div>
                                                <label for="juego">Juego  </label> 
                                                <select name="Juego">
                                                 <option value="Hearthstone">Hearthstone</option>
                                                 <option value="League of Legends">League of Legends</option>
                                                 <option value="Mario Kart">MarioKart</option>
                                                 <option value="Overwatch">Overwatch</option> </select>                                   


                                        
                                     </div>
                                 </div>
                             </div>
                             <div class="modal-footer">
                                <button type="submit" id="submit" class="btn btn-primary">Crear Torneo</button>
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
@endsection
