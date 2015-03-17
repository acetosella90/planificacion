<?php
include './../class/Clases.php';
include './../class/Conexion.php';
$elegido = utf8_decode ($_POST[elegido]);
$sql = "

SELECT
    academica_d_facultades.facultad as facultad,
    academica_d_series.nombreserie as tipo_alumno,
    academica_ft_cuadros1y2.idanioinformado as anio,
    academica_d_titulos.titulo as titulo,
    sum(academica_ft_cuadros1y2.cantidad) as total
FROM
	araucano.academica_ft_cuadros1y2 INNER JOIN araucano.academica_d_series 
		ON academica_ft_cuadros1y2.idserie = academica_d_series.idserie 
	INNER JOIN araucano.academica_d_facultades 
		ON academica_ft_cuadros1y2.idfacultad = academica_d_facultades.idfacultad 
	INNER JOIN araucano.academica_d_titulos 
		ON academica_ft_cuadros1y2.idtitulo = academica_d_titulos.idtitulo
WHERE
	facultad like '$elegido'

GROUP BY
    academica_d_titulos.titulo  
ORDER BY 
    facultad, titulo;";

$conexion = new Conexion();
$consulta = $conexion->prepare($sql);
$a = $consulta->execute();
$todo = $consulta->fetchAll();
//var_dump($sql);
echo Clases::geTitulos($todo); 
