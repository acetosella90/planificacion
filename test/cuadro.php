<?php
include './../class/Conexion.php';
include './../class/Clases.php';
$conexion = new Conexion();

$sql = "
SELECT
    academica_d_facultades.facultad as facultad,
    academica_d_series.nombreserie as tipo_alumno,
    academica_ft_cuadros1y2.idanioinformado as anio,
    academica_d_titulos.titulo as titulo,
    sum(academica_ft_cuadros1y2.cantidad) as total
FROM
    araucano.academica_d_series as academica_d_series,
    araucano.academica_ft_cuadros1y2 as academica_ft_cuadros1y2,
    araucano.academica_d_facultades as academica_d_facultades,
    araucano.academica_d_titulos as academica_d_titulos
WHERE
    academica_ft_cuadros1y2.idserie = academica_d_series.idserie
    AND academica_ft_cuadros1y2.idfacultad = academica_d_facultades.idfacultad
    AND academica_ft_cuadros1y2.idtitulo = academica_d_titulos.idtitulo

GROUP BY
    academica_d_facultades.facultad,
    academica_d_series.nombreserie,
    academica_ft_cuadros1y2.idanioinformado,
    academica_d_titulos.titulo  
ORDER BY 
    facultad, titulo;";

$consulta = $conexion->prepare($sql);

$consulta->execute();
$todo = $consulta->fetchAll();



$facultades = array();
$j = 0;

for ($i = 0; $i < count($todo); $i++) {

    if ($facultades[$j - 1] != $todo[$i]['facultad']) {
        $facultades[$j] = $todo[$i]['facultad'];
        $j++;
    }
}
?>

<form  method="POST">
    <?php
    Clases::getComboFechas(); // Combo de fechas
    Clases::getFacultades($facultades); // Combo facultades
    Clases::getTipoAlumno(); // Checks
    ?>
    <input style="margin-left: 10px;" type="submit" value="Buscar">
</form>

<?php
$sql = "SELECT
    academica_d_facultades.facultad as facultad,
    academica_d_series.nombreserie as tipo_alumno,
    academica_ft_cuadros1y2.idanioinformado as anio,
    academica_d_titulos.titulo as titulo,

    sum(academica_ft_cuadros1y2.cantidad) as total
FROM
	araucano.academica_ft_cuadros1y2 INNER JOIN araucano.academica_d_series 
		ON academica_ft_cuadros1y2.idserie = academica_d_series.idserie 
	INNER JOIN araucano.academica_d_facultades 
		ON academica_ft_cuadros1y2.idfacultad = academica_d_facultades.idfacultad 
	INNER JOIN araucano.academica_d_titulos 
		ON academica_ft_cuadros1y2.idtitulo = academica_d_titulos.idtitulo
WHERE
	facultad like '$_POST[combo_facultades]'
	AND idanioinformado = $_POST[combo_fechas]
	AND nombreserie in ('" . $_POST[tipo_alumno][0] . "','" . $_POST[tipo_alumno][1] . "','" . $_POST[tipo_alumno][2] . "')

group by 1,2,3,4

ORDER BY titulo;";

$consulta = $conexion->prepare($sql);

$consulta->execute();
$todo = $consulta->fetchAll();
?>

<table  rules="all" border="1">
    <tr>
        <td><strong>Escuelas</strong></td>
        <td><strong>Titulos</strong></td>
        <td><strong>Tipo de alumnos</strong></td>
        <td><strong>Total</strong></td>
    </tr>
    <?php for ($i = 0; $i < count($todo); $i++) { ?>
        <tr>
            <td><?php echo $todo[$i][facultad]; ?></td>
            <td><?php echo $todo[$i][titulo]; ?></td>
            <td><?php echo $todo[$i][tipo_alumno]; ?></td>
            <td><?php echo $todo[$i][total]; ?></td>
        </tr>
        <?php
        if ($todo[$i][tipo_alumno] == "Alumnos")
            $total[alumnos]+= $todo[$i][total];
        if ($todo[$i][tipo_alumno] == "Egresados")
            $total[egresados]+= $todo[$i][total];
        if ($todo[$i][tipo_alumno] == "Reinscriptos")
            $total[reinscriptos]+= $todo[$i][total];
    }
    ?>
</table>

<table  rules="all" border="1" style="margin-top: 15px;">
    <tr>
        <td colspan="2"> A&Ntilde;O <?php echo $_POST[combo_fechas]; ?></td>
    </tr>
    <tr>
        <td><strong>Total de Alumnos</strong></td>
        <td><?php
            if ($total[alumnos])
                echo $total[alumnos];
            else
                echo 0;
            ?></td>
    </tr>
    <tr>
        <td><strong>Total de Egresados</strong></td>
        <td><?php
            if ($total[egresados])
                echo $total[egresados];
            else
                echo 0;
            ?></td>
    </tr>
    <td><strong>Total de Reinscriptos</strong></td>
    <td><?php
        if ($total[reinscriptos])
            echo $total[reinscriptos];
        else
            echo 0;
        ?></td>
</tr>

</table>
<?php
$titulo = array();
$j = 0;

for ($i = 0; $i < count($todo); $i++) {

    if ($titulo[$j - 1] != $todo[$i]['titulo']) {
        $titulo[$j] = $todo[$i]['titulo'];
        $j++;
    }
}


for ($i = 0; $i < count($titulo); $i++) {
    $a = 0;
    $e = 0;
    $r = 0;
    for ($j = 0; $j < count($todo); $j++) {

        if ($todo[$j][tipo_alumno] == "Alumnos" && $todo[$j][titulo] == $titulo[$i])
            $t[$i] = array(titulo => $titulo[$i], alumnos => $a+=$todo[$j][total], egresados => $e, reinscriptos => $r);

        if ($todo[$j][tipo_alumno] == "Egresados" && $todo[$j][titulo] == $titulo[$i])
            $t[$i] = array(titulo => $titulo[$i], alumnos => $a, egresados => $e+=$todo[$j][total], reinscriptos => $r);

        if ($todo[$j][tipo_alumno] == "Reinscriptos" && $todo[$j][titulo] == $titulo[$i])
            $t[$i] = array(titulo => $titulo[$i], alumnos => $a, egresados => $e, reinscriptos => $r+=$todo[$j][total]);
    }
}


echo "<pre>";
var_dump($t);
echo "</pre>";
?>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<style type="text/css">
    ${demo.css}
</style>
<script type="text/javascript">
    $(function () {
        $('#container').highcharts({
            data: {
                table: 'datatable'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Alumnos por Titulos'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Cantidad de Alumnos'
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                            this.point.y + ' alumnos en ' + this.point.name.toLowerCase();
                }
            }
        });
    });
</script>
</head>
<body>

    <script src="../test/js/highcharts.js"></script>
    <script src="../test/js/modules/data.js"></script>
    <script src="../test/js/modules/exporting.js"></script>

    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    <table id="datatable" ">
        <thead>
            <tr>
                <th></th>
                <th>Alumnos</th>
                <th>Egresados</th>
                <th>Reinscriptos</th>
            </tr>
        </thead>
        <tbody>
<?php for ($i = 0; $i < count($todo); $i++) { ?>
                <tr>
                    <th><?php echo $todo[$i][titulo]; ?></th>
                    <td><?php
            if ($todo[$i][tipo_alumno] == "Alumnos")
                echo $todo[$i][total];
            else
                echo 0;
    ?></td>
                    <td><?php
                    if ($todo[$i][tipo_alumno] == "Egresados")
                        echo $todo[$i][total];
                    else
                        echo 0;
    ?></td>
                    <td><?php
                        if ($todo[$i][tipo_alumno] == "Reinscriptos")
                            echo $todo[$i][total];
                        else
                            echo 0;
                        ?></td>
                </tr>
<?php } ?> 

        </tbody>
    </table>

