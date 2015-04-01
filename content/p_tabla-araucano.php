<script>
  $('body').css("background-image","url()");
</script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">
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

    <div class="row">
        <div class="col-xs-18 col-md-12">
            <form  method="POST">
                <?php
                Clases::getComboFechas(); // Combo de fechas
                Clases::getFacultades($facultades); // Combo facultades
                Clases::getTipoAlumno(); // Checks
                ?>
                <input style="margin-left: 10px;" type="submit" value="Buscar">
            </form>
        </div>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $consulta = $conexion->prepare(Consultas::getFiltroAraucano($_POST));
        $consulta->execute();
        $todo = $consulta->fetchAll();
        ?>

        <div class="row" style="margin-top: 40px;">
            <div class="col-xs-18 col-md-12">
                <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                <span style="float: right" class="label label-danger " id="btn-tabla1">Ver Tabla de Datos 1</span>
            </div>
        </div>

        <div class="row"  id="tabla1" style="display: none;">
            <div class="col-xs-18 col-md-12">
                <div style="margin-top: 100px;">
                    <h2>Tabla de Escuelas por titulos y tipos de alumnos</h2>
                    <table style='float: left;'  class="table table-hover">
                        <tbody>
                        <td><strong>Escuelas</strong></td>
                        <td><strong>Titulos</strong></td>
                        <td><strong>Tipo de alumnos</strong></td>
                        <td><strong>Total</strong></td>
                        </tbody>
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


                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 col-md-7">
                <div id="container2" style="width: 800px; height: 400px; margin: 0 auto;  "></div>
            </div>
            <div  class="col-xs-6 col-md-1" style="z-index: 9999;  ">
                <div id="tabla2" style="display: none;">
                    <table   class="table table-hover" style="width: 225px;">
                        <tbody>
                        <td colspan="2"> A&Ntilde;O <?php echo $_POST[combo_fechas]; ?></td>
                        </tbody>
                        <tr>
                            <td><strong>Total de Alumnos</strong></td>
                            <td><?php
                                if ($total[alumnos])
                                    echo $al = $total[alumnos];
                                else
                                    echo $al = 0;
                                ?></td>
                        </tr>
                        <tr>
                            <td><strong>Total de Egresados</strong></td>
                            <td><?php
                                if ($total[egresados])
                                    echo $eg = $total[egresados];
                                else
                                    echo $eg = 0;
                                ?></td>
                        </tr>
                        <td><strong>Total de Reinscriptos</strong></td>
                        <td><?php
                            if ($total[reinscriptos])
                                echo $re = $total[reinscriptos];
                            else
                                echo $re = 0;
                            ?></td>
                        </tr>

                    </table>
                </div>
            </div>
            <div class="col-xs-6 col-md-4">

                <div id="container3" style="max-width: 200px; height: 250px; margin: 0 auto; float: left; margin-top: 100px;"></div>
                <div style="clear: both; height: 0px;"><!-- e --></div>
                <span style="float: right" class="label label-danger" id="btn-tabla2">Ver Tabla de Datos 2</span>
            </div>
        </div>




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
        echo $cuadro[egresados] . ", ";
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
                            enabled: true
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
