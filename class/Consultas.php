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

        $sql = "  
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
                    academica_d_titulos.titulo as titulo,
                    academica_d_mug_paises.nombre_pais as pais,
                    sum(academica_ft_cuadro12.cantidad) as total
                FROM
                    araucano.academica_ft_cuadro12 
                        INNER JOIN araucano.academica_d_generos 
                                ON academica_ft_cuadro12.idgenero = academica_d_generos.idgenero 
                        INNER JOIN araucano.academica_d_facultades 
                                ON academica_ft_cuadro12.idfacultad = academica_d_facultades.idfacultad 
                        INNER JOIN araucano.academica_d_titulos 
                                ON academica_ft_cuadro12.idtitulo = academica_d_titulos.idtitulo
                        INNER JOIN araucano.academica_d_mug_paises 
                                ON academica_ft_cuadro12.idpais = academica_d_mug_paises.idpais
                WHERE
                        facultad like '$combo_facultades'
                        AND nombre_pais = '$combo_paises'
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

    public static function getTodoAraucanoEscuela($escuela, $egresado = null) {

        $escuela = utf8_decode($escuela);

        if (!$egresado) {
            $anio1 = date('Y') - 2;
            $anio2 = date('Y') - 2;
        } else {
            $anio2 = date('Y') - 2;
            $anio1 = '1980';
        }

        $sql = "SELECT 
                    academica_d_facultades.flag as facultad,
                    academica_d_series.nombreserie as tipo_alumno,
                    academica_ft_cuadros1y2.idanioinformado as anio,
                    academica_d_titulos.titulo as titulo,
                    sum(academica_ft_cuadros1y2.cantidad) as total

                FROM 
                    araucano.academica_ft_cuadros1y2 as academica_ft_cuadros1y2 
                        INNER JOIN araucano.academica_d_series as academica_d_series ON
                                   academica_ft_cuadros1y2.idserie = academica_d_series.idserie

                        INNER JOIN araucano.academica_d_facultades as academica_d_facultades ON
                                   academica_ft_cuadros1y2.idfacultad = academica_d_facultades.idfacultad  

                        INNER JOIN  araucano.academica_d_titulos as academica_d_titulos ON
                                    academica_ft_cuadros1y2.idtitulo = academica_d_titulos.idtitulo
                WHERE
                
                flag = $escuela  AND 
                academica_d_series.nombreserie in('Alumnos', 'Egresados') AND
                academica_ft_cuadros1y2.idanioinformado between '$anio1' AND '$anio2'
                GROUP BY 1,2,3,4
                ORDER BY academica_d_series.nombreserie,titulo;";

        return $sql;
    }

    public static function getFiltroAraucano3($POST) {

        $combo_facultades = $POST[combo_facultades];
        if ($combo_facultades == 'Facultad Unsam') {

            $sql = "SELECT
                    
                    academica_d_series.nombreserie as tipo_alumno,
                    academica_ft_cuadros1y2.idanioinformado as anio,
               

                    sum(academica_ft_cuadros1y2.cantidad) as total
                FROM
                    araucano.academica_ft_cuadros1y2 
                        INNER JOIN araucano.academica_d_series 
                                ON academica_ft_cuadros1y2.idserie = academica_d_series.idserie 
                        INNER JOIN araucano.academica_d_facultades 
                                ON academica_ft_cuadros1y2.idfacultad = academica_d_facultades.idfacultad 
                    
                WHERE
                        
                         idanioinformado <> 1995
                         AND nombreserie in ('" . $POST[tipo_alumno][0] . "','" . $POST[tipo_alumno][1] . "','" . $POST[tipo_alumno][2] . "')

                group by 1,2

                ORDER BY anio;";

            return $sql;
        } else {
            $sql = "SELECT
                    academica_d_facultades.facultad as facultad,
                    academica_d_series.nombreserie as tipo_alumno,
                    academica_ft_cuadros1y2.idanioinformado as anio,
               

                    sum(academica_ft_cuadros1y2.cantidad) as total
                FROM
                    araucano.academica_ft_cuadros1y2 
                        INNER JOIN araucano.academica_d_series 
                                ON academica_ft_cuadros1y2.idserie = academica_d_series.idserie 
                        INNER JOIN araucano.academica_d_facultades 
                                ON academica_ft_cuadros1y2.idfacultad = academica_d_facultades.idfacultad 
                    
                WHERE
                        facultad like '$combo_facultades'
                        AND idanioinformado <> 1995
                        AND nombreserie in ('" . $POST[tipo_alumno][0] . "','" . $POST[tipo_alumno][1] . "','" . $POST[tipo_alumno][2] . "')

                group by 1,2,3

                ORDER BY facultad,anio;";

            return $sql;
        }
    }

    public static function getTodoPilagaEscuela($escuela) {

        $anio = date('Y') - 1;

        $sql = "select
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
                    d_fecha.anio";

        return $sql;
    }

    public static function getTodoPilaga() {


        $sql = "select
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
                    ft_movimientos.fecha_id = d_fecha.fecha_id
                    
                   
                    group by
                    d_unidad_presupuestaria.unidad_presupuestaria_desc,
                    d_fecha.anio";

        return $sql;
    }

    public static function getFiltroPilaga($POST) {

        $combo_unidades = $POST[combo_unidades];
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
        
        if ($combo_unidades == 'Facultad Unsam') {
        $sql = "select
                  
                    d_fecha.anio as anio, " .
                $or.$coma1.$cred.$coma2. $prev ." 
                from
                    pilaga.d_unidad_presupuestaria as d_unidad_presupuestaria,
                    pilaga.ft_movimientos as ft_movimientos,
                    pilaga.d_fecha as d_fecha
                    where
                    ft_movimientos.unidad_presupuestaria_id = d_unidad_presupuestaria.unidad_presupuestaria_id
                    
                 
                   
                   and 
                       d_fecha.anio BETWEEN '1995' AND '2014' 
                group by
                    d_unidad_presupuestaria.unidad_presupuestaria_desc,
                    d_fecha.anio";
        }
        else{ $sql = "select
                    d_unidad_presupuestaria.unidad_presupuestaria_desc as unidad,
                    d_fecha.anio as anio, " .
                $or.$coma1.$cred.$coma2. $prev ." 
                from
                    pilaga.d_unidad_presupuestaria as d_unidad_presupuestaria,
                    pilaga.ft_movimientos as ft_movimientos,
                    pilaga.d_fecha as d_fecha
                    where
                    ft_movimientos.unidad_presupuestaria_id = d_unidad_presupuestaria.unidad_presupuestaria_id
                    
                    and
                    d_unidad_presupuestaria.unidad_presupuestaria_desc= " . "'" . $combo_unidades . "'" .
                   
                  " and 
                       d_fecha.anio BETWEEN '1995' AND '2014' 
                group by
                    d_unidad_presupuestaria.unidad_presupuestaria_desc,
                    d_fecha.anio";}
        return $sql;
    }

}
