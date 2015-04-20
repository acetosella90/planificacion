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