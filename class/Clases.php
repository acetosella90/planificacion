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
            echo "<option ";
            if ($_POST[combo_fechas] == $i)
                echo 'selected';
            echo "   value='$i'>" . $i . "</option>";
        }
        echo "</select>";
    }

    static public function getFacultades($facultades) {
        echo "<select name='combo_facultades' id='facultad' style='margin-left: 5px;'>";
        for ($i = 0; $i < count($facultades); $i++) {
            echo "<option";
            if ($_POST[combo_facultades] == $facultades[$i])
                echo " selected ";
            echo " value='$facultades[$i]'>" . $facultades[$i] . "</option>";
        }
        echo "</select>";
        echo "</div>";
    }

    static public function geTitulos($titulo) {

        for ($i = 0; $i < count($titulo); $i++) {
            echo "<option>" . utf8_encode($titulo[$i][titulo]) . "</option>";
        }
    }

    static public function getTipoAlumno() {
        
       if($_SERVER["REQUEST_METHOD"]  != 'POST'){
           $a = " checked ";
           $b = " checked ";
           $c = " checked ";
       }
       else{

            if ($_POST[tipo_alumno][0] == "Alumnos" || $_POST[tipo_alumno][1] == "Alumnos" || $_POST[tipo_alumno][2] == "Alumnos") 
                $a = " checked ";
            else 
               $a = ""; 


            if ($_POST[tipo_alumno][0] == "Egresados" || $_POST[tipo_alumno][1] == "Egresados" || $_POST[tipo_alumno][2] == "Egresados") 
                $b = " checked ";
            else 
               $b = "";

            if ($_POST[tipo_alumno][0] == "Reinscriptos" || $_POST[tipo_alumno][1] == "Reinscriptos" || $_POST[tipo_alumno][2] == "Reinscriptos") 
                $c = " checked ";
            else 
               $c = "";
        
        }
        echo '<div id="alumnos" style="float: left; margin-left: 10px;">';
        echo "<input  style=' margin-left: 5px;' type='checkbox' name='tipo_alumno[]'" . $a . " value='Alumnos'>Alumnos";
        echo "<input style=' margin-left: 5px;' type='checkbox' name='tipo_alumno[]'" . $b . " value='Egresados'>Egresados";
        echo "<input style=' margin-left: 5px;' type='checkbox' name='tipo_alumno[]'" . $c . " value='Reinscriptos'>Reinscriptos";
        echo '</div>';
    }


 
    static public function getPaises($paises) {
        echo "<select name='combo_paises' id='pais' style='margin-left: 5px;'>";
        for ($i = 0; $i < count($paises); $i++) {
            echo "<option";
            if ($_POST[combo_paises] == $paises[$i])
                echo " selected ";
            echo " value='$paises[$i]'>" . $paises[$i] . "</option>";
        }
        echo "</select>";
        echo "</div>";
    }

    
      static public function getGenero() {
        
       if($_SERVER["REQUEST_METHOD"]  != 'POST'){
           $a = " checked ";
           $b = " checked ";
      
       }
       else{

            if ($_POST[genero][0] == "Femenino" || $_POST[genero][1] == "Femenino" ) 
                $a = " checked ";
            else 
               $a = ""; 


            if ($_POST[genero][0] == "Maculino" || $_POST[genero][1] == "Maculino" ) 
                $b = " checked ";
            else 
               $b = "";

            
        
        }
        echo '<div id="genero" style="float: left; margin-left: 10px;">';
        echo "<input  style=' margin-left: 5px;' type='checkbox' name='genero[]'" . $a . " value='Femenino'>Femenino";
        echo "<input style=' margin-left: 5px;' type='checkbox' name='genero[]'" . $b . " value='Maculino'>Maculino";
        echo '</div>';
    }
    
    
        }