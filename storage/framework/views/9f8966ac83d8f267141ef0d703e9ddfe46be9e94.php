<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User</title>

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
    <span id="carrera"><b>Registro de usuarios</b></span><br>

     <div class= "bg-white">
         <table id="miTabla" class="ui celled table responsive nowrap unstackable" >
             <thead class="coli">
                 <tr>
                <th >NRO</th>
                <th >NOMBRE</th>
                <th >CORREO</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $i=1;
                ?>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                 <td><?php echo e($i++); ?></td>
                <td><?php echo e($user->fullname); ?></td>
                <td><?php echo e($user->email); ?></td>
                

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
            $pdf->text(600, 860, "Pág $PAGE_NUM de $PAGE_COUNT", $font, 15);
        ');
    } 
    </script>
</body>
</html>



<?php /**PATH C:\xampp\htdocs\Proyecto Final TecnoWeb\ProyTecnoWeb-main\resources\views/user/pdf.blade.php ENDPATH**/ ?>