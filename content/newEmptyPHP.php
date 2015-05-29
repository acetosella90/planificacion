<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$consulta = $conexion->prepare(Consultas::getFiltroAraucano2($POST));
    $consulta->execute();
    $todo2 = $consulta->fetchAll();
    
    echo "<pre>";
    var_dump($todo2);
    echo "</pre>";
    
  "select
                    d_unidad_presupuestaria.unidad_presupuestaria_desc as unidad,
                    d_fecha.anio as anio,
                    
                    sum(ft_movimientos.credito_original) as credito_original,
                    sum(ft_movimientos.credito) as credito,
                    sum(ft_movimientos.preventivo) as preventivo
                    from
                    pilaga.d_unidad_presupuestaria as d_unidad_presupuestaria,
                    pilaga.ft_movimientos as ft_movimientos,
                    pilaga.d_fecha as d_fecha
                    where
                    ft_movimientos.unidad_presupuestaria_id = d_unidad_presupuestaria.unidad_presupuestaria_id
                    
                    and
                    d_unidad_presupuestaria.flag = $combo_unidades
                    and
                    ft_movimientos.fecha_id = d_fecha.fecha_id
                    
                   
                    group by
                    d_unidad_presupuestaria.unidad_presupuestaria_desc,
                    d_fecha.anio"
    
    
    p_tabla-araucano3
    
     for{$i=0;$i < count($todo);$i++ }{
                                if ($todo[$i][tipo_alumno]=='Egresados')
                            $y='si';
                            break;       
                            }
                            
                            
                            
                            
     
                            
                
        series: [{<?php if($a1){
       echo" name:"."'"."Alumnos"."'".",";
       
       echo "data:[";
       foreach ($a as $cuadro) {
       echo $cuadro.",";
         }
    echo"]}";
         }
        ?>
      , 
       
         {
           <?php
       if ($e1){
           
       
       echo  "  name: "."'"."Egresados"."'".",";
       
       echo "data:[";
       foreach ($e as $cuadro) {
       echo $cuadro . ", ";
         }
    echo"]}";
         }
         
       ?>
               
       ,
       
       
            {
       
           <?php
       if ($r1){
           
      
       echo  "  name: "."'"."Reinscriptos"."'".",";
       echo "data:[";
       foreach ($r as $cuadro) {
       echo $cuadro . ", ";
         }
    echo"]}"; 
       
       }
        ?> 
       
       ]
       });
       }});
       
     
                 public static function getFiltroPilaga($POST) {
        
        $combo_unidades = $POST[combo_facultades];
        $or="";
        $cred="";
        $prev="";
        if ($POST[tipo_credito][0]=='credito_original'||$POST[tipo_credito][1]=='credito_original'||$POST[tipo_credito][2]=='credito_original'){
                  $or="sum(ft_movimientos.credito_original) as credito_original,";}
        
       elseif ($POST[tipo_credito][0]=='credito'||$POST[tipo_credito][1]=='credito'||$POST[tipo_credito][2]=='credito') {
                 $cred=  "sum(ft_movimientos.credito) as credito,";}
        
        elseif ($POST[tipo_credito][0]=='preventivo'||$POST[tipo_credito][1]=='preventivo'||$POST[tipo_credito][2]=='preventivo'){
                 $prev= "sum(ft_movimientos.preventivo) as preventivo";}         
                  
                  
       $sql = "select
                    d_unidad_presupuestaria.unidad_presupuestaria_desc as unidad,
                    d_fecha.anio as anio,"
                    
                    .$or.
                    $cred.
                    $prev.
                    "from
                    pilaga.d_unidad_presupuestaria as d_unidad_presupuestaria,
                    pilaga.ft_movimientos as ft_movimientos,
                    pilaga.d_fecha as d_fecha
                    where
                    ft_movimientos.unidad_presupuestaria_id = d_unidad_presupuestaria.unidad_presupuestaria_id
                    
                    and
                    d_unidad_presupuestaria.unidad_presupuestaria_desc= $combo_unidades
                   
                    
                   
                    group by
                    d_unidad_presupuestaria.unidad_presupuestaria_desc,
                    d_fecha.anio";
        
        return $sql;
  
        }
        
        
        
        select
                    d_unidad_presupuestaria.unidad_presupuestaria_desc as unidad,
                    d_fecha.anio as anio,
                     d_fecha.mes_desc as mes,
                    sum(ft_movimientos.credito_original) as credito_original,
                    sum(ft_movimientos.credito) as credito,
                    sum(ft_movimientos.preventivo) as preventivo
                    from
                    pilaga.d_unidad_presupuestaria as d_unidad_presupuestaria,
                    pilaga.ft_movimientos as ft_movimientos,
                    pilaga.d_fecha as d_fecha
                    where
                    ft_movimientos.unidad_presupuestaria_id = d_unidad_presupuestaria.unidad_presupuestaria_id
                    
                    
                    and
                    ft_movimientos.fecha_id = d_fecha.fecha_id
                    
                   
                    group by
                    d_unidad_presupuestaria.unidad_presupuestaria_desc,
                    d_fecha.anio,
                    d_fecha.mes
                    
                                  if($e1){echo "<td>Credito original</td>"; 

    $a=array();
    $i = 1995;
    $t = 0;
    $p= 0;
    for ($g = 0; $g < count($todo); $g++) {
        
         echo"<td>". $todo[$g][credito_original] ."</td>";


             
       
    
                          }
                            }
                          ?>
                          
                          
                          
                          
                          
                          
                          
                          $a=array();
    $i = 1995;
    $t = 1995;
    $p= 0;
    for ($g = 0; $g < count($todo); $g++) {
        for ($i = $t; $i < 12; $i++) {



             
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

        
        
        
        
        
 """"codigo pilaga cambiado por el defer"""""
 SELECT
                 "select
                    d_unidad_presupuestaria.unidad_presupuestaria_desc as c0,
                    d_fecha.anio as c1,
                    sum(ft_movimientos.credito_original) as m0,
                    sum(ft_movimientos.credito) as m1,
                    sum(ft_movimientos.preventivo) as m2
                    from
                    pilaga.d_unidad_presupuestaria as d_unidad_presupuestaria,
                    pilaga.ft_movimientos as ft_movimientos,
                    pilaga.d_fecha as d_fecha
                    where
                    ft_movimientos.unidad_presupuestaria_id = d_unidad_presupuestaria.unidad_presupuestaria_id
                    and
                    d_unidad_presupuestaria.flag = $escuela
                    and
                    ft_movimientos.fecha_id = d_fecha.fecha_id
                    and
                    d_fecha.anio = " . $anio . "
                    group by
                    d_unidad_presupuestaria.unidad_presupuestaria_desc,
                    d_fecha.anio"
                    
                    
                    
                    
                           $or = "";
       $cred = "";
       $prev = "";
       $coma1="";
       $coma2="";
       if ($POST[tipo_credito][0] == 'credito_original' || $POST[tipo_credito][1] == 'credito_original' || $POST[tipo_credito][2] == 'credito_original') {
           $or = "sum(ft_movimientos.credito_original) as credito_original";
       } 
       
       if ($POST[tipo_credito][0] == 'credito' || $POST[tipo_credito][1] == 'credito' || $POST[tipo_credito][2] == 'credito') {
           $cred = "sum(ft_movimientos.credito) as credito";
       } 
     
       
       if ($POST[tipo_credito][0] == 'preventivo' || $POST[tipo_credito][1] == 'preventivo' || $POST[tipo_credito][2] == 'preventivo') {
           $prev = "sum(ft_movimientos.preventivo) as preventivo";
       }

       if(($or!=""&& $cred!=""&& $prev =="")||($or!=""&& $cred!=""&& $prev !="")){$coma1 = ",";}
       if(($or!=""&& $cred==""&& $prev !="")||($or==""&& $cred!=""&& $prev !="")||($or!=""&& $cred!=""&& $prev !="")){$coma2 = ",";}
       
       
       
       <script>

            $(function () {
                $('#container2').highcharts({
                    chart: {
                        type: 'bar'
                    },
                    title: {
                        text: 'Escuela  por disciplinas'
                    },
                    xAxis: {
                        categories: [<?php echo $control; ?>]
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
                    },<?php}else{?> { name: <?php echo $control2[$b]; ?>,
                            data: [<?php
    
        echo $controltotal[$b];
    }
    ?>]
                 <?php   } ?>
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