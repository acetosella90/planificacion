<script>
  $('body').css("background-image","url()");
</script>

<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">

<?php
    
include 'funciones/parseo.php';
include 'class/Clases.php';


    $conexion = new Conexion();
    
    $consulta = $conexion->prepare(Consultas::getTodoMapuche2());
    $consulta->execute();
    $todo = $consulta->fetchAll();
    
    
    
    
    $unidades = getDependencias($todo);
    
   
    ?>


    
    <div class="row">
        <div class="col-xs-18 col-md-12">
            <form  method="POST">
                <?php
                echo "<div  style='float: left;'>";
               
Clases::getUnidades($unidades); // Combo facultades
Clases::getTipoEscalafon(); // Checks
    
                 ?>
                <input style="margin-left: 10px; " type="submit" value="Buscar">
            </form>
        </div>
    </div>

<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $consulta = $conexion->prepare(Consultas::getFiltroMapuche3($_POST));
        $consulta->execute();
        $todo2 = $consulta->fetchAll();
    
        $consulta2 = $conexion->prepare(Consultas::getTodoMapuche3($_POST));
        $consulta2->execute();
        $todo3 = $consulta2->fetchAll();
    
        
        ?>
<div class="row" style="margin-top: 40px;">
            <div class="col-xs-18 col-md-12">
                <div id="container6" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                <span style="float: right" class="label label-danger " id="btn-tabla1">Ver Tabla de Datos 1</span>
            </div>
        </div>


    
   <div class="row"  id="tabla1" style="display: none;">
            <div class="col-xs-18 col-md-12">
                <div style="margin-top: 100px;">
                    <h2>Nombre , Apellido y Categoria de personal por tipo, escuela y escalafon</h2>
                    <table style='float: left;'  class="table table-hover">
                        <tbody>
                        <td><strong>Nombre y Apellido</strong></td>
                        <td><strong>Tipo</strong></td>
                        <td><strong>categoria</strong></td>
                        
                        
                        </tbody>
                        <?php for ($i = 0; $i < count($todo2); $i++) { ?>
                            <tr>
                                <td style="color: #428BCA"><?php echo $todo2[$i][nombre];echo" "; echo$todo2[$i][apellido]; ?></td>
                                <td><?php echo $todo2[$i][escalafon]; ?></td>
                                <td><?php echo $todo2[$i][categoria_desc]; ?></td>
                              <?php
                            
                           
                        }
                        ?>  
                            </tr>
                     
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
                        <td colspan="2"> Escuela <?php echo $_POST[combo_unidades]; ?></td>
                        </tbody>
                        <tr>
                            <td><strong>Total Personal Docente</strong></td>
                            <td><?php
                                if ($todo3[0][total])
                                    echo $al = $todo3[0][total];
                                else
                                    echo $al = 0;
                                ?></td>
                            </tr>
                            <tr>
                            <td><strong>Total Personal No Docente</strong></td>
                            <td><?php
                                if ($todo3[1][total])
                                    echo $eg = $todo3[1][total];
                                else
                                    echo $eg = 0;
                                ?></td>
                        </tr>
                    <tr>
                            <td><strong>Total Personal Superior</strong></td>
                            <td><?php
                                if ($todo3[2][total])
                                    echo $er = $todo3[2][total];
                                else
                                    echo $er = 0;
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
        
            $a=0;
            $t=0;
            $r=0;
        

            for ($j = 0; $j < count($todo3); $j++) {

                if ($todo[$j][escalafon] == "Docente" )
                    $a=$todo[$j][total];

                if ($todo[$j][escalafon] == "No_Docente" )
                    $t=$todo[$j][total];
                
                if ($todo[$j][escalafon] == "Superior" )
                    $r=$todo[$j][total];
                
            
        }


        
        
        
        ?>
        
        <script>

            $(function () {
                $('#container2').highcharts({
                    chart: {
                        type: 'bar'
                    },
                    title: {
                        text: 'Personal  por Tipo de Escalafon'
                    },
                    xAxis: {
                        categories: [<?php echo "'" . $todo3[0][unidad]."'"; ?>]
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Cantidad de Personal'
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
                            name: 'Personal Docente',
                            data: [<?php
    
        echo $al ;
    
    ?>]
                        },
                        {
                            name: 'Personal No Docente',
                            data: [<?php
    
        echo $eg ;
    
    ?>]
                        

                        },
                      {
                            name: 'Personal Superior',
                            data: [<?php
    
        echo $er ;
    
    ?>]
                        

                        }
                    ]
                });
            });

        </script>




        <table id="datatable3" style='display: none;'>
            <thead>
                <tr>
                    <th></th>
                    
                    <th><?php echo $todo3[1][unidad]; ?></th>
                    
                </tr>
            </thead>
            <tbody>
                
                    <tr>
                        <th>Docente</th>
                        <td><?php echo $todo3[0][total]; ?></td>
                        
                        
                    </tr>                
                
                     <tr>
                        <th>No Docente</th>
                        <td><?php echo $todo3[1][total]; ?></td>
                        
                        
                    </tr>      
               
                      <tr>
                          <th>Superior</th>
                        <td><?php echo $todo3[2][total]; ?></td>
                        
                        
                    </tr> 
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
                            name: 'Total de Personal',
                            data: [
                                ['Docente', <?php echo $al; ?>],
                                ['No Docente', <?php echo $eg; ?>],
                                ['Superior', <?php echo$er; ?>],
                            ]
                        }]
                });
            });
        </script>
    <?php } ?>
</div>