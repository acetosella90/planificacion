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

        echo "<input  style=' margin-left: 5px;' type='checkbox' name='tipo_alumno[]'" . $a . " value='Alumnos'>Alumnos";
        echo "<input style=' margin-left: 5px;' type='checkbox' name='tipo_alumno[]'" . $b . " value='Egresados'>Egresados";
        echo "<input style=' margin-left: 5px;' type='checkbox' name='tipo_alumno[]'" . $c . " value='Reinscriptos'>Reinscriptos";
       
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


            if ($_POST[genero][0] == "Masculino" || $_POST[genero][1] == "Masculino" ) 
                $b = " checked ";
            else 
               $b = "";    
        
        }
        
        echo "<input  style=' margin-left: 5px;' type='checkbox' name='genero[]'" . $a . " value='Femenino'>Femenino";
        echo "<input style=' margin-left: 5px;' type='checkbox' name='genero[]'" . $b . " value='Masculino'>Masculino";
       
    }
    
       
    
        static public function getTipoCredito() {
        
       if($_SERVER["REQUEST_METHOD"]  != 'POST'){
           $a = " checked ";
           $b = " checked ";
           $c = " checked ";
       }
       else{

            if ($_POST[tipo_alumno][0] == "credito_original" || $_POST[tipo_alumno][1] == "credito_original" || $_POST[tipo_alumno][2] == "credito_original") 
                $a = " checked ";
            else 
               $a = ""; 


            if ($_POST[tipo_alumno][0] == "credito" || $_POST[tipo_alumno][1] == "credito" || $_POST[tipo_alumno][2] == "credito") 
                $b = " checked ";
            else 
               $b = "";

            if ($_POST[tipo_alumno][0] == "preventivo" || $_POST[tipo_alumno][1] == "preventivo" || $_POST[tipo_alumno][2] == "preventivo") 
                $c = " checked ";
            else 
               $c = "";
        
        }

        echo "<input  style=' margin-left: 5px;' type='checkbox' name='tipo_credito[]'" . $a . " value='credito_original'>credito_original";
        echo "<input style=' margin-left: 5px;' type='checkbox' name='tipo_credito[]'" . $b . " value='credito'>credito";
        echo "<input style=' margin-left: 5px;' type='checkbox' name='tipo_credito[]'" . $c . " value='preventivo'>preventivo";
       
    }

    
    
     static public function getUnidades($unidades) {
        echo "<select name='combo_unidades' id='unidad' style='margin-left: 5px;'>";
        for ($i = 0; $i < count($unidades); $i++) {
            echo "<option";
            if ($_POST[combo_unidades] == $unidades[$i])
                echo " selected ";
            echo " value='$unidades[$i]'>" . $unidades[$i] . "</option>";
        }
        echo "</select>";
       
    }
    
    
       }