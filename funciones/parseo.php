<?php

function parceo() {
    $fichero = @fopen("../files/total de egresados.csv", "r");
    $i = 0;
    $j = 1;
    while (( $data = fgetcsv($fichero, 2048, ",", "\"")) !== false) { // Mientras hay líneas que leer...
        foreach ($data as $row) {
            $datos[$i][] = $row;
            if ($j % 2 == 0)
                $i++;
            $j++;
        }
    }
    fclose($fp);
    return $datos;
}

function array_sort($array, $on, $order = SORT_ASC) {
    $new_array = array();
    $sortable_array = array();

    if (count($array) > 0) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                foreach ($v as $k2 => $v2) {
                    if ($k2 == $on) {
                        $sortable_array[$k] = $v2;
                    }
                }
            } else {
                $sortable_array[$k] = $v;
            }
        }

        switch ($order) {
            case SORT_ASC:
                asort($sortable_array);
                break;
            case SORT_DESC:
                arsort($sortable_array);
                break;
        }

        foreach ($sortable_array as $k => $v) {
            $new_array[$k] = $array[$k];
        }
    }

    return $new_array;
}

function getFacultades($todo) {

    $facultades = array();
    $j = 0;

    for ($i = 0; $i < count($todo); $i++) {

        if ($facultades[$j - 1] != $todo[$i]['facultad']) {
            $facultades[$j] = $todo[$i]['facultad'];
            $j++;
        }
    }
    return $facultades;
}

function getTitulos($todo) {

    $titulo = array();
    $j = 0;

    for ($i = 0; $i < count($todo); $i++) {

        if ($titulo[$j - 1] != $todo[$i]['titulo']) {
            $titulo[$j] = $todo[$i]['titulo'];
            $j++;
        }
    }
    return $titulo;
}

function getGeneros($todo) {

    $genero = array();
    $j = 0;

    for ($i = 0; $i < count($todo); $i++) {

        if ($titulo[$j - 1] != $todo[$i]['genero']) {
            $titulo[$j] = $todo[$i]['genero'];
            $j++;
        }
    }
    return $genero;
}

function getPaises($todo) {
    ##$todo2=  array ( 0 => "pepe" , 1=> "pepe", 2 =>"pepe", 3=>"anibal");
    $paises = array();
    $j = 0;
    $todo = array_sort($todo, "pais",SORT_ASC);
    
    foreach ($todo as $k2 ) {
                  $paises2[] = $k2[pais];
    
    }
 
    for ($i = 0; $i < count($paises2); $i++) {

        if ($paises[$j - 1] != $paises2[$i]) {
            $paises[$j] = $paises2[$i];
            $j++;
        }
    }
    
    

    return $paises;
}
