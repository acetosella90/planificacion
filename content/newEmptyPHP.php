<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$consulta = $conexion->prepare(Consultas::getFiltroAraucano2($POST));
    $consulta->execute();
    $todo2 = $consulta->fetchAll();
    
    echo "<pre>";
    var_dump($todo2);
    echo "</pre>";