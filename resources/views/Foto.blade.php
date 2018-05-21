@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel de control</div>

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
                                <?php $user=Auth::user() ?>
                                {{ Form::model(Auth::user(),array('route' => array('user.updateimg', Auth::user()->id), 'method' => 'POST')) }}

                                <!-- Inicio del div central parte de formulario información básica -->
                                <div class="col-md-12" style="border-width: 1px 1px 0px 1px; border-style: solid; border-color: lightgrey; background: #f1f3f6;">
                                    <div class="col-md-8 col-md-offset-2">

                                        <div class="control-group form-group">
                                            <div class="controls">
                                                <br>
                                                <h3>Escoje un nuevo avatar</h3>
                                                <br>
                                                <div>
                                                    
                                                        <div class="cc-selector">
                                                            <input id="posho" type="radio" name="imgavatar" value="img/posho.jpeg" checked/>
                                                            <label class="drinkcard-cc posho" for="posho" ></label>
                                                            <input id="draven" type="radio" name="imgavatar" value="img/draven.jpg" />
                                                            <label class="drinkcard-cc draven"for="draven"></label>
                                                             <input id="ratilla" type="radio" name="imgavatar" value="img/ratilla.jpg" />
                                                            <label class="drinkcard-cc ratilla" for="ratilla"></label>
                                                            <input id="link" type="radio" name="imgavatar" value="img/link.jpg" />
                                                            <label class="drinkcard-cc link" for="link"></label>

                                                        </div>
                                                    
                                                </div>
                                                <br>


                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="submit" class="btn btn-primary">Cambiar avatar</button>
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
