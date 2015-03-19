<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
    <?php
    require_once 'class/Conexion.php';
    require_once 'class/Clases.php';
    require_once 'class/Consultas.php';
    require_once 'funciones/parseo.php';

    $conexion = new Conexion();

    $consulta = $conexion->prepare(Consultas::getTodoAraucano());
    $consulta->execute();
    $todo = $consulta->fetchAll();

    $facultades = getFacultades($todo);
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
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $consulta = $conexion->prepare(Consultas::getFiltroAraucano($_POST));
    $consulta->execute();
    $todo = $consulta->fetchAll();
    ?>
    <div style="margin-top: 100px;">
        <table style='float: left;'  rules="all" border="1">
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

        <div id="container2" style="width: 550px; height: 400px; margin: 0 auto; float: left; "></div>
    </div>
    <div style="clear: both; height: 0px;"><!-- e --></div>

    <table  rules="all" border="1" style="margin-top: 15px;float: left">
        <tr>
            <td colspan="2"> A&Ntilde;O <?php echo $_POST[combo_fechas]; ?></td>
        </tr>
        <tr>
            <td><strong>Total de Alumnos</strong></td>
            <td><?php
                if ($total[alumnos])
                    echo $al = $total[alumnos];
                else
                    echo 0;
                ?></td>
        </tr>
        <tr>
            <td><strong>Total de Egresados</strong></td>
            <td><?php
                if ($total[egresados])
                    echo $eg = $total[egresados] ;
                else
                    echo 0;
                ?></td>
        </tr>
        <td><strong>Total de Reinscriptos</strong></td>
        <td><?php
            if ($total[reinscriptos])
                echo $re = $total[reinscriptos];
            else
                echo 0;
            ?></td>
        </tr>

    </table>
    <div id="container3" style="max-width: 200px; height: 250px; margin: 0 auto; float: left; margin-top: 0px;"></div>
    <?php
    $titulo = getTitulos($todo);

    for ($i = 0, $a = 0, $e = 0, $r = 0; $i < count($titulo); $i++) {

        for ($j = 0; $j < count($todo); $j++) {

            if ($todo[$j][tipo_alumno] == "Alumnos" && $todo[$j][titulo] == $titulo[$i])
                $t[$i] = array(titulo => $titulo[$i], alumnos => $a+=$todo[$j][total], egresados => $e, reinscriptos => $r);

            if ($todo[$j][tipo_alumno] == "Egresados" && $todo[$j][titulo] == $titulo[$i])
                $t[$i] = array(titulo => $titulo[$i], alumnos => $a, egresados => $e+=$todo[$j][total], reinscriptos => $r);

            if ($todo[$j][tipo_alumno] == "Reinscriptos" && $todo[$j][titulo] == $titulo[$i])
                $t[$i] = array(titulo => $titulo[$i], alumnos => $a, egresados => $e, reinscriptos => $r+=$todo[$j][total]);
        }
    }


    $r = array_sort($t, 'alumnos', SORT_DESC);
    $r = array_slice($r, 0, 10);

    foreach ($t as $cuadro) {
        $c.= "'" . $cuadro[titulo] . "',";
    }

    $c = substr($c, 0, -1);
    ?>

    <script>

        $(function () {
            $('#container2').highcharts({
                chart: {
                    type: 'bar'
                },
                title: {
                    text: 'Alumnos por titulo'
                },
                xAxis: {
                    categories: [<?php echo $c; ?>]
                },
                yAxis: {
                    min: 0,
                    title: {
                        text: 'Cantidad de alumnos'
                    }
                },
                legend: {
                    align: 'right',
                    verticalAlign: 'top',
                    layout: 'vertical',
                    x: 0,
                    y: 100
                },
                plotOptions: {
                    series: {
                        stacking: 'normal'
                    }
                },
                series: [{
                        name: 'Alumnos',
                        data: [<?php
    foreach ($r as $cuadro) {
        echo $cuadro[alumnos] . ", ";
    }
    ?>]
                    },
                    {
                        name: 'Egresados',
                        data: [<?php
    foreach ($r as $cuadro) {
        echo $cuadro[reinscriptos] . ", ";
    }
    ?>]
                    },
                    {
                        name: 'Reinscriptos',
                        data: [<?php
    foreach ($r as $cuadro) {
        echo $cuadro[reinscriptos] . ", ";
    }
    ?>]
                    }

                ]
            });
        });

    </script>
    <script src="test/js/highcharts.js"></script>
    <script src="test/js/modules/data.js"></script>
    <script src="test/js/modules/exporting.js"></script>
    <script src="test/js/highcharts-3d.js"></script>

    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>

    <table id="datatable" style='display:none'>
        <thead>
            <tr>
                <th></th>
                <th>Alumnos</th>
                <th>Egresados</th>
                <th>Reinscriptos</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($t as $cuadro) { ?>
                <tr>
                    <th><?php echo $cuadro[titulo]; ?></th>
                    <td><?php echo $cuadro[alumnos]; ?></td>
                    <td><?php echo $cuadro[egresados]; ?></td>
                    <td><?php echo $cuadro[reinscriptos]; ?></td>
                </tr>                
            <?php } ?> 
        </tbody>
    </table>
    <script>
        $(function () {
            $('#container3').highcharts({
                chart: {
                    type: 'pie',
                    options3d: {
                        enabled: true,
                        alpha: 45,
                        beta: 0
                    }
                },
                title: {
                    text: null
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        depth: 35,
                        dataLabels: {
                            enabled: true,
                            format: '{point.name}'
                        }
                    }
                },
                navigation: {
                    buttonOptions: {
                        enabled: false
                    }
                },
                series: [{
                        type: 'pie',
                        name: 'Total de Alumnos',
                        data: [
                            
                            ['Alumnos', <?php echo $al; ?>],
                            ['Egresados', <?php echo $eg; ?>],
                            ['Reinscriptos', <?php echo $re; ?>]
                        ]
                    }]
            });
        });
    </script>
    <?php } ?>
</div>
