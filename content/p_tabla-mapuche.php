<script>
    $('body').css("background-image", "url()");
</script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">
    <?php
    include 'funciones/parseo.php';
    include 'class/Clases.php';


    $conexion = new Conexion();

    $consulta = $conexion->prepare(Consultas::getTodoMapuche2());
    $consulta->execute();
    $todo2 = $consulta->fetchAll();

    $unidades = getDependencias($todo2);
    
    
    ?>

    <div class="row">
        <div class="col-xs-18 col-md-12">
            <form  method="POST">
<?php
echo "<div  style='float: left;'>";
Clases::getUnidades($unidades); // Combo facultades
Clases::getTipoEscalafon(); // Checks
?>
                <input style="margin-left: 10px;" type="submit" value="Buscar"></div>
            </form>
        </div>
    </div>

<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $consulta = $conexion->prepare(Consultas::getFiltroMapuche2($_POST));
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
                    <h2>Tabla de Tipo de Credito por Unidad</h2>
                    <table style='float: left;'  class="table table-hover">
                        <tbody>
                        <td><strong>Unidad Dependencia</strong></td>

                        <td><strong>Tipo de personal</strong></td>

                        <td><strong>Enero</strong></td>
                        <td><strong>Febrero</strong></td>
                        <td><strong>Marzo</strong></td>
                        <td><strong>Abril</strong></td>
                        <td><strong>Mayo</strong></td>
                        <td><strong>Junio</strong></td>
                        <td><strong>Julio</strong></td>
                        <td><strong>Agosto</strong></td>
                        <td><strong>Septiembre</strong></td>   
                        <td><strong>Octubre</strong></td>
                        <td><strong>Noviembre</strong></td>
                        <td><strong>Diciembre</strong></td>
                        </tbody>



                        <tr><td rowspan="3"><?php if ($todo[0][unidad]) {
        echo$todo[0][unidad];
    } else {
        echo 'Facultad Unsam';
    } ?></td>
    <?php
    $meses = array(Enero, Febrero, Marzo, Abril, Mayo, Junio, Julio, Agosto, Septiembre, Octubre, Noviembre, Diciembre);

    for ($i = 0; $i < count($_POST[tipo_escalafon]); $i++) {
        if ($_POST[tipo_escalafon][$i] == "Docente")
            $e1 = 1;
        if ($_POST[tipo_escalafon][$i] == "No Docente") {
            $a1 = 1;
        }
        if ($_POST[tipo_escalafon][$i] == "Superior")
            $r1 = 1;
    }


    if ($e1) {
        echo "<td>Docente</td>";

        $a = array();
        $a=[0,0,0,0,0,0,0,0,0,0,0,0] ;
      
        for ($g = 0; $g < count($todo); $g++) {

          


           if($todo[$g][escalafon]=='Docente'){
           $a[$todo[$g][mes]-1] = $todo[$g][total];}
        }
    for ($b = 0; $b < count($a); $b++) {

            echo"<td>" . $a[$b] . "</td>";


       
    }
        }
    ?>
                        </tr>


                        <tr> 
    <?php
    if ($a1) {
        echo "<td>No Docente</td>";


        $e = array();
        $e=[0,0,0,0,0,0,0,0,0,0,0,0] ;
      
        for ($g = 0; $g < count($todo); $g++) {

            
            if($todo[$g][escalafon]=='No Docente'){
            $e[$todo[$g][mes]-1] = $todo[$g][total];}
        }
   
       for ($b = 0; $b < count($e); $b++) {

            echo"<td>" . $e[$b] . "</td>";


       
    }  
        
        
            }
    ?>
                        </tr>



                        <tr>

                            <?php
                            if ($r1) {
                                echo "<td>Superior</td>";
                                $r = array();
                                $r=[0,0,0,0,0,0,0,0,0,0,0,0] ;
                               
                                for ($g = 0; $g < count($todo); $g++) {

                                    

                                     if($todo[$g][escalafon]=='Superior'){
                                     $r[$todo[$g][mes]-1] = $todo[$g][total];}
                                }
                           
                               for ($b = 0; $b < count($r); $b++) {

                                    echo"<td>" . $r[$b] . "</td>";


       
                                     }  
                                
                                
                                     }
                            ?>
                        </tr>



                            <?php
                            if ($todo[$i][tipo_credito] == "credito_original")
                                $total[credito_original]+= $todo[$i][total];
                            if ($todo[$i][tipo_credito] == "credito")
                                $total[credito]+= $todo[$i][total];
                            if ($todo[$i][tipo_credito] == "preventivo")
                                $total[preventivo]+= $todo[$i][total];
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
                        text: 'Tipos de personal por meses'
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
                            text: 'Cantidad $'
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
                            name: 'Docente',
                            data: [<?php
    foreach ($a as $cuadro) {
        echo $cuadro . ", ";
    }
    ?>]
                        },
                        {
                            name: 'No docente',
                            data: [<?php
    foreach ($e as $cuadro) {
        echo $cuadro . ", ";
    }
    ?>]
                        },
                        {
                            name: 'Superior',
                            data: [<?php
    foreach ($r as $cuadro) {
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

