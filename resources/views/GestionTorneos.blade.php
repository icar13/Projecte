@extends('layouts.app')
@section('content')
    
  </script>
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

                        <!-- Encabezado de página / Breadcrumb -->
                        
                        <!-- Fin Encabezado de página / Breadcrumb -->

                        <!-- Contact Form -->
                        <!-- Campos del formulario de contacto con validación de campos-->
                        <div class="row">
                            <!-- Columna de la izquierda -->

                            <!-- Fin de Columna de la izquierda -->

                            <!-- Parte central -->
                            <div class="col-md-9">
                               
                                <!-- Se inicia el form (ojo todos los elementos de formulario deben ir dentro de esta etiqueta-->
                                <?php $user=Auth::user() ?>
                                {{ Form::model(Auth::user(),array('route' => array('user.updatepwd', Auth::user()->id), 'method' => 'POST')) }}
                                    <!-- Inicio del div central parte de formulario información básica -->
                                    <div class="col-md-12" style="border-width: 1px 1px 0px 1px; border-style: solid; border-color: lightgrey; background: #f1f3f6;">
                                        <div class="col-md-8 col-md-offset-2">

                                            <div class="control-group form-group">
                                                <div class="controls">
                                                    <br>
                                                    <h3>Cambiar contraseña</h3>
                                                    <div>
                                                        <span id="alertName" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="" data-original-title="">
                                                            <label for="password">Nueva contraseña</label>
                                                            <input type="password" pattern=".{5,20}" title="Minimo 6 caractéres" name="password" class="form-control" id="password" placeholder="introduzca una nueva contraseña"  data-validation-required-message="Por favor introduzca una nueva contraseña" required onkeyup='check();'/>
                                                        </span>
                                                    </div>
                                                    <br>

                                                    <div>

                                                        <span id="alertEmail" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="" data-original-title=""> 
                                                            <label for="passconfirm">Confirmar contraseña </label>
                                                            <input type="password" pattern=".{5,20}" title="Minimo 6 caractéres" name="passconfirm" class="form-control" id="confirm_password" placeholder="Vuelva a introducir la nueva contraseña" data-validation-required-message="Las contraseñas no coinciden" required onkeyup='check();'/>
                                                            <span id='message'></span>
                                                        </span>
                                                        	
                                                    </div>
                                                 </div>
                                            </div>
                                        </div>
                                   <div class="modal-footer">
                                        <button type="submit" id="submit" class="btn btn-primary" disabled=true>Cambiar contraseña</button>
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
