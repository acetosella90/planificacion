<?php
include_once '../funciones/parseo.php';

$datos = parceo();
echo "<pre>"; 
var_dump($datos);
echo "</pre>";

/* dato[0][0] --> fila 1 */
/* dato[1][1] --> fila 2 */
/* dato[n][0] --> años */
/* dato[n][1] --> alumnos */
?>
<!DOCTYPE HTML>
<html>
    
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Highcharts Example</title>

		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<style type="text/css">
		</style>
		<script type="text/javascript">
$(function () {
    $('#container').highcharts({
        title: {
            text: 'Alumnos Egresados por Anos',
            x: -20 //center
        },
        subtitle: {
            text: 'Pentaho: Guarani',
            x: -20
        },
        xAxis: {
            categories: [<?php for($i=1;$i< count($datos); $i++) 
                            echo "'" . $datos[$i][0] . "',";
                        ?>]
        },
        yAxis: {
            title: {
                text: 'Alumnos'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }],
        min: 0
        
        },
        tooltip: {
            valueSuffix: ' Alumnos'
        },
                
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: 'Egresados',
            data: [<?php for($i=1;$i< count($datos); $i++) 
                            echo $datos[$i][1] . ",";
                        ?>]
        }]
    });
});
		</script>
	</head>
	<body>
<script src="js/highcharts.js"></script>
<script src="js/modules/exporting.js"></script>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

	</body>
</html>
