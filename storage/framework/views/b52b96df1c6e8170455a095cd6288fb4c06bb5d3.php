<?php $__env->startSection('content'); ?>
<div>                
  <div class="row justify-content-center">
    <div class="content">
      <div class="col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-body">
            <div align="center"><h3>Lista Torneos</h3></div>
            <div class="pull-right">
              <div class="btn-group">
             </div>
             <div class="row justify-content-center">
              <a href="<?php echo e(url('/CrearTorneo')); ?>" id="botó" class="btn btn-primary">Crear torneo</a> </div>
              <div><br>
                <table class="table table-striped table-bordered panel-body">
                  <thead>
                    <tr>
                      <td>ID</td>
                      <td>Nombre</td>
                      <td>Fecha</td>
                      <td>MaxParticipantes</td>
                      <td>Juego</td>
                      <td>Puntos</td>
                      <td>Estado</td>
                      <td>Creador</td>
                      <td>Actions</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $__currentLoopData = $torneos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                      <td><?php echo e($value->id); ?></td>
                      <td><a href="<?php echo e(route('Torneo.show',[$value->id] )); ?>"><?php echo e($value->Nombre); ?></a></td>
                      <td><?php echo e($value->Fecha); ?></td>
                      <td><?php echo e($value->MaxParticipantes); ?></td>
                      <td><?php echo e($value->Juego); ?></td>
                      <td><?php echo e($value->Puntos); ?></td>
                       <td><?php echo e($value->Estado); ?></td>
                      <td><?php echo e($value->name_user_create); ?></td>
                     <td> <form action="<?php echo e(action('TorneoController@destroy', $value->id)); ?>" method="post" >
                   <?php echo e(csrf_field()); ?>

                   <input name="_method" type="hidden" value="DELETE">
              
                   <button class="btn btn-danger btn-xs" onclick="return confirm('Seguro que quieres eliminar este torneo?');" type="submit"><img class='icon' src="img/delete.png"></button>
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>