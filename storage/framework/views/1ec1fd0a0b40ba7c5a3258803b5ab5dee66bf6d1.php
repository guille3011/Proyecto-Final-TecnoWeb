<?php $__env->startSection('titulo', 'Inicio'); ?>

<?php $__env->startSection('contenido'); ?>
    <br> <br>

    <div class="container px-6 mb-3">    
        <div class="mt-5">
           <button class="rounded-lg bg-light shadow btn-md ">
            <a href="<?php echo e(route('crearTarea.view',$actividad->id)); ?>" >
                <span>
                    <i class="fa fa-plus " style="color: #fa1808"></i>
                </span>
                &nbsp;
                Agregar Tarea
            </a>
                
               </button>

            <div class="overflow-x-auto relative  sm:rounded-lg  ">

                <table id="table" class="table ui celled table ">
                    <thead>
                        <th class="bg-primary">Id</th>
                        <th class="bg-primary">Nombre</th>
                        <th class="bg-primary">Descripcion</th>
                        <th class="bg-primary">Estado</th>
                        <th class="bg-primary">Accion</th>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                        ?>
                        <?php $__currentLoopData = $tareas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tarea): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                         <?php if($tarea->estado==1): ?>
                         <tr>
                            <td><?php echo e($i++); ?></td>
                            <td data-label="name"><?php echo e($tarea->name); ?></td>
                            <td data-label="description"><?php echo e($tarea->description); ?></td>
                            <td data-label="Estado">
                                <?php
                                    $estados=DB::table('statuses')
                                                 ->where('id', '=', $tarea->id_status)->get();
                                 ?>
                                  <?php $__currentLoopData = $estados; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $estado): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php
                                        $estado_nombre=$estado->name;
                                    ?>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e($estado_nombre); ?>

                            </td>
                            <td>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('editarTarea.view')): ?>
                                <a href="<?php echo e(route('editarTarea.view',array($tarea->id,$actividad->id))); ?>" 
                                    class="btn btn-primary btn-sm fas fa-edit  cursor-pointer"></a>
                                    
                                <?php endif; ?>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('eliminarTarea')): ?>
                                <form action="<?php echo e(route('eliminarTarea',array($tarea->id,$actividad->id))); ?>" method="post">
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
<?php echo $__env->make('dashboard.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ProyTecnoWeb-main\resources\views/Tarea/index.blade.php ENDPATH**/ ?>