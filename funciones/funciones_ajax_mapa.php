<?php

require_once '../class/Conexion.php';
require_once '../class/Clases.php';
require_once '../class/Consultas.php';
require_once '../funciones/parseo.php';

$conexion = new Conexion();

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
//$titulo = getTitulos($todo);


echo "<pre>";
var_dump($todo);
echo "</pre>";