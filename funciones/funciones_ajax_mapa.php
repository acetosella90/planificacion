<?php

require_once '../class/Conexion.php';
require_once '../class/Clases.php';
require_once '../class/Consultas.php';

$conexion = new Conexion();

for ($i = 0; $i < count($_POST[id]); $i++) {
    if ($_POST[id][$i] == "araucano") {
        $araucano = 1;
    }
}

if ($araucano) {
    $consulta = $conexion->prepare(Consultas::getTodoAraucano());
    $consulta->execute();
    $todo = $consulta->fetchAll();
}
var_dump($todo);
