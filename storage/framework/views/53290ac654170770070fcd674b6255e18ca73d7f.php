<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">


                <div class="card-body">
                    <?php if(session('status')): ?>
                    <div class="alert alert-success">
                        <?php echo e(session('status')); ?>

                    </div>
                    <?php endif; ?>
                    <div class="container">
                        <div class="row justify-content-center">

                            </div>
                            <div>
                                <h2 align="center">Lista de Torneos de League of Legends</h2>
                                <br>
                                <!-- Se inicia el form (ojo todos los elementos de formulario deben ir dentro de esta etiqueta-->
                                <table class="table table-striped table-bordered panel-body">
                  <thead>
                    <tr>
                      <td>Nombre</td>
                      <td>Fecha</td>
                      <td>MaxParticipantes</td>
                      <td>Juego</td>
                      <td>Puntos</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $torneos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><a href="<?php echo e(action('TorneoController@Vertorneo',[$value->id] )); ?>"><?php echo e($value->Nombre); ?></td>
                      <td><?php echo e($value->Fecha); ?></td>
                      <td><?php echo e($value->MaxParticipantes); ?></td>
                      <td><?php echo e($value->Juego); ?></td>
                      <td><?php echo e($value->Puntos); ?></td>
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
</form>
</td>
</tr>
</tbody>
</table>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>