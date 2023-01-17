

<?php $__env->startSection('titulo', 'User'); ?>

<?php $__env->startSection('contenido'); ?>
    <br> <h1 style="color: blue " class="text-center font-bold">REGISTROS DE USUARIOS</h1> <br>

    <div class="container px-6 mb-3">    
        <div class="mt-5">
          <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.create')): ?>
          <button class="rounded-lg bg-light shadow btn-md ">
            <a href="<?php echo e(route('user.create')); ?>" >
                <span>
                    <i class="fa fa-plus " style="color: #fa1808"></i>
                </span>
                &nbsp;
                Agregar
            </a>              
             </button> 
             <button class="rounded-lg bg-light shadow btn-md ">
                <a href="<?php echo e(route('pdf')); ?>" >
                    <span>
                        <i class="fa fa-file " style="color: #fa1808"></i>
                    </span>
                    &nbsp;
                    Pdf
                </a>              
                 </button>
          <?php endif; ?>

            <div class="overflow-x-auto relative  sm:rounded-lg  ">

                <table id="table" class="table ui celled table ">
                    <thead>
                        <th class="bg-primary">Id</th>
                        <th class="bg-primary">Fullname</th>
                        <th class="bg-primary">Ci</th>
                        <th class="bg-primary">Email</th>
                        <th class="bg-primary">Accion</th>
                       
                    </thead>
                    <tbody>
                        <?php
                            $i = 1;
                        ?>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
                         <tr>
                            <td><?php echo e($i++); ?></td>
                            <td data-label="nombre"><?php echo e($user->fullname); ?></td>
                            <td data-label="finicio"><?php echo e($user->ci); ?></td>
                            <td data-label="ffin"><?php echo e($user->email); ?></td>
                            <td>
                                <a href="<?php echo e(route('user.edit',$user->id)); ?>" class="btn btn-primary btn-sm fas fa-edit  cursor-pointer"></a>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('user.destroy')): ?>
                                <form action="<?php echo e(route('user.destroy',$user->id)); ?>" method="post">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('delete'); ?>                            
                                    <button class="btn btn-danger btn-sm fas fa-trash-alt  cursor-pointer"
                                        onclick="return confirm('¿ESTA SEGURO DE  BORRAR?')" value="Borrar"></button>
                                </form>  
                                <?php endif; ?>

                            </td>
                        </tr> 
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
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.23/js/dataTables.bootstrap5.min.js"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('dashboard.dashboard', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Proyecto Final TecnoWeb\ProyTecnoWeb-main\resources\views/user/index.blade.php ENDPATH**/ ?>