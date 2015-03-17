<?php

/**
 * Description of Clases
 *
 * @author macetosella
 */
class Clases {

    static public function getComboFechas() {
        echo "<div  style='float: left;'>";
        echo "<select name='combo_fechas'>";
        for ($i = 1995; $i < date('Y'); $i++) {
            echo "<option value='$i'>" . $i . "</option>";
        }
        echo "</select>";
    }
    static public function getFacultades($facultades) {
        echo "<select name='combo_facultades' id='facultad' style='margin-left: 5px;'>";
        for ($i = 0; $i < count($facultades); $i++) {
            echo "<option value='$facultades[$i]'>" . $facultades[$i] . "</option>";
        }
        echo "</select>";
        echo "</div>";
    }
    static public function geTitulos($titulo) {
        
        for ($i = 0; $i < count($titulo); $i++) {
            echo "<option>" . utf8_encode ($titulo[$i][titulo]) . "</option>";
        }
    
    }
    static public function getTipoAlumno(){
        echo '<div id="alumnos" style="float: left;">';
            echo '<input type="checkbox" name="tipo_alumno[]" value="Alumnos">Alumnos';
            echo '<input type="checkbox" name="tipo_alumno[]" value="Egresados">Egresados';
            echo '<input type="checkbox" name="tipo_alumno[]" value="Reinscriptos">Reinscriptos';
        echo '</div>';
        
    }

}
