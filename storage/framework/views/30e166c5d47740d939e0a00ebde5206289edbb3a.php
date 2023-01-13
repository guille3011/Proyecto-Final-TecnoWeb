

<?php $__env->startSection('titulo', 'Inicio'); ?>

<?php $__env->startSection('contenido'); ?>
    <br>  <h1 style="color: blue " class="text-center font-bold">REGISTRO DE ACTIVIDADES</h1><br>

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
                                <a href="<?php echo e(route('editarActividadU.view',$actividad->id)); ?>" class="btn btn-primary btn-sm fas fa-edit  cursor-pointer"></a>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('eliminarActividad')): ?>
                                <form action="<?php echo e(route('eliminarActividad',$actividad->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>
                                    <button class="btn btn-danger btn-sm fas fa-trash-alt  cursor-pointer"
                                        onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar"></button>
                               </form>  
                                <?php endif; ?>

                            </td>
                        </tr> 
                         <?php endif; ?>
                            
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('style/table.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('dashboard.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProyTecnoWeb-main\resources\views/Actividad/indexUser.blade.php ENDPATH**/ ?>