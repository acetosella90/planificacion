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
    if ($_POST[id][$i] == "mapuche") {
        $mapuche = 1;
    }
    if ($_POST[id][$i] == "sigeva") {
        $sigeva = 1;
    }
}
echo "<div class='row'>";

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
    echo "<div  class='col-xs-18 col-md-3'>";
    echo "<strong><h4 style='text-decoration: underline;'>Información de Araucano</h4></strong>";
    echo "<strong>Cantidad de Carreras: </strong>" . count($titulo);
    echo "<br><strong>Cantidad de Egresados: </strong>" . $egresados;
    echo "<br><strong>Cantidad de Alumnos (año " . (date('Y') - 2) . "): </strong>" . $alumnos;
    echo "</div>";
}

if ($pilaga) {
    
    $consulta = $conexion->prepare(Consultas::getTodoPilagaEscuela($_POST["escuela"]));
    $consulta->execute();
    $todo = $consulta->fetchAll();
      
    
    echo "<div  class='col-xs-18 col-md-3'>";
    echo"<strong><h4 style='text-decoration: underline;'>Información de Pilaga</h4></strong>";
    echo "<strong>Credito Original: </strong> $ ". number_format($todo[0][m0], 2, ',', '.');
    echo "<br><strong>Credito: </strong> $ ". number_format($todo[0][m1], 2, ',', '.');;
    echo "<br><strong>Saldo presupuestario: </strong> $ ". number_format($todo[0][m2], 2, ',', '.');
    echo "</div>";
}

if ($mapuche) {
    
    $consulta = $conexion->prepare(Consultas::getTodoMapuche($_POST["escuela"]));
    $consulta->execute();
    $todo = $consulta->fetchAll();
      
    
    echo "<div  class='col-xs-18 col-md-3'>";
    echo"<strong><h4 style='text-decoration: underline;'>Información de Mapuche</h4></strong>";
    echo "<strong>Docentes: </strong>". $todo[0][cantcargosliq];
    echo "<br><strong>No Docentes: </strong>". $todo[1][cantcargosliq];
    echo "<br><strong>Superior: </strong>"; if($todo[2][cantcargosliq]) echo $todo[2][cantcargosliq]; else echo "0";
    echo "</div>";
}

if ($sigeva) {
    
    $consulta = $conexion->prepare(Consultas::getTodoPilagaEscuela($_POST["escuela"]));
    $consulta->execute();
    $todo = $consulta->fetchAll();
        
    echo "<div  class='col-xs-18 col-md-3'>";
    echo"<strong><h4 style='text-decoration: underline;'>Información de Sigeva</h4></strong>";
    echo "<strong>Credito Original: </strong> $ ". number_format($todo[0][m0], 2, '.', ' ');
    echo "<br><strong>Credito: </strong> $ ". $todo[0][m1];
    echo "<br><strong>Saldo presupuestario: </strong> $ ". $todo[0][m2];
    echo "</div>";
}

echo "</div>";
