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
    
     public static function getFiltroAraucano() {
         
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
                        facultad like '$_POST[combo_facultades]'
                        AND idanioinformado = $_POST[combo_fechas]
                        AND nombreserie in ('" . $_POST[tipo_alumno][0] . "','" . $_POST[tipo_alumno][1] . "','" . $_POST[tipo_alumno][2] . "')

                group by 1,2,3,4

                ORDER BY titulo;";
         
         return $sql;
     }

}
