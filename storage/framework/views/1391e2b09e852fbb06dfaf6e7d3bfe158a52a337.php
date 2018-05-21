<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Panel de control</div>

                <div class="card-body">
                    <?php if(session('status')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>
                    <div class="container">

                        <!-- Encabezado de página / Breadcrumb -->
                       
                        <!-- Fin Encabezado de página / Breadcrumb -->

                        <!-- Contact Form -->
                        <!-- Campos del formulario de contacto con validación de campos-->
                        <div class="row">
                            <!-- Columna de la izquierda -->
                            <div class="col-md-3">
                                <div class="col-md-12" align="center">
                                    <img class="img-responsive img-portfolio img-hover imatgegran" src="<?php echo e(Auth::user()->fotoperfil); ?>">
                                </div>
                                <div class="col-md-12">
                                    <p class="text-center"><strong> <?php echo e(Auth::user()->name); ?></strong></p>
                                    

                                </div>



                                <div class="col-md-15">
                                    <!-- Barra vertical de opciones del perfil de usuairo -->
                                    
                                     <ul class="list-group list-primary">
                                        <a href="<?php echo e(url('/Foto')); ?>" class="list-group-item" >Cambiar avatar</a>
                                        <a href="<?php echo e(url('/perfil')); ?>" class="list-group-item" >Ver perfil</a>
                                        <a href="<?php echo e(url('/Changepwd')); ?>" class="list-group-item">Cambiar contraseña</a>

                                    </ul>
                                </div>
                                <!-- Fin Barra vertical de opciones del perfil de usuario -->
                            </div>
                            <!-- Fin de Columna de la izquierda -->

                            <!-- Parte central -->
                            <div class="col-md-9">
                                <!-- Se inicia el form (ojo todos los elementos de formulario deben ir dentro de esta etiqueta-->
                                <?php $user=Auth::user() ?>
                                <?php echo e(Form::model(Auth::user(),array('route' => array('user.update', Auth::user()->id), 'method' => 'PUT'))); ?>

                                    <!-- Inicio del div central parte de formulario información básica -->
                                    <div class="col-md-12" style="border-width: 1px 1px 0px 1px; border-style: solid; border-color: lightgrey; background: #f1f3f6;">
                                        <div class="col-md-8 col-md-offset-2">

                                            <div class="control-group form-group">
                                                <div class="controls">
                                                    <br>
                                                    <h3>Información de Perfil</h3>
                                                    <div>
                                                        <span id="alertName" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="" data-original-title="">
                                                            <label for="Nom">Nombre usuario</label>
                                                            <input type="text" name="Nom" class="form-control" id="Nom" placeholder="Introduzca su nombre" required="" data-validation-required-message="Por favor introduzca su nomnbre." value="<?php echo e(Auth::user()->name); ?>">
                                                        </span>
                                                    </div>
                                                    <br>

                                                    <div>

                                                        <span id="alertEmail" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="" data-original-title=""> 
                                                            <label for="email">Email </label>
                                                            <input type="email" name="email" class="form-control" id="txtEmail" placeholder="Introduzca su email" required="" data-validation-required-message="Por favor introduzca su email." value="<?php echo e(Auth::user()->email); ?>">
                                                        </span>

                                                    </div>
                                                    <span></span>
                                                    <br>
                                                    <h3>Cuentas:</h3>

                                                    <div>
                                                        <span id="alertName" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="" data-original-title="">
                                                            <label for="Cuentablizzard">Battletag</label> <img class="img-responsive img-portfolio img-hover icon" src="img/Battle-icon.png"/>
                                                            <input type="text" class="form-control" id="Cuentablizzard" placeholder="Inserte su batlettag" data-validation-required-message="Por favor introduzca su nombre." name="Cuentablizzard" value="<?php echo e(Auth::user()->Cuentablizzard); ?>">
                                                        </span>
                                                    </div>
                                                    <br>
                                                    <div>
                                                        <span id="alertName" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="" data-original-title="">
                                                            <label for="Cuentalol">Cuenta League of Legends  </label>   <img class="img-responsive img-portfolio img-hover icon" src="img/lol-icon.jpg">
                                                            <input type="text" name="Cuentalol" class="form-control" id="Cuentalol" placeholder="Inserte su cuenta de Lol"  data-validation-required-message="Por favor introduzca su nomnbre." value="<?php echo e(Auth::user()->Cuentalol); ?>">
                                                        </span>
                                                    </div>
                                                <br>
                                                    <div>
                                                        <span id="alertName" data-toggle="popover" data-trigger="hover" data-placement="right" title="" data-content="" data-original-title="">
                                                            <label for="nintendo">Clave amigo Nintendo</label>       <img class="img-responsive img-portfolio img-hover icon" src="img/nintendo-icon.png">
                                                            <input type="text" name="Cuentanintendo" class="form-control" id="nintendo" placeholder="Inserte su clave amigo"  data-validation-required-message="Por favor introduzca su nomnbre." value="<?php echo e(Auth::user()->Cuentanintendo); ?>">
                                                        </span>
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
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>