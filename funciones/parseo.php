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

function array_sort($array, $on, $order=SORT_ASC)
{
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