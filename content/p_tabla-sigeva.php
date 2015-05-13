<script>
    $('body').css("background-image", "url()");
</script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">
    <?php
    
   
include 'funciones/parseo.php';
include 'class/Clases.php';


    $conexion = new Conexion();

    $consulta = $conexion->prepare(Consultas::getTodoSigeva());
    $consulta->execute();
    $todo2 = $consulta->fetchAll();

    $facultades = getDependencias($todo2);
    $paises = getPaises($todo2);
    ?>

    <div class="row">
        <div class="col-xs-18 col-md-12">
            <form  method="POST">
                <?php
                echo "<div  style='float: left;'>";
                Clases::getFacultades($facultades); // Combo facultades
                Clases::getpaises($paises); // Checks
                ?>
                <input style="margin-left: 10px;" type="submit" value="Buscar"></div>
            </form>
        </div>
    </div>

    <?php
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $consulta = $conexion->prepare(Consultas::getFiltroSigeva($_POST));
        $consulta->execute();
        $todo = $consulta->fetchAll();
     
     
        
      
        ?>

        <div class="row" style="margin-top: 40px;">
            <div class="col-xs-18 col-md-12">
                <div id="container5" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                <span style="float: right" class="label label-danger " id="btn-tabla1">Ver Tabla de Datos 1</span>
            </div>
        </div>

        <div class="row"  id="tabla1" >
            <div class="col-xs-18 col-md-12">
                <div style="margin-top: 100px;">
                    <h2 style="color:#428BCA">Tabla de Tipo de Credito por Unidad</h2>
                    <table style='float: left;'  class="table table-hover">
                        <tbody>
                        <td style="color:#428BCA"><strong>Unidad Dependencia</strong></td>

                        <td style="color:#428BCA"><strong>Pais</strong></td>

                        <td style="color:#428BCA"><strong>Enero</strong></td>
                        <td style="color:#428BCA"><strong>Febrero</strong></td>
                        <td style="color:#428BCA"><strong>Marzo</strong></td>
                        <td style="color:#428BCA"><strong>Abril</strong></td>
                        <td style="color:#428BCA"><strong>Mayo</strong></td>
                        <td style="color:#428BCA"><strong>Junio</strong></td>
                        <td style="color:#428BCA"><strong>Julio</strong></td>
                        <td style="color:#428BCA"><strong>Agosto</strong></td>
                        <td style="color:#428BCA"><strong>Septiembre</strong></td>   
                        <td style="color:#428BCA"><strong>Octubre</strong></td>
                        <td style="color:#428BCA"><strong>Noviembre</strong></td>
                        <td style="color:#428BCA"><strong>Diciembre</strong></td>
                        </tbody>



                        <tr><td rowspan="3" style="color: #428BCA"><?php if ($todo[0][unidad]) {
        echo$todo[0][unidad];
    } else {
        echo 'Facultad Unsam';
    } ?></td>
   <td style="color:#428BCA"><?php echo $todo[0][pais]?></td>
    
           <?php
    $meses = array(Enero, Febrero, Marzo, Abril, Mayo, Junio, Julio, Agosto, Septiembre, Octubre, Noviembre, Diciembre);

    


    
        

        $a = array();
        $a=[0,0,0,0,0,0,0,0,0,0,0,0] ;
      
        for ($g = 0; $g < count($todo); $g++) {

          
          echo"<td>" . $todo[$g][total] . "</td>";
         $a[$g] = $todo[$g][total];
         
        }
     
    ?>
                     



                       
                    </table>


                </div>
            </div>
        </div>












    <?php
    $años = array();
    $o = 0;
    for ($i = 1995; $i < date('Y'); $i++) {
        $años[$o] = $i;
        $o +=1;
    }

    foreach ($meses as $mes) {
        $meses2.= $mes . ", ";
    }



    $meses2 = substr($meses2, 0, -1);
    ?>

        <script>


            $(function () {
                $('#container5').highcharts({
                    chart: {
                        type: 'line'
                    },
                    title: {
                        text: 'Tipos de cargos por meses'
                    },
                    subtitle: {
                    },
                    xAxis: {
                        categories: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
                        title: {
                            text: 'meses'
                        }
                    },
                    yAxis: {
                     min: 0,   
                   title: {
                            text: 'Cantidad de publicaciones'
                        }
                    },
                    plotOptions: {
                        line: {
                            dataLabels: {
                                enabled: true
                            },
                            enableMouseTracking: true
                 }          },
                    series: [{
                            name: 'Articulos publicados',
                            data: [<?php
    foreach ($a as $cuadro) {
        echo $cuadro . ", ";
    }
    ?>]
                        }

                        

                    ]
                });
            });



        </script>


<?php } ?>
</div><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
