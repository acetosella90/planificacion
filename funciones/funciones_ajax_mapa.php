<?php

require_once '../class/Conexion.php';
require_once '../class/Clases.php';
require_once '../class/Consultas.php';
require_once '../funciones/parseo.php';

$conexion = new Conexion();

$egresados = 0;
$alumnos = 0;

for ($i = 0; $i < count($_POST[id]); $i++) {
    if ($_POST[id][$i] == "araucano") {
        $araucano = 1;
    }
}

if ($araucano) {
    $consulta = $conexion->prepare(Consultas::getTodoAraucanoEscuela($_POST["escuela"]));
    $consulta->execute();
    $todo = $consulta->fetchAll();
}
$titulo = getTitulos($todo);

for($i = 0 ; $i < count($todo) ; $i++){
    if($todo[$i]['tipo_alumno'] == "Egresados"){
        $egresados += $todo[$i]['total'];
    }
}
for($i = 0 ; $i < count($todo) ; $i++){
    if($todo[$i]['tipo_alumno'] == "Alumnos"){
        $alumnos += $todo[$i]['total'];
    }
}



echo "<strong>Cantidad de Carreras: </strong>".count($titulo);
echo "<br><strong>Cantidad de Egresados: </strong>".$egresados;
echo "<br><strong>Cantidad de Alumnos: </strong>".$alumnos;