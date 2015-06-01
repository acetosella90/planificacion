<script>
    $('body').css("background-image", "url()");
</script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">
    <?php
    
   
include 'funciones/parseo.php';
include 'class/Clases.php';


    $conexion = new Conexion();

    $consulta = $conexion->prepare(Consultas::getTodoSigeva2());
    $consulta->execute();
    $todo2 = $consulta->fetchAll();

    $disciplina = getDisciplinas($todo2);
    $facultades = getDependencias($todo2);
    
    $consulta = $conexion->prepare(Consultas::getFechaSigeva());
    $consulta->execute();
    $todo3 = $consulta->fetchAll();
    
    $fechas = getFecha($todo3)
    ?>

    <div class="row">
        <div class="col-xs-18 col-md-12">
            <form  method="POST">
                <?php
                echo "<div  style='float: left;'>";
                Clases::getUnidades($facultades); // Combo facultades
                Clases::getFacultades($disciplina); // combo disciplinas
                Clases::getFechas($fechas); //combo fechas
                ?>
                <input style="margin-left: 10px;" type="submit" value="Buscar">
            </form>
        </div>
    </div>

    <?php
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $consulta = $conexion->prepare(Consultas::getFiltroSigeva2($_POST));
        $consulta->execute();
        $todo = $consulta->fetchAll();
        
  echo "<pre>";
    var_dump($todo);
    echo "</pre>";
        ?>

        <div class="row" style="margin-top: 40px;">
            <div class="col-xs-18 col-md-12">
                <div id="container9" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                <span style="float: right" class="label label-danger " id="btn-tabla1">Ver Tabla de Datos 1</span>
            </div>
        </div>

        <div class="row"  id="tabla1" style="display: none;">
            <div class="col-xs-18 col-md-12">
                <div style="margin-top: 100px;">
                    <h2>Tabla de publicaciones de Escuelas  por disciplinas en periodo </h2>
                    <table style='float: left;'  class="table table-hover">
                        <tbody>
                        <td><strong>Escuelas</strong></td>
                        <td><strong>Disciplinas</strong></td>
                       
                        <td><strong>Total</strong></td>
                        </tbody>
                        <?php for ($i = 0; $i < count($todo); $i++) { ?>
                            <tr>
                                <td><?php echo $todo[$i][unidad]; ?></td>
                                <td><?php echo $todo[$i][disciplina]; ?></td>
                                
                                <td><?php echo $todo[$i][total]; ?></td>
                              </tr>
                            <?php
                            
                        }
                        ?>
                  
                    </table>


                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xs-6 col-md-7">
                <div id="container6" style="width: 800px; height: 400px; margin: 0 auto;  "></div>
            </div>
            <div  class="col-xs-6 col-md-1" style="z-index: 9999;  ">
                <div id="tabla2" style="">
                    <table   class="table table-hover" style="width: 225px;">
                        <tbody>
                        <td colspan="2"> FECHA: <?php echo $_POST[combo_fechas]; ?></td>
                        </tbody>
                        
                         <?php $control = array();
                         $total_por_unidades=array();//muestra el total de publicaciones por cada unidad
                         $j= 0;
                         $totalf=0;
                         for ($i = 0; $i < count($todo); $i++) { 
                             
                         if ( !in_array (  $todo[$i]['unidad'] ,  $control )){
                            
                                 ?>
                        
                        <tr>
                            <td><strong>Total articulos publicados en <?php echo $todo[$i]['unidad']?></strong></td>
                            <td><?php
                               
                                 for ($b = 0; $b < count($todo); $b++) {
                                  if ($todo[$b]['unidad']== $todo[$i]['unidad']){  
                                    $totalf +=  intval($todo[$b]['total']);
                                  }
                                  
                               
                                   }echo $totalf; ?></td>
                        </tr>
                        
                         <?php $control[$j] = $todo[$i]['unidad'];
            $total_por_unidades[$j]= $totalf;
             $totalf=0;
                         $j++;
            
                                  } }
                        ?>
                  
                    
                  <?php    
                         $control2 = array();
                         $control3 = array();
                         $controltotal = array();
                         $total_por_disciplinas=array();//muestra el total de publicaciones por cada disciplina
                         $j= 0;
                         $t=0;
                         $totald=0;
                         for ($i = 0; $i < count($todo); $i++) { 
                             
                         if ( !in_array (  $todo[$i]['disciplina'] ,  $control2 )){
                            
                                 
                        
                               
                                 for ($b = 0; $b < count($todo); $b++) {
                                  if ($todo[$b]['unidad'] != $todo[$i]['unidad']){  
                                    $control3[$t] =  $todo[$b]['total'];
                                  $t++;}
                                   
                                  
                                   
                               
                                   } ?>
                        
                        
       <?php $control2[$j] = $todo[$i]['disciplina'];
            $total_por_disciplinas[$j]= $totald;
            $controltotal[$j]= $control3;
            $totalf=0;
                         $j++;
            
                                  } }

?>     
                    
                    
                    
                    </table>
                </div>
            </div>
            <div class="col-xs-6 col-md-4">

                <div id="container5" style="max-width: 200px; height: 250px; margin: 0 auto; float: left; margin-top: 100px;"></div>
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

   <?php    
                         $control2 = array();
                         $control3 = array();
                         $controltotal = array();
                         $total_por_disciplinas=array();//muestra el total de publicaciones por cada disciplina
                         $j= 0;
                         $t=0;
                         $totald=0;
                         for ($i = 0; $i < count($todo); $i++) { 
                             
                         if ( !in_array (  $todo[$i]['disciplina'] ,  $control2 )){
                            
                                 
                        
                               
                                 for ($b = 0; $b < count($todo); $b++) {
                                  if ($todo[$b]['unidad'] != $todo[$i]['unidad']){  
                                    $control3[$t] =  $todo[$b]['total'];
                                  $t++;}
                                   
                                  
                                   
                               
                                   } ?>
                        
                        
       <?php $control2[$j] = $todo[$i]['disciplina'];
            $total_por_disciplinas[$j]= $totald;
            $controltotal[$j]= $control3;
            $totalf=0;
                         $j++;
            
                                  } }

?>

                      
          <script>

            $(function () {
                $('#container6').highcharts({
                    chart: {
                        type: 'bar'
                    },
                    title: {
                        text: 'Escuela  por disciplinas'
                    },
                    xAxis: {
                        categories: [<?php echo $control2; ?>]
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Cantidad de publicaciones'
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
                    series: [<?php  for ($b = 0; $b < count($control2); $b++){if (count($control2)>1 && $b!=(count($control2)-1)){?>
                          { name: <?php echo $control2[$b]; ?>,
                            data: [<?php
    
        echo $controltotal[$b];
    
    ?>]
                    },
                    <?php  }else{ echo '{ name: '. $control2[$b].','.
                            'data:'. 
    
         $controltotal[$b].
    
    ']
                    }'; }}?>
                        ]
                        

                });
            });

        </script>




        <table id="datatable4" style='display:none'>
            <thead>
                <tr>
                    <th></th>
                    <th>Alumnos</th>
                    <th>Egresados</th>
                   
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
                $('#container5').highcharts({
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