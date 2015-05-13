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

        $anio = date('Y');


        $sql = "select
                   d_unidad_presupuestaria.unidad_presupuestaria_desc as c0,
                   anio_id as c1,
                   sum(ft_movimientos.credito_original) as m0,
                   sum(ft_movimientos.credito) as m1,
                   sum(ft_movimientos.preventivo) as m2
                   from pilaga.ft_movimientos as ft_movimientos inner join pilaga.d_unidad_presupuestaria as d_unidad_presupuestaria on 
                               ft_movimientos.unidad_presupuestaria_id = d_unidad_presupuestaria.unidad_presupuestaria_id                    
                   where                    
                       d_unidad_presupuestaria.flag = $escuela
                   
                   and
                   anio_id = " . $anio . "
                   group by
                   1,2";


        return $sql;
    }

    public static function getTodoMapuche($escuela) {

        $anio = date('Y-m');

        $sql = "SELECT
                
                periodoinfo,
                map_dw_lt_imppresupsubdependencia.imppresupdependencia_desc ,
                map_dw_lt_categoriascargo.escalafon_desc ,
                sum(ft_lt_cargos.importenetocargo) as importenetocargo ,
                sum(ft_lt_cargos.cantcargosliq) as cantcargosliq

                FROM mapuche.ft_lt_cargos as ft_lt_cargos inner join mapuche.map_dw_lt_imppresupsubdependencia as map_dw_lt_imppresupsubdependencia on 

                ft_lt_cargos.imppresupsubdependencia_id = map_dw_lt_imppresupsubdependencia.imppresupsubdependencia_id

                inner join mapuche.map_dw_lt_categoriascargo as map_dw_lt_categoriascargo on 

                ft_lt_cargos.categoria_id = map_dw_lt_categoriascargo.categoria_id

                where periodoinfo = '2015-02-01' 
                 AND mapuche.map_dw_lt_imppresupsubdependencia.flag = $escuela

                GROUP BY 1,2,3";

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

       
       if ($combo_unidades == 'Facultad Unsam') {
       $sql = "select
                 
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
                   anio=2014

                   and 
                       ft_movimientos.fecha_id = d_fecha.fecha_id
                group by
                   
                    d_fecha.anio,
                     d_fecha.mes";
        }
        else{ $sql = "select
                    d_unidad_presupuestaria.unidad_presupuestaria_desc as unidad,
                    d_fecha.anio as anio,  
                  d_fecha.mes_desc as mes,
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
                    anio=2014
                    and
                    d_unidad_presupuestaria.unidad_presupuestaria_desc= " . "'" . $combo_unidades . "'" .

                
                  
                  "and 
                      ft_movimientos.fecha_id = d_fecha.fecha_id
               group by
                  
                   d_fecha.anio,
                    d_fecha.mes";
       }
 

                   


       return $sql;
   }


    
    public static function getSigeva($escuela) {

        return $sql = "SELECT  flag, sum(cantidad) as cantidad FROM sigeva.mapa1 WHERE flag = $escuela group by 1";    
    }
    
    public static function getMapa2() {

        return $sql = "select
                        pais.codigo_iso2 as pais,
                        pais.pais as pais_nombre,
                        count(1) as cantidad
                        from sigeva.ft_pc_articulos inner join sigeva.pais on 
                        ft_pc_articulos.pais_edicion_id = pais.id
                        group by 1";    
    }


    
       public static function getTodoMapuche2() {

        

        $sql = "select
year(ft_lt_cargos.periodoinfo) as anio,
month(ft_lt_cargos.periodoinfo) as mes,
/* mapuche.dim_periodo2.anio as anio,
mapuche.dim_periodo2.mes as mes, */
map_dw_lt_categoriascargo.escalafon_desc as escalafon,
case when map_dw_lt_imppresupsubdependencia.imppresupdependencia_desc like 'Valor erróneo o nulo' then dim_map_dw_lt_dependenciadesig2.dependenciadesign_desc
else map_dw_lt_imppresupsubdependencia.imppresupdependencia_desc end as unidad,

sum(ft_lt_cargos.cantcargosactivos) as total

from mapuche.ft_lt_cargos inner join mapuche.map_dw_lt_imppresupsubdependencia on
ft_lt_cargos.imppresupsubdependencia_id = map_dw_lt_imppresupsubdependencia.imppresupsubdependencia_id
inner join mapuche.map_dw_lt_categoriascargo on
ft_lt_cargos.categoria_id = map_dw_lt_categoriascargo.categoria_id
inner join mapuche.dim_map_dw_lt_dependenciadesig2 on 
ft_lt_cargos.dependenciadesign_id = dim_map_dw_lt_dependenciadesig2.dependenciadesign_id


where
year(ft_lt_cargos.periodoinfo) = 2014
group by 1,2,3,4
order by escalafon,unidad";
     return $sql;   
    } 
    
       public static function getFiltroMapuche2($POST) {

       
        $combo_unidades = $POST[combo_unidades];
      if ($combo_unidades=='FACULTAD UNSAM'){
          
          $sql="select
year(ft_lt_cargos.periodoinfo) as anio,
month(ft_lt_cargos.periodoinfo) as mes,

map_dw_lt_categoriascargo.escalafon_desc as escalafon,


sum(ft_lt_cargos.cantcargosactivos) as total

from mapuche.ft_lt_cargos inner join mapuche.map_dw_lt_imppresupsubdependencia on
ft_lt_cargos.imppresupsubdependencia_id = map_dw_lt_imppresupsubdependencia.imppresupsubdependencia_id
inner join mapuche.map_dw_lt_categoriascargo on
ft_lt_cargos.categoria_id = map_dw_lt_categoriascargo.categoria_id
inner join mapuche.dim_map_dw_lt_dependenciadesig2 on 
ft_lt_cargos.dependenciadesign_id = dim_map_dw_lt_dependenciadesig2.dependenciadesign_id


where
year(ft_lt_cargos.periodoinfo) = 2014


group by 1,2,3
order by escalafon,mes";
          
          
      }
      
      
      
      else{  $sql = "select
year(ft_lt_cargos.periodoinfo) as anio,
month(ft_lt_cargos.periodoinfo) as mes,
/* mapuche.dim_periodo2.anio as anio,
mapuche.dim_periodo2.mes as mes, */
map_dw_lt_categoriascargo.escalafon_desc as escalafon,
case when map_dw_lt_imppresupsubdependencia.imppresupdependencia_desc like 'Valor erróneo o nulo' then dim_map_dw_lt_dependenciadesig2.dependenciadesign_desc
else map_dw_lt_imppresupsubdependencia.imppresupdependencia_desc end as unidad,

sum(ft_lt_cargos.cantcargosactivos) as total

from mapuche.ft_lt_cargos inner join mapuche.map_dw_lt_imppresupsubdependencia on
ft_lt_cargos.imppresupsubdependencia_id = map_dw_lt_imppresupsubdependencia.imppresupsubdependencia_id
inner join mapuche.map_dw_lt_categoriascargo on
ft_lt_cargos.categoria_id = map_dw_lt_categoriascargo.categoria_id
inner join mapuche.dim_map_dw_lt_dependenciadesig2 on 
ft_lt_cargos.dependenciadesign_id = dim_map_dw_lt_dependenciadesig2.dependenciadesign_id


where
year(ft_lt_cargos.periodoinfo) = 2014
and
map_dw_lt_imppresupsubdependencia.imppresupdependencia_desc= " . "'" . $combo_unidades . "'" .
"and
map_dw_lt_categoriascargo.escalafon_desc in ('" . $POST[tipo_escalafon][0] . "','" . $POST[tipo_escalafon][1] . "','" . $POST[tipo_escalafon][2] . "')". 
         "group by 1,2,3,4
order by escalafon,unidad";
      } 
      
      
      return $sql;   
    }   
    
    
public static function getTodoMapuche3($POST) {

        
        $combo_unidades = $POST[combo_unidades];         
       
        if ($combo_unidades=='FACULTAD UNSAM'){
        
     $sql = "  select
year(ft_lt_cargos.periodoinfo) as anio,


map_dw_lt_categoriascargo.escalafon_desc as escalafon,


sum(ft_lt_cargos.cantcargosactivos) as total

from mapuche.ft_lt_cargos inner join mapuche.map_dw_lt_imppresupsubdependencia on
ft_lt_cargos.imppresupsubdependencia_id = map_dw_lt_imppresupsubdependencia.imppresupsubdependencia_id
inner join mapuche.map_dw_lt_categoriascargo on
ft_lt_cargos.categoria_id = map_dw_lt_categoriascargo.categoria_id
inner join mapuche.dim_map_dw_lt_dependenciadesig2 on 
ft_lt_cargos.dependenciadesign_id = dim_map_dw_lt_dependenciadesig2.dependenciadesign_id


where
ft_lt_cargos.periodoinfo = '2015-02-01'


group by 1,2";

            
            
            
        }
            
            
       else{     
            $sql = "select
        
year(ft_lt_cargos.periodoinfo) as anio,

/* mapuche.dim_periodo2.anio as anio,
mapuche.dim_periodo2.mes as mes, */
map_dw_lt_categoriascargo.escalafon_desc as escalafon,
case when map_dw_lt_imppresupsubdependencia.imppresupdependencia_desc like 'Valor erróneo o nulo' then dim_map_dw_lt_dependenciadesig2.dependenciadesign_desc
else map_dw_lt_imppresupsubdependencia.imppresupdependencia_desc end as unidad,

sum(ft_lt_cargos.cantcargosactivos) as total

from mapuche.ft_lt_cargos inner join mapuche.map_dw_lt_imppresupsubdependencia on
ft_lt_cargos.imppresupsubdependencia_id = map_dw_lt_imppresupsubdependencia.imppresupsubdependencia_id
inner join mapuche.map_dw_lt_categoriascargo on
ft_lt_cargos.categoria_id = map_dw_lt_categoriascargo.categoria_id
inner join mapuche.dim_map_dw_lt_dependenciadesig2 on 
ft_lt_cargos.dependenciadesign_id = dim_map_dw_lt_dependenciadesig2.dependenciadesign_id


where
ft_lt_cargos.periodoinfo = '2015-02-01'
and
map_dw_lt_imppresupsubdependencia.imppresupdependencia_desc= " . "'" . $combo_unidades . "'" .
"and
map_dw_lt_categoriascargo.escalafon_desc in ('" . $POST[tipo_escalafon][0] . "','" . $POST[tipo_escalafon][1] . "','" . $POST[tipo_escalafon][2] . "')".
"group by 1,2,3
order by escalafon,unidad";
    
       } 
            
            return $sql;   
   
     } 
       
    
    
public static function getFiltroMapuche3($POST) {

       
        $combo_unidades = $POST[combo_unidades];
      
      if($combo_unidades=='FACULTAD UNSAM'){  
       
          
    $sql= " select
year(ft_lt_cargos.periodoinfo) as anio,
map_dw_lt_persona.nombre,
map_dw_lt_persona.apellido,
categoria_desc,

/* mapuche.dim_periodo2.anio as anio,
mapuche.dim_periodo2.mes as mes, */
map_dw_lt_categoriascargo.escalafon_desc as escalafon




from mapuche.ft_lt_cargos inner join mapuche.map_dw_lt_imppresupsubdependencia on
ft_lt_cargos.imppresupsubdependencia_id = map_dw_lt_imppresupsubdependencia.imppresupsubdependencia_id
inner join mapuche.map_dw_lt_categoriascargo on
ft_lt_cargos.categoria_id = map_dw_lt_categoriascargo.categoria_id
inner join mapuche.dim_map_dw_lt_dependenciadesig2 on 
ft_lt_cargos.dependenciadesign_id = dim_map_dw_lt_dependenciadesig2.dependenciadesign_id
inner join mapuche.map_dw_lt_persona on 
ft_lt_cargos.persona_id = map_dw_lt_persona.persona_id

where
ft_lt_cargos.periodoinfo = '2015-02-01' 
group by 1,2,3,4,5
order by escalafon";
          
          
          
      }
          
          
          
          
          
    else{      $sql = "select
      
year(ft_lt_cargos.periodoinfo) as anio,
map_dw_lt_persona.nombre,
map_dw_lt_persona.apellido,
/* mapuche.dim_periodo2.anio as anio,
mapuche.dim_periodo2.mes as mes, */
categoria_desc,

map_dw_lt_categoriascargo.escalafon_desc as escalafon,
case when map_dw_lt_imppresupsubdependencia.imppresupdependencia_desc like 'Valor erróneo o nulo' then dim_map_dw_lt_dependenciadesig2.dependenciadesign_desc
else map_dw_lt_imppresupsubdependencia.imppresupdependencia_desc end as unidad



from mapuche.ft_lt_cargos inner join mapuche.map_dw_lt_imppresupsubdependencia on
ft_lt_cargos.imppresupsubdependencia_id = map_dw_lt_imppresupsubdependencia.imppresupsubdependencia_id
inner join mapuche.map_dw_lt_categoriascargo on
ft_lt_cargos.categoria_id = map_dw_lt_categoriascargo.categoria_id
inner join mapuche.dim_map_dw_lt_dependenciadesig2 on 
ft_lt_cargos.dependenciadesign_id = dim_map_dw_lt_dependenciadesig2.dependenciadesign_id
inner join mapuche.map_dw_lt_persona on 
ft_lt_cargos.persona_id = map_dw_lt_persona.persona_id

where
ft_lt_cargos.periodoinfo = '2015-02-01' 
and
map_dw_lt_imppresupsubdependencia.imppresupdependencia_desc= " . "'" . $combo_unidades . "'" .
"and
map_dw_lt_categoriascargo.escalafon_desc in ('" . $POST[tipo_escalafon][0] . "','" . $POST[tipo_escalafon][1] . "','" . $POST[tipo_escalafon][2] . "')". 
 "group by 1,2,3,4,5,6



order by escalafon,unidad";
    }
    
    return $sql;   
    }    
    
    
 public static function getTodoSigeva() {   
    
   $sql =   "select

dim_personas_mapuche_sigeva.id_fecha as fecha,
dim_pais.pais as pais,
dim_personas_mapuche_sigeva.escuela as unidad,


sum(ft_pc_articulos.cantidad) as total

from
sigeva.ft_pc_articulos inner join sigeva.dim_pais on 
ft_pc_articulos.pais_edicion_id = dim_pais.pais_id 
inner join sigeva.dim_personas_mapuche_sigeva on
dim_personas_mapuche_sigeva.id_sigeva = ft_pc_articulos.persona_id

where 

year(dim_personas_mapuche_sigeva.id_fecha)=2014




group by 1,2,3
order by 
unidad,fecha";
    
  
   return $sql;  
 }
    
public static function getFiltroSigeva($POST) {
     
    $combo_facultades = $POST[combo_facultades];
    $combo_paises = $POST[combo_paises]; 
     if($combo_facultades=='FACULTAD UNSAM'){ 
     $sql =    "select

dim_personas_mapuche_sigeva.id_fecha as fecha,
dim_pais.pais as pais,



sum(ft_pc_articulos.cantidad) as total

from
sigeva.ft_pc_articulos inner join sigeva.dim_pais on 
ft_pc_articulos.pais_edicion_id = dim_pais.pais_id 
inner join sigeva.dim_personas_mapuche_sigeva on
dim_personas_mapuche_sigeva.id_sigeva = ft_pc_articulos.persona_id

where 
dim_pais.pais=" . "'" . $combo_paises. "'" .
"
and
year(dim_personas_mapuche_sigeva.id_fecha)=2014




group by 1,2
order by 
pais,fecha";
     }     
 else{
    $sql= 
     "select

dim_personas_mapuche_sigeva.id_fecha as fecha,
dim_pais.pais as pais,
dim_personas_mapuche_sigeva.escuela as unidad,


sum(ft_pc_articulos.cantidad) as total

from
sigeva.ft_pc_articulos inner join sigeva.dim_pais on 
ft_pc_articulos.pais_edicion_id = dim_pais.pais_id 
inner join sigeva.dim_personas_mapuche_sigeva on
dim_personas_mapuche_sigeva.id_sigeva = ft_pc_articulos.persona_id

where 
dim_personas_mapuche_sigeva.escuela= " . "'" .$combo_facultades. "'" .
"and
dim_pais.pais= " . "'" . $combo_paises. "'" .
"and 
year(dim_personas_mapuche_sigeva.id_fecha)=2014




group by 1,2,3
order by 
pais,fecha";
     
     
     
 } 
     
 return $sql;   
             
             
 }

    
    
 public static function getTodoSigeva2() {   
   
   $sql =   "select

dim_personas_mapuche_sigeva.id_fecha as fecha,
dim_campo_disciplinar.campo_disciplinar as disciplina,
dim_personas_mapuche_sigeva.escuela as unidad,


sum(ft_pc_articulos.cantidad) as total

from
sigeva.ft_pc_articulos inner join sigeva.dim_campo_disciplinar on 
ft_pc_articulos.campo_disciplinar_id = dim_campo_disciplinar.id 
inner join sigeva.dim_personas_mapuche_sigeva on
dim_personas_mapuche_sigeva.id_sigeva = ft_pc_articulos.persona_id

where 

dim_personas_mapuche_sigeva.id_fecha='2015-02-01'




group by 1,2,3
order by 
disciplina,fecha";
    
  
   return $sql;  
 }    

 
public static function getFiltroSigeva2($POST) {   
   $combo_disciplinas = $POST[combo_facultades];
   $sql =   "select

dim_personas_mapuche_sigeva.id_fecha as fecha,
dim_campo_disciplinar.campo_disciplinar as disciplina,
dim_personas_mapuche_sigeva.escuela as unidad,


sum(ft_pc_articulos.cantidad) as total

from
sigeva.ft_pc_articulos inner join sigeva.dim_campo_disciplinar on 
ft_pc_articulos.campo_disciplinar_id = dim_campo_disciplinar.id 
inner join sigeva.dim_personas_mapuche_sigeva on
dim_personas_mapuche_sigeva.id_sigeva = ft_pc_articulos.persona_id

where 

dim_personas_mapuche_sigeva.id_fecha='2015-02-01'
and
dim_campo_disciplinar.campo_disciplinar=" . "'" .$combo_disciplinas. "'" .
"
group by 1,2,3
order by 
disciplina,fecha";
    
  
   return $sql;   
 
 
 
 
 }
 
}
