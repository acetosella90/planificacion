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
    if ($_POST[id][$i] == "pilaga") {
        $pilaga = 1;
    }
}

if ($araucano) {
    $consulta = $conexion->prepare(Consultas::getTodoAraucanoEscuela($_POST["escuela"]));
    $consulta->execute();
    $todo = $consulta->fetchAll();

    $consulta2 = $conexion->prepare(Consultas::getTodoAraucanoEscuela($_POST["escuela"], 1));
    $consulta2->execute();
    $todo2 = $consulta2->fetchAll();

    $titulo = getTitulos($todo);

    for ($i = 0; $i < count($todo2); $i++) {
        if ($todo2[$i]['tipo_alumno'] == "Egresados") {
            $egresados += $todo2[$i]['total'];
        }
    }
    for ($i = 0; $i < count($todo); $i++) {
        if ($todo[$i]['tipo_alumno'] == "Alumnos") {
            $alumnos += $todo[$i]['total'];
        }
    }
    echo"<strong><h4 style='text-decoration: underline;'>Información de Araucano</h4></strong>";
    echo "<strong>Cantidad de Carreras: </strong>" . count($titulo);
    echo "<br><strong>Cantidad de Egresados: </strong>" . $egresados;
    echo "<br><strong>Cantidad de Alumnos (año ". (date('Y') - 2) ."): </strong>" . $alumnos;
}


