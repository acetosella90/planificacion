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
    
    SELECT
                    academica_d_facultades.facultad as facultad,
                    academica_d_generos.generodescripcion as genero,
                   
                    academica_d_titulos.titulo as titulo,
                    academica_d_mug_paises.nombre_pais as pais,
                    sum(academica_ft_cuadros12.cantidad) as total
                FROM
                    araucano.academica_ft_cuadro12 
                        INNER JOIN araucano.academica_d_generos 
                                ON academica_ft_cuadros12.idgenero = academica_d_generos.idgenero 
                        INNER JOIN araucano.academica_d_facultades 
                                ON academica_ft_cuadros12.idfacultad = academica_d_facultades.idfacultad 
                        INNER JOIN araucano.academica_d_titulos 
                                ON academica_ft_cuadros12.idtitulo = academica_d_titulos.idtitulo
                        INNER JOIN araucano.academica_d_mug_paises 
                                ON academica_ft_cuadros12.idpais = academica_d_mug_paises.idpais
                WHERE
                        facultad like 'Escuela de Humanidades-Centro'
                        AND pais = 'chile'
                        AND genero = 'Masculino'

                group by 1,2,3,4

                ORDER BY titulo;
    
    
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
       
                                