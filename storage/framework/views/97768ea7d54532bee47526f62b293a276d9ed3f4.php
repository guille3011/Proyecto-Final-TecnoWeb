

<?php $__env->startSection('titulo', 'Inicio'); ?>

<?php $__env->startSection('contenido'); ?>
    <br>
    <h1 style="color: blue " class="text-center font-bold">REGISTROS DE PERIODO</h1><br>

    <div class="container px-6 mb-3">
        <div class="mt-5">
            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('periodo.create')): ?>
                <button class="rounded-lg bg-light shadow btn-md ">
                    <a href="<?php echo e(route('periodo.create')); ?>">
                        <span>
                            <i class="fa fa-plus " style="color: #fa1808"></i>
                        </span>
                        &nbsp;
                        Agregar
                    </a>

                </button>
            <?php endif; ?>

            <div class="overflow-x-auto relative  sm:rounded-lg  ">

                <table id="table" class="table ui celled table ">
                    <thead>
                        <th class="bg-primary">Id</th>
                        <th class="bg-primary">Nombre</th>
                        <th class="bg-primary">FechaInicio</th>
                        <th class="bg-primary">FechaFin</th>
                        <th class="bg-primary">Descripcion</th>
                        <th class="bg-primary">Accion</th>
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                        ?>
                        <?php $__currentLoopData = $periodos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $periodo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($periodo->estado == 1): ?>
                                <tr>
                                    <td><?php echo e($i++); ?></td>
                                    <td data-label="nombre"><?php echo e($periodo->nombre); ?></td>
                                    <td data-label="finicio"><?php echo e($periodo->finicio); ?></td>
                                    <td data-label="ffin"><?php echo e($periodo->ffin); ?></td>
                                    <td data-label="descripcion"><?php echo e($periodo->descripcion); ?></td>
                                    <td>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('periodo.edit')): ?>
                                        <a href="<?php echo e(route('periodo.edit', $periodo->id)); ?>"
                                            class="btn btn-primary btn-sm fas fa-edit  cursor-pointer"></a>
                                        <?php endif; ?>
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('periodo.destroy')): ?>
                                            <form action="<?php echo e(route('periodo.destroy', $periodo->id)); ?>" method="post">
                                                <?php echo csrf_field(); ?>
                                                <?php echo method_field('delete'); ?>

                                                <button class="btn btn-danger btn-sm fas fa-trash-alt  cursor-pointer"
                                                    onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')"
                                                    value="Borrar"></button>
                                            </form>
                                        <?php endif; ?>

                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                </table>
                <h4>nro visitas <?php echo e($c); ?></h4>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('style/table.css')); ?>">
<?php $__env->stopSection(); ?>

<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp3\htdocs\Proyecto-Final-TecnoWeb\resources\views/periodo/index.blade.php ENDPATH**/ ?>