-- ANALIZO LA CANTIDAD DE CARGOS VS LA CANTIDAD DE PERSONAS, ES DECIR, CUANTOS CARGOS POR PERSONA HAY!!!
use mapuche;
drop table if exists mapuche.temp;
create table mapuche.temp as(
select
a.persona_id,
a.periodoinfo,
-- dim_map_dw_lt_dependenciadesig2.dependenciadesign_desc as escuela,
case 
when 	dependenciadesign_desc	like 	 'INST.TEC.FERR SCALABRINI ORTIZ' then 1
when 	dependenciadesign_desc	like 	 'INSTITUTO DEL TRANSPORTE' then 1
when 	dependenciadesign_desc	like 	 'ESC. CIENCIA Y TECNOLOGIA' then 2
when 	dependenciadesign_desc	like 	 'ESCUELA DE HUMANIDADES' then 3
when 	dependenciadesign_desc	like 	 'INST INVEST E INGEN AMBIENTAL' then 4
when 	dependenciadesign_desc	like 	 'INST. DE INV. BIOTECNOLOGICAS' then 5
when 	dependenciadesign_desc	like 	 'ACTIVIDADES CENTRALES' then 6
when 	dependenciadesign_desc	like 	 'UNIDAD DE ARTE' then 7
when 	dependenciadesign_desc	like 	 'INSTITUTO DE ARTES' then 7
when 	dependenciadesign_desc	like 	 'INST. DE REHABILITACION' then 8
when 	dependenciadesign_desc	like 	 'ESCUELA DE POLITICA Y GOBIERNO' then 9
when 	dependenciadesign_desc	like 	 'INSTITUTO DE  ALTOS ESTUDIOS' then 10
when 	dependenciadesign_desc	like 	 'INSTITUTO DE ALTOS ESTUDIOS' then 10
when 	dependenciadesign_desc	like 	 'INST.INVESTIG.PATRIM CULTURAL' then 11
when 	dependenciadesign_desc	like 	 'ESC. ECONOMIA Y NEGOCIOS' then 12
when 	dependenciadesign_desc	like 	 'INSTITUTO CALIDAD INDUSTRIAL' then 13
when 	dependenciadesign_desc	like 	 'INST. DE TECNOLOGIA J. SABATO' then 14
when 	dependenciadesign_desc	like 	 'INSTITUTO DAN BENINSOM' then 15
else 0 end as flag,

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
group by 1,2,3,4 )


select periodo_info, escuela, escalafon_desc, 
sum(importeneto), sum(q_cargos_activos), sum(q_personas)
from mapuche.temp
where escuela = 'ACTIVIDADES CENTRALES'
and id_fecha = '2015-03-01' 
group by 1,2,3

2015-03-01	ACTIVIDADES CENTRALES	Docente	1605473.69	164	155
2015-03-01	ACTIVIDADES CENTRALES	No Docente	7699555.82	672	660
2015-03-01	ACTIVIDADES CENTRALES	Superior	651673.32	17	16


select  *
--id_fecha, persona_id,escuela, escalafon_desc, 
--sum(importeneto), sum(q_cargos_activos), sum(q_personas)
from mapuche.temp
where escuela = 'ACTIVIDADES CENTRALES'
and escalafon_desc = 'Superior'
and id_fecha = '2015-03-01' 
group by 1,2,3