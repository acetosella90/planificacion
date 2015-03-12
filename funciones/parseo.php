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
