<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">


    <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
    <title>Gráfica</title>
</head>

<body>
    <div class="container">
        <div class="row mt-2">
            <div class="col-md-6">
                <h2 class="text-center">Gráfica total Usuarios </h2>
                <hr>
                <div id="donut-chart" style="height: 350px;" class="bg-white  shadow"></div>
            </div>

            <div class="col-md-6">
                <h2 class="text-center">Gráfica Actividades Realizadas por Periodo </h2>
                <hr>
                <div id="barra" style="height: 350px; " class="bg-white  shadow"></div>
            
           </div>
        </div>
    </div>

</body>

<style>
    .morris-hover {
        position: absolute;
        z-index: 1000;
    }

    .morris-hover.morris-default-style {
        border-radius: 10px;
        padding: 6px;
        color: #666;
        background: rgba(255, 255, 255, 0.8);
        border: solid 2px rgba(230, 230, 230, 0.8);
        font-family: sans-serif;
        font-size: 12px;
        text-align: center;
    }

    .morris-hover.morris-default-style .morris-hover-row-label {
        font-weight: bold;
        margin: 0.25em 0;
    }

    .morris-hover.morris-default-style .morris-hover-point {
        white-space: nowrap;
        margin: 0.1em 0;
    }

    svg {
        width: 100%;
    }
</style>

<script>
    Morris.Donut({
        element: 'donut-chart',
        data: [

            <?php
            
            foreach ($newarray as $i => $valor) {
                echo '{ value: ' . $valor . ", label: '" . $arrayN[$i - 1] . "', },";
            }
            
            ?>

        ],

        backgroundColor: '#ccc',
        labelColor: '#060300',

        colors: [
            '#FF4933',
            '#FFA533',
            '#FF7D33',
            '#FF9333'
        ],
        formatter: function(x) {
            return x + "Usuarios"
        }
    }).on('click', function(i, row) {
        console.log(i, row);
    });
</script>
<script>
   // Use Morris.Bar
   Morris.Bar({
       element: 'barra',
       data: [

           <?php
           foreach ($newarray2 as $clave => $valor) {
               echo "{x: '" . $aryper[$clave-1] . "',y: " . $valor . '},';
           }
           ?>
       ],
       xkey: 'x',
       ykeys: ['y'],
       labels: ['actividades'],
       barColors: function(row, series, type) {
           if (type === 'bar') {
               var red = Math.ceil(255 * row.y / this.ymax);
               return 'rgb(' + red + ',0,0)';
           } else {
               return '#000';
           }
       }
   });
</script>

</html>