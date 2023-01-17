

<?php $__env->startSection('titulo', 'Inicio'); ?>

<?php $__env->startSection('contenido'); ?>
    <br> <br>

    <div class="container px-6 mb-3">    
        <div class="mt-5">
            <div class="overflow-x-auto relative  sm:rounded-lg  ">

                <table id="table" class="table ui celled table ">
                    <thead>
                        <th class="bg-primary">Id</th>
                        <th class="bg-primary">Nombre</th>
                        <th class="bg-primary">Descripcion</th>
                        <th class="bg-primary">Fecha Inicio</th>
                        <th class="bg-primary">Fecha Fin</th>
                        <th class="bg-primary">Encargado</th>
                        <th class="bg-primary">Estado</th>
                        <th class="bg-primary">Accion</th>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                        ?>
                        <?php $__currentLoopData = $actividades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actividad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php if($actividad->estado==1): ?>
                         <tr>
                            <td><?php echo e($actividad->id); ?></td>
                            <td data-label="nombre"><?php echo e($actividad->name); ?></td>
                            <td data-label="descripcion"><?php echo e($actividad->description); ?></td>
                            <td data-label="fecha_inicio"><?php echo e($actividad->date_ini); ?></td>
                            <td data-label="fecha_fin"><?php echo e($actividad->date_fin); ?></td>
                            <td data-label="Encargado">
                                <?php
                                    $encargados=DB::table('users')
                                                 ->where('id', '=', $actividad->id_user)->get();
                                 ?>
                                  <?php $__currentLoopData = $encargados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $encargado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $encargado2=$encargado->fullname;
                                    ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <?php echo e($encargado2); ?>

                            </td>
                            <td data-label="Estado">
                                <?php
                                    $estados=DB::table('statuses')
                                                 ->where('id', '=', $actividad->id_status)->get();
                                 ?>
                                  <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $estado_nombre=$estado->name;
                                    ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($estado_nombre); ?>

                            </td>
                            <td>
                                <button class="rounded-lg bg-light shadow btn-md ">
                                    <a href="<?php echo e(route('documento.view',$actividad->id)); ?>" >
                                        <span>
                                            <i class="fa fa-plus " style="color: #08defa"></i>
                                        </span>
                                        &nbsp;
                                        Ver Documentos
                                    </a>
                               </button>
                            </td>
                        </tr> 
                         <?php endif; ?>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>
        
      <div><h4>nro visitas <?php echo e($c); ?></h4></div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('style/table.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Proyecto Final TecnoWeb\ProyTecnoWeb-main\resources\views/Documento/indexActividades.blade.php ENDPATH**/ ?>