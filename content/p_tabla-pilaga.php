

<script>
    $('body').css("background-image", "url()");
</script>
<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main">
    <?php
    
    require_once 'class/Conexion.php';
    require_once 'class/Clases.php';
    require_once 'class/Consultas.php';
    require_once 'funciones/parseo.php';

    $conexion = new Conexion();

    $consulta = $conexion->prepare(Consultas::getTodoPilaga());
    $consulta->execute();
    $todo2 = $consulta->fetchAll();

    $unidades = getUnidades($todo2);
  
    
    ?>

    <div class="row">
        <div class="col-xs-18 col-md-12">
            <form  method="POST">
                <?php
                echo "<div  style='float: left;'>";
                Clases::getUnidades($unidades); // Combo facultades
                Clases::getTipoCredito(); // Checks
                ?>
                <input style="margin-left: 10px;" type="submit" value="Buscar"></div>
            </form>
        </div>
    </div>

    <?php
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $consulta = $conexion->prepare(Consultas::getFiltroPilaga($_POST));
        $consulta->execute();
        $todo = $consulta->fetchAll();
    
     
        ?>

        <div class="row" style="margin-top: 40px;">
            <div class="col-xs-18 col-md-12">
                <div id="container5" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
                <span style="float: right" class="label label-danger " id="btn-tabla1">Ver Tabla de Datos 1</span>
            </div>
        </div>

        <div class="row"  id="tabla1" style="display: none;">
            <div class="col-xs-18 col-md-12">
                <div style="margin-top: 100px;">
                    <h2>Tabla de Tipo de Credito por Unidad</h2>
                    <table style='float: left;'  class="table table-hover">
                        <tbody>
                        <td><strong>Unidad Presupuestaria</strong></td>

                        <td><strong>Tipo de Credito</strong></td>

                        <?php
                        for ($i = 1995; $i < date('Y'); $i++) {


                            echo "<td><strong>" . $i . "</strong></td>";
                        }
                        ?>





                        </tbody>



                        <tr><td rowspan="3"><?php if($todo[0][unidad]){echo$todo[0][unidad];}else{echo 'Facultad Unsam';} ?></td>
 <?php      
 
                        for($i=0 ; $i < count($_POST[tipo_credito]); $i++){
                                if($_POST[tipo_credito][$i] == "credito_original")
                                    $e1 = 1;
                                if($_POST[tipo_credito][$i] == "credito"){
                                    $a1=1;
                                }
                                if($_POST[tipo_credito][$i] == "preventivo")
                                    $r1=1;
                            }

                   
                   if($e1){echo "<td>Credito original</td>"; 

    $a=array();
    $i = 1995;
    $t = 1995;
    $p= 0;
    for ($g = 0; $g < count($todo); $g++) {
        for ($i = $t; $i < date('Y'); $i++) {



             
            if ( $todo[$g][anio] != $i) {
                echo"<td></td>"; $a[$p]=0; $p+=1;
            } elseif ($todo[$g][anio] == $i ) {
                echo"<td>" . $todo[$g][credito_original] . "</td>"; $a[$p]= $todo[$g][credito_original]; $p+=1;
                $t = $i + 1;
                $i = date('Y');
            } 
        }
    
                          }
                            }
                          ?>
                        </tr>


                        <tr> 
                            <?php  
                            
                    if($a1) {echo "<td>Credito</td>"; 
                             
                           
                            $e=array();
                            $i = 1995;
                            $t = 1995;
                            $p= 0;
                            for ($g = 0; $g < count($todo); $g++) {
                                for ($i = $t; $i < date('Y'); $i++) {

                                    if ($todo[$g][anio] == $i ) {
                                        echo"<td>" . $todo[$g][credito] . "</td>"; $e[$p]= $todo[$g][credito]; $p+=1;
                                        $t = $i + 1;
                                        $i = date('Y');
                                    } elseif ($todo[$g][anio] != $i) {
                                        echo"<td></td>"; $e[$p]=0; $p+=1;
                                    }
                                }
                            }
                    }
                            ?>
                        </tr>



                        <tr>
                            
                            <?php
                           if($r1) {echo "<td>Preventivo</td>"; 
                            $r=array();
                            $i = 1995;
                            $t = 1995;
                            $p= 0;
                            for ($g = 0; $g < count($todo); $g++) {
                                for ($i = $t; $i < date('Y'); $i++) {

                                    if ($todo[$g][anio] == $i ) {
                                        echo"<td>" . $todo[$g][preventivo] . "</td>";$r[$p]= $todo[$g][preventivo]; $p+=1;
                                        $t = $i + 1;
                                        $i = date('Y');
                                    } elseif ( $todo[$g][anio] != $i) {
                                        echo"<td></td>";$r[$p]=0; $p+=1;
                                    } 
                                }
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
 $años=array();
  $o=0;         
 for ($i = 1995; $i < date('Y'); $i++) {
       $años[$o] = $i;
       $o +=1;    
        } 
        
 foreach ($años as $cuadro) {
       $c.=  $cuadro . ", ";
         } 
     
   $c = substr($c, 0, -1);
    
   
   
   ?>
       
<script>

    
 $(function () {
    $('#container5').highcharts({
        chart: {
            type: 'line'
        },
        title: {
            text: 'Tipos de Creditos Totales por a\u00f1os'
        },
        subtitle: {
          
        },
        xAxis: {
            categories:[<?php echo $c ?>],
        title: {
                text: 'A\u00f1os'
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
            }
        },
       
       
           
series: [{
                            name: 'Credito Original',
                            data: [<?php
    foreach ($a as $cuadro) {
        echo $cuadro . ", ";
    }
    ?>]
                        },
                        {
                            name: 'Credito',
                            data: [<?php
    foreach ($e as $cuadro) {
        echo $cuadro . ", ";
    }
    ?>]
            },
                        {
                            name: 'Preventivo',
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
</div>