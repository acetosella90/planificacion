<?php

/*
 * Description of Consultas
 *
 * @author macetosella
 */

class Consultas {

    public static function getTodoAraucano() {
        
        $sql = "
                SELECT
                    academica_d_facultades.facultad as facultad,
                    academica_d_series.nombreserie as tipo_alumno,
                    academica_ft_cuadros1y2.idanioinformado as anio,
                    academica_d_titulos.titulo as titulo,
                    sum(academica_ft_cuadros1y2.cantidad) as total
                FROM
                    araucano.academica_d_series as academica_d_series,
                    araucano.academica_ft_cuadros1y2 as academica_ft_cuadros1y2,
                    araucano.academica_d_facultades as academica_d_facultades,
                    araucano.academica_d_titulos as academica_d_titulos
                WHERE
                    academica_ft_cuadros1y2.idserie = academica_d_series.idserie
                    AND academica_ft_cuadros1y2.idfacultad = academica_d_facultades.idfacultad
                    AND academica_ft_cuadros1y2.idtitulo = academica_d_titulos.idtitulo

                GROUP BY
                    academica_d_facultades.facultad,
                    academica_d_series.nombreserie,
                    academica_ft_cuadros1y2.idanioinformado,
                    academica_d_titulos.titulo  
                ORDER BY 
                    facultad, titulo;";

        return $sql;
    }
    
    public static function getFiltroAraucano($POST) {
         
        $combo_facultades = $POST[combo_facultades];
        
         $sql = "SELECT
                    academica_d_facultades.facultad as facultad,
                    academica_d_series.nombreserie as tipo_alumno,
                    academica_ft_cuadros1y2.idanioinformado as anio,
                    academica_d_titulos.titulo as titulo,

                    sum(academica_ft_cuadros1y2.cantidad) as total
                FROM
                    araucano.academica_ft_cuadros1y2 
                        INNER JOIN araucano.academica_d_series 
                                ON academica_ft_cuadros1y2.idserie = academica_d_series.idserie 
                        INNER JOIN araucano.academica_d_facultades 
                                ON academica_ft_cuadros1y2.idfacultad = academica_d_facultades.idfacultad 
                        INNER JOIN araucano.academica_d_titulos 
                                ON academica_ft_cuadros1y2.idtitulo = academica_d_titulos.idtitulo
                WHERE
                        facultad like '$combo_facultades'
                        AND idanioinformado = $POST[combo_fechas]
                        AND nombreserie in ('" . $POST[tipo_alumno][0] . "','" . $POST[tipo_alumno][1] . "','" . $POST[tipo_alumno][2] . "')

                group by 1,2,3,4

                ORDER BY titulo;";
         
         return $sql;
     }


   public static function getTodoAraucano2() {
        
    $sql="  
SELECT
academica_d_facultades.facultad as facultad,
academica_d_generos.generodescripcion as genero,
academica_d_titulos.titulo as titulo,
academica_d_mug_paises.nombre_pais as pais,
sum(academica_ft_cuadro12.cantidad) as total

FROM
araucano.academica_d_facultades as academica_d_facultades,
araucano.academica_ft_cuadro12 as academica_ft_cuadro12,
araucano.academica_d_generos as academica_d_generos,
araucano.academica_d_titulos as academica_d_titulos,
araucano.academica_d_mug_paises as academica_d_mug_paises

WHERE
academica_ft_cuadro12.idfacultad = academica_d_facultades.idfacultad
and
academica_ft_cuadro12.idgenero = academica_d_generos.idgenero
and
academica_ft_cuadro12.idtitulo = academica_d_titulos.idtitulo
and
academica_ft_cuadro12.idpais = academica_d_mug_paises.idpais


GROUP BY
academica_d_facultades.facultad,
academica_d_generos.generodescripcion,
academica_d_titulos.titulo,
academica_d_mug_paises.nombre_pais

ORDER BY facultad, titulo,nombre_pais ;

";
  
      return $sql;   
    }
public static function getFiltroAraucano2($POST) {
         
        $combo_facultades = $POST[combo_facultades];
        $combo_paises = $POST[combo_paises];
         $sql = "SELECT
                    academica_d_facultades.facultad as facultad,
                    academica_d_generos.generodescripcion as genero,
                    academica_d_mug_paises.nombre_pais as pais, 
                    academica_d_titulos.titulo as titulo,
                    academica_d_mug_paises.nombre_pais as pais,
                    sum(academica_ft_cuadros12.cantidad) as total
                FROM
                    araucano.academica_ft_cuadros12 
                        INNER JOIN academica_d_generos.generodescripcion 
                                ON academica_ft_cuadros12.idgenero = academica_d_generos.generodescripcion.idgenero 
                        INNER JOIN araucano.academica_d_facultades 
                                ON academica_ft_cuadros12.idfacultad = academica_d_facultades.idfacultad 
                        INNER JOIN araucano.academica_d_titulos 
                                ON academica_ft_cuadros12.idtitulo = academica_d_titulos.idtitulo
                        INNER JOIN araucano.academica_d_mug_paises 
                                ON academica_ft_cuadros12.idpais = academica_d_mug_paises.idpais
                WHERE
                        facultad like '$combo_facultades'
                        AND pais like '$combo_paises'
                        AND generodescripcion in ('" . $POST[genero][0] . "','" . $POST[genero][1] . "')

                group by 1,2,3,4

                ORDER BY titulo;";
         
         return $sql;
     }
  
     
 public static function getpaises() {
         
        $sql = "SELECT nombre_pais
        FROM   academica_d_mug_paises ;";
         
         return $sql;
     }    
    
     
     
}



    
    
