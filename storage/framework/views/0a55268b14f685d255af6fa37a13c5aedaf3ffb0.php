<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>actividad</title>

    <style>

        .coli{
            color: #000;
            text-align: center;
            font-size: 10px;
        }
        #miTabla td, #miTabla th {

             padding: 1px;
             text-align:center;
        }
        #miTabla td{
            font-size: 15px;
            border-bottom: 2px solid rgba(243, 207, 207, 0.918);
        }
        #miTabla th {
           border-bottom: 2px solid #000;
        }
        footer {
             position: fixed;
             bottom: 0cm;
             left: 0cm;
             right: 0cm;
             height:1%;
             color: #000;
             text-align: center;
             line-height: 10px;
         }
          .page {
             color:#000;
             font-size: 15px;

         }
         header{
             display: inline-block;
             top: 50%;
         }

        </style>

 </head>
 <body>

     <header>
       
         <span>REPORTE</span><br>
         <span ><b> U.A.G.R.M.</b></span>

     </header> <br>
    <span id="carrera"><b>Registro de Actividades por Periodo</b></span><br>

     <div class= "bg-white">
         <table id="miTabla" class="ui celled table responsive nowrap unstackable" >
             <thead class="coli">
                 <tr>
                <th >NRO</th>
                <th >PERIODO</th>
                <th >NOMBRE</th>
                <th >DESCRIPCIÓN</th>
                <th >FECHA DE INICIO</th>
                <th >FECHA DE FIN</th>
                <th >ENCARGADO</th>
                <th >ESTADO</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $i=1;
                ?>
            <?php $__currentLoopData = $actividades; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $actividad): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                 <td><?php echo e($i++); ?></td>
                <td><?php echo e($periodo=DB::table('periodos')->where('id',$actividad->id_periodo)->value('nombre')); ?></td>
                <td><?php echo e($actividad->name); ?></td>
                <td><?php echo e($actividad->description); ?></td>
                <td><?php echo e($actividad->date_ini); ?></td>
                <td><?php echo e($actividad->date_fin); ?></td>
                <td><?php echo e($user=DB::table('users')->where('id',$actividad->id_user)->value('fullname')); ?></td>
                <?php if($actividad->id_status==1): ?>
                <td><?php echo e($estado=DB::table('statuses')->where('id',$actividad->id_status)->value('name')); ?></td>
                <?php else: ?>
                <td> <strike><?php echo e($estado=DB::table('statuses')->where('id',$actividad->id_status)->value('name')); ?></strike></td>
                <?php endif; ?>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
           </tbody>
      </table>
    </div>
<footer>
    <hr>

    <span style="font-size: 15px">-&nbsp;Cup/psa -ficct
    </span>


    <span style="font-size: 15px;">
        <br> Santa Cruz - Bolivia
    </span>

</footer>

<script type="text/php">
     if ( isset($pdf) ) {
        $pdf->page_script('
            $font = $fontMetrics->get_font("Arial, Helvetica, sans-serif", "normal");
            $pdf->text(600, 860, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 10);
        ');
    } 
    </script>
</body>
</html>



<?php /**PATH C:\xampp3\htdocs\Proyecto-Final-TecnoWeb\resources\views/seguimiento/pdf.blade.php ENDPATH**/ ?>