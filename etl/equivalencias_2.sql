-- ejemplo de optimizacion, qry de unsam vis (getTodoPilaga)
explain
    select
                    d_unidad_presupuestaria.unidad_presupuestaria_desc as unidad,
                    year(fecha_id) as anio,
                    sum(ft_movimientos.credito_original) as credito_original,
                    sum(ft_movimientos.credito) as credito,
                    sum(devengado) as devengado,
                    sum(pagado) as pagado

    from pilaga.d_unidad_presupuestaria as d_unidad_presupuestaria inner join pilaga.ft_movimientos as ft_movimientos on
                    ft_movimientos.unidad_presupuestaria_id = d_unidad_presupuestaria.unidad_presupuestaria_id                    
                     
                    group by
                    1,2

-- actualizo pilaga a la codificacion de Pilaga

use pilaga;
ALTER TABLE pilaga.d_unidad_presupuestaria
ADD COLUMN flag INT NULL AFTER fecha_actualizacion;

update pilaga.d_unidad_presupuestaria as a
--from 
 inner join 
(select unidad_presupuestaria_desc,
case 
when 	unidad_presupuestaria_desc 	like 	 '039 - INSTITUTO DE TRANSPORTE' then 1
when 	unidad_presupuestaria_desc 	like 	 '017 - ESCUELA DE CIENCIA Y TECNOLOG A' then 2
when 	unidad_presupuestaria_desc 	like 	 '020 - ESCUELA DE HUMANIDADES' then 3
when 	unidad_presupuestaria_desc 	like 	 '038 - INSTITUTO DE INVESTIGACION E INGENIERIA AMBIENTAL' then 4
when 	unidad_presupuestaria_desc 	like 	 '032 - INSTITUTO DE INVESTIGACIONES BIOTECNOLOGICAS' then 5
when 	unidad_presupuestaria_desc 	like 	 '001 - ACTIVIDADES CENTRALES' then 6
when 	unidad_presupuestaria_desc 	like 	 '054 - INSTITUTO DE ARTES MAURICIO KAGEL' then 7
when 	unidad_presupuestaria_desc 	like 	 '035 - INSTITUTO DE REHABILITACION' then 8
when 	unidad_presupuestaria_desc 	like 	 '021 - ESCUELA DE POLITICA Y GOBIERNO' then 9
when 	unidad_presupuestaria_desc 	like 	 '034 - INSTITUTO DE ALTOS ESTUDIOS' then 10
when 	unidad_presupuestaria_desc 	like 	 '053 - INSTITUTO DE INVESTIGACIONES SOBRE EL PATRIMONIO CULTURAL' then 11
when 	unidad_presupuestaria_desc 	like 	 '016 - ESCUELA DE ECONOMIA Y NEGOCIOS' then 12
when 	unidad_presupuestaria_desc 	like 	 '036 - INSTITUTO DE CALIDAD INDUSTRIAL' then 13
when 	unidad_presupuestaria_desc 	like 	 '031 - INSTITUTO DE TECNOLOGIA' then 14
when 	unidad_presupuestaria_desc 	like 	 '037 - INSTITUTO DAN BENINSON' then 15
else 0 end as flag2
 from pilaga.d_unidad_presupuestaria group by 1,2 ) as b
set flag = b.flag2
where a.unidad_presupuestaria_desc = b.unidad_presupuestaria_desc

-- optimizo todas las tablas luego de una carga

OPTIMIZE NO_WRITE_TO_BINLOG TABLE pilaga.d_banco_sucursal, pilaga.d_circuito_gestion,
pilaga.d_codigo_economico, pilaga.d_comprobante, pilaga.d_concepto, pilaga.d_concepto_ingreso,
pilaga.d_cuenta_bancaria, pilaga.d_cuenta_tesoreria, pilaga.d_documento_principal,
pilaga.d_ejercicio, pilaga.d_estado_liquidacion, pilaga.d_etapa_presupuestaria, pilaga.d_expediente
, pilaga.d_finalidad_funcion, pilaga.d_fondo, pilaga.d_fuente, pilaga.d_grupo_presupuestario,
pilaga.d_medio_pago, pilaga.d_moneda, pilaga.d_objeto_del_gasto, pilaga.d_persona,
pilaga.d_red_programatica, pilaga.d_rubro_ingreso, pilaga.d_tipo_comprobante,
pilaga.d_tipo_documento, pilaga.d_tipo_operacion, pilaga.d_tipo_persona, pilaga.d_unidad_gestion,
pilaga.d_unidad_presupuestaria, pilaga.ft_comprobantes, pilaga.ft_movimientos, pilaga.ft_tesorerias;

ANALYZE NO_WRITE_TO_BINLOG TABLE pilaga.d_banco_sucursal, pilaga.d_circuito_gestion,
pilaga.d_codigo_economico, pilaga.d_comprobante, pilaga.d_concepto, pilaga.
d_concepto_ingreso, pilaga.d_cuenta_bancaria, pilaga.d_cuenta_tesoreria, pilaga.
d_documento_principal, pilaga.d_ejercicio, pilaga.d_estado_liquidacion, pilaga.
d_etapa_presupuestaria, pilaga.d_expediente, pilaga.d_finalidad_funcion, pilaga.
d_fondo, pilaga.d_fuente, pilaga.d_grupo_presupuestario, pilaga.d_medio_pago,
pilaga.d_moneda, pilaga.d_objeto_del_gasto, pilaga.d_persona, pilaga.
d_red_programatica, pilaga.d_rubro_ingreso, pilaga.d_tipo_comprobante, pilaga.
d_tipo_documento, pilaga.d_tipo_operacion, pilaga.d_tipo_persona, pilaga.
d_unidad_gestion, pilaga.d_unidad_presupuestaria, pilaga.ft_comprobantes, pilaga.
ft_movimientos, pilaga.ft_tesorerias;
use pilaga;


-- creo indces para acelerar

ALTER TABLE pilaga.ft_movimientos ADD INDEX idx_1 (unidad_presupuestaria_id);
ALTER TABLE pilaga.d_unidad_presupuestaria ADD INDEX idx_1 (unidad_presupuestaria_id);

optimize table pilaga.ft_movimientos, pilaga.d_unidad_presupuestaria;
analyze table pilaga.ft_movimientos, pilaga.d_unidad_presupuestaria;





use araucano;

-- actualizo Aracuano a la codificacion de equivalencias
ALTER TABLE araucano.academica_d_facultades
ADD COLUMN flag INT NULL AFTER fechaact;


update araucano.academica_d_facultades as a
--from 
 inner join 
(select facultad,
case
when 	facultad	like 	 'Instituto Tecnol�gico Ferroviario Scalabrini Ortiz' then 1
when 	facultad	like 	 'Instituto del Transporte' then 1
when 	facultad	like 	 'Escuela de Ciencia y Tecnolog�a' then 2
when 	facultad	like 	 'Escuela de Humanidades - Centro' then 3
when 	facultad	like 	 'Escuela de Humanidades - Migueletes' then 3
when 	facultad	like 	 'Escuela de Humanidades - Rosario' then 3
when 	facultad	like 	 'Instituto de Investigaci�n e Ingenier�a Ambiental' then 4
when 	facultad	like 	 'Instituto de Investigaciones Biotecnol�gicas' then 5
when 	facultad	like 	 'Actividades Centrales' then 6
when 	facultad	like 	 'Instituto de Artes Mauricio Kagel' then 7
when 	facultad	like 	 'Artes' then 7
when 	facultad	like 	 'Instituto de Ciencias de la Rehabilitaci�n' then 8
when 	facultad	like 	 'Instituto de Ciencias de la Rehabilitaci�n y el Movimiento' then 8
when 	facultad	like 	 'Escuela de Pol�tica y Gobierno' then 9
when 	facultad	like 	 'Instituto de Altos Estudios Sociales' then 10
when 	facultad	like 	 'Instituto de Investigaciones sobre el Patrimonio Cultural' then 11
when 	facultad	like 	 'Escuela de Econom�a y Negocios - Centro' then 12
when 	facultad	like 	 'Escuela de Econom�a y Negocios - San Isidro' then 12
when 	facultad	like 	 'Escuela de Econom�a y Negocios - San Mart�n' then 12
when 	facultad	like 	 'Instituto de la Calidad Industrial' then 13
when 	facultad	like 	 'Instituto de Tecnolog�a' then 14
when 	facultad	like 	 'Instituto de Tecnolog�a Prof. Jorge S�bato' then 14
when 	facultad	like 	 'Instituto de Tecnolog�a Nuclear Dan Beninson' then 15

else 0 end as flag2
 from araucano.academica_d_facultades group by 1,2 ) as b
set flag = b.flag2
where a.facultad = b.facultad





-- **********   mapuche
use mapuche; 

ALTER TABLE mapuche.dim_map_dw_lt_dependenciadesig2
ADD COLUMN flag INT NULL AFTER dependenciadesign_desc;

update  mapuche.dim_map_dw_lt_dependenciadesig2 as a
--from 
 inner join 
(select dependenciadesign_id,
    case 
        when 	dependenciadesign_desc	like 	 'INST.TEC.FERR SCALABRINI ORTIZ' then 1
        when 	dependenciadesign_desc	like 	 'INSTITUTO DEL TRANSPORTE' then 1
        when 	dependenciadesign_desc	like 	 'ESC. CIENCIA Y TECNOLOGIA' then 2
        when 	dependenciadesign_desc	like 	 'ESCUELA DE HUMANIDADES' then 3
        when 	dependenciadesign_desc	like 	 'INST INVEST E INGEN AMBIENTAL' then 4
        when 	dependenciadesign_desc	like 	 'INST. DE INV. BIOTECNOLOGICAS' then 5
        when 	dependenciadesign_desc	like 	 'ACTIVIDADES CENTRALES' then 6
        when 	dependenciadesign_desc	like 	 'UNIDAD DE ARTE' then 7
        when    dependenciadesign_desc	like 	 'INSTITUTO DE ARTES' then 7
        when 	dependenciadesign_desc	like 	 'INST. DE REHABILITACION' then 8
        when 	dependenciadesign_desc	like 	 'ESCUELA DE POLITICA Y GOBIERNO' then 9
        when 	dependenciadesign_desc	like 	 'INSTITUTO DE  ALTOS ESTUDIOS' then 10
        when 	dependenciadesign_desc	like 	 'INSTITUTO DE ALTOS ESTUDIOS' then 10
        when 	dependenciadesign_desc	like 	 'INST.INVESTIG.PATRIM CULTURAL' then 11
        when 	dependenciadesign_desc	like 	 'ESC. ECONOMIA Y NEGOCIOS' then 12
        when 	dependenciadesign_desc	like 	 'INSTITUTO CALIDAD INDUSTRIAL' then 13
        when 	dependenciadesign_desc	like 	 'INST. DE TECNOLOGIA J. SABATO' then 14
        when 	dependenciadesign_desc	like 	 'INSTITUTO DAN BENINSOM' then 15
        else 0 end as flag2

    from  mapuche.dim_map_dw_lt_dependenciadesig2 group by 1,2 ) as b
set flag = b.flag2
where a.dependenciadesign_id = b.dependenciadesign_id

;




-- optimizar mapuche

explain
select
a.persona_id,
a.periodoinfo,
dim_map_dw_lt_dependenciadesig2.dependenciadesign_desc as escuela,
flag,
map_dw_lt_categoriascargo.escalafon_desc ,

sum(cast(a.importenetocargo as decimal (18,2))) as importeneto,
sum(a.cantcargosliq) as q_cargos_activos,
1 as q_personas
--1 as cantidad

from mapuche.ft_lt_cargos a inner join mapuche.map_dw_lt_categoriascargo on
    a.categoria_id = map_dw_lt_categoriascargo.categoria_id
inner join mapuche.dim_map_dw_lt_dependenciadesig2 on 
a.dependenciadesign_id = dim_map_dw_lt_dependenciadesig2.dependenciadesign_id 

-- where -- persona_id = 72
--a.periodoinfo = '2015-03-01' 
-- and dim_map_dw_lt_dependenciadesig2.dependenciadesign_desc like 'ACTIVIDADES CENTRALES'
group by 1,2,3,4,5;




ALTER TABLE mapuche.ft_lt_cargos ADD INDEX idx_1 (dependenciadesign_id);
ALTER TABLE mapuche.ft_lt_cargos ADD INDEX idx_2 (imppresupsubdependencia_id);
ALTER TABLE mapuche.ft_lt_cargos ADD INDEX idx_3 (categoria_id);

ALTER TABLE mapuche.dim_map_dw_lt_dependenciadesig2 ADD INDEX idx_1 (dependenciadesign_id);
ALTER TABLE mapuche.map_dw_lt_imppresupsubdependencia ADD INDEX idx_1 (imppresupsubdependencia_id);



-- optimizo
    ANALYZE NO_WRITE_TO_BINLOG TABLE `mapuche`.`dim_map_dw_lt_dependenciadesig2`,
    `mapuche`.`ft_lt_cargos`,
    `mapuche`.`map_dw_lt_categoriascargo`,
    `mapuche`.`map_dw_lt_imppresupsubdependencia`,
    `mapuche`.`map_dw_lt_persona`;

    OPTIMIZE NO_WRITE_TO_BINLOG TABLE `mapuche`.`dim_map_dw_lt_dependenciadesig2`,
    `mapuche`.`ft_lt_cargos`,
    `mapuche`.`map_dw_lt_categoriascargo`,
    `mapuche`.`map_dw_lt_imppresupsubdependencia`,
    `mapuche`.`map_dw_lt_persona`;




-- query para obtener ultima fecha
set @max_fecha :=(select max(a.periodoinfo) as periodoinfo  from mapuche.ft_lt_cargos a);
select
a.persona_id,
dim_map_dw_lt_dependenciadesig2.dependenciadesign_desc as escuela,
flag,
map_dw_lt_categoriascargo.escalafon_desc ,
a.periodoinfo,
sum(cast(a.importenetocargo as decimal (18,2))) as importeneto,
sum(a.cantcargosliq) as q_cargos_activos,
1 as q_personas
--1 as cantidad

from mapuche.ft_lt_cargos a inner join mapuche.map_dw_lt_categoriascargo on
    a.categoria_id = map_dw_lt_categoriascargo.categoria_id
inner join mapuche.dim_map_dw_lt_dependenciadesig2 on 
a.dependenciadesign_id = dim_map_dw_lt_dependenciadesig2.dependenciadesign_id 

where  dependenciadesign_desc = 'ESCUELA DE HUMANIDADES'
and escalafon_desc = 'Docente'
--and a.periodoinfo = (select max(a.periodoinfo) as periodoinfo  from mapuche.ft_lt_cargos a)
and a.periodoinfo = @max_fecha
group by 1,2,3,4,5;











-- *********
-- Creo tabla para unir con SIGEVA en base a Mapuche (join de mapu y rhun) y a SIGEVA
-- ver de armar un ETL que contemple estas tablas asi se ejecuta todo en MYSQL!!! y no creo tablas que no me sirven luego
-- ojo que no veo instituto de calidad industrial!! ni beninson

drop table if exists mapuche.ft_personas_mapuche_sigeva ;
create table mapuche.dim_personas_mapuche_sigeva as(
select
persona_id as id_mapuche,
p.id as id_sigeva,
ft_lt_cargos.periodoinfo as id_fecha,
dpc.cuil,
-- persona_desc,
p.apellido, p.nombre, p.email,
-- map_dw_lt_imppresupsubdependencia.imppresupdependencia_desc as escuela,
case when mapuche.ft_lt_cargos.dependenciadesign_id = -1 then map_dw_lt_imppresupsubdependencia.imppresupdependencia_desc
else dim_map_dw_lt_dependenciadesig2.dependenciadesign_desc end as escuela,
    map_dw_lt_categoriascargo.escalafon_desc ,
    sum(ft_lt_cargos.importenetocargo) as importeneto,
    1 as cantidad 

from mapuche.ft_lt_cargos inner join mapuche.dim_personas_cargos_docentes dpc  on -- aca tengo los cuil!!, mapu vs rhun; debo correr_todos_los_meses.sql
     ft_lt_cargos.persona_id = dpc.mapuche_persona_id

inner join public.persona p on  -- SIGEVA
dpc.cuil=p.cuil

inner join mapuche.dim_map_dw_lt_dependenciadesig2 on 
ft_lt_cargos.dependenciadesign_id = dim_map_dw_lt_dependenciadesig2.dependenciadesign_id

inner join mapuche.map_dw_lt_imppresupsubdependencia on
    ft_lt_cargos.imppresupsubdependencia_id = map_dw_lt_imppresupsubdependencia.imppresupsubdependencia_id

inner join mapuche.map_dw_lt_categoriascargo on
    ft_lt_cargos.categoria_id = map_dw_lt_categoriascargo.categoria_id

-- where persona_id = 72
group by 1,2,3,4,5,6,7,8,9
);

-- agrego FLAG
ALTER TABLE mapuche.dim_personas_mapuche_sigeva
ADD COLUMN flag INT NULL ;
--update para postgres, no para mysql

update mapuche.dim_personas_mapuche_sigeva as a
set flag = b.flag2
from 
--  inner join 
(select escuela,
case
when 	escuela	like 	 'INST.TEC.FERR SCALABRINI ORTIZ' then 1
when 	escuela	like 	 'INSTITUTO DEL TRANSPORTE' then 1
when 	escuela	like 	 'ESC. CIENCIA Y TECNOLOGIA' then 2
when 	escuela	like 	 'ESCUELA DE HUMANIDADES' then 3
when 	escuela	like 	 'INST INVEST E INGEN AMBIENTAL' then 4
when 	escuela	like 	 'INST. DE INV. BIOTECNOLOGICAS' then 5
when 	escuela	like 	 'ACTIVIDADES CENTRALES' then 6
when 	escuela	like 	 'INSTITUTO DE ARTES' then 7
when 	escuela	like 	 'UNIDAD DE ARTE' then 7
when 	escuela	like 	 'INST. DE REHABILITACION' then 8
when 	escuela	like 	 'ESCUELA DE POLITICA Y GOBIERNO' then 9
when 	escuela	like 	 'INSTITUTO DE  ALTOS ESTUDIOS' then 10
when 	escuela	like 	 'INSTITUTO DE ALTOS ESTUDIOS' then 10
when 	escuela	like 	 'INST.INVESTIG.PATRIM CULTURAL' then 11
when 	escuela	like 	 'ESC. ECONOMIA Y NEGOCIOS' then 12
when 	escuela	like 	 'INST. DE TECNOLOGIA J. SABATO' then 14
when 	escuela	like 	 'INSTITUTO CALIDAD INDUSTRIAL' then 13
when 	escuela	like 	 'INST. DE CALIDAD INDUSTRIAL' then 13
when 	escuela	like 	 'INSTITUTO DAN BENINSOM' then 15
when 	escuela	like 	 'INST TEC NUCLEAR DAN BENINSON' then 15


else 0 end as flag2
 from mapuche.dim_personas_mapuche_sigeva group by 1,2 ) as b
where a.escuela = b.escuela
;


--CREATE INDEX ON mapuche.dim_personas_mapuche_sigeva USING btree (id_mapuche);
--CREATE INDEX ON mapuche.dim_personas_mapuche_sigeva USING btree (id_sigeva);
CREATE INDEX ON mapuche.dim_personas_mapuche_sigeva USING btree (id_fecha);
CREATE INDEX ON mapuche.dim_personas_mapuche_sigeva USING btree (flag);

VACUUM VERBOSE ANALYZE mapuche.dim_personas_mapuche_sigeva;


-- esta es la tabla que usa el mapa1; este qry debo correrlo sobre MYSQL
-- de esta manera saco TODOS los quen tienen datos en SIGEVA, independientemente de la FECHA de carga y sus 2bles cargos (por eso 1 as cantidad)
use sigeva;
create table mapa1 as(
SELECT distinct cuil, escuela, flag, 1 as cantidad
FROM dim_personas_mapuche_sigeva 
group by 1,2,3
);

ALTER TABLE mapa1
ADD INDEX INDEX idx_1 (flag)