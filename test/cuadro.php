<?php
require_once 'class/Conexion.php';
$conexion = new Conexion();

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
    facultad;";

$consulta = $conexion->prepare($sql);

$consulta->execute();
echo '<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">';
foreach ($consulta->fetchAll() as $row) {

    echo "<pre>";
    var_dump($row);
    echo "</pre>";
}
echo "</div>";
?>