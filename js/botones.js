/* 
*botones de visualizacion 
**/

var main = function(){

/* 
* botones de la pagina principal muestra y cambia la tabla por la tabla del boton que se toco
**/   
    $('#mapuche').click(function(){
        $('#tabla1').hide().fadeIn(800);
    $('#tabla2').hide();
    $('#tabla3').hide();
    });
  
$('#pilaga').click(function(){
        $('#tabla2').hide().fadeIn(800);
    $('#tabla1').hide();
    $('#tabla3').hide();
    });

  
$('#araucano').click(function(){
        $('#tabla3').hide().fadeIn(800);
    $('#tabla1').hide();
    $('#tabla2').hide();
    });

/* 
* Dentro de cada tabla de los distintos sistemas puedo accder a sub tablas:

 
* Muestra sub tabla de DATOS AGREGADOS tambien se incluye la funcionalidad de volver a tabla de seleccion principal
*/   
    $('#principal').click(function(){
        
       $('#tabla2').hide().fadeIn(800);
    $('#tabla1').hide();
 });
        
 $('#volver').click(function(){
        
    $('#tabla2').hide();
    $('#tabla1').hide().fadeIn(800);
});

/* 
* Muestra sub tabla de DATOS POR UNIDAD ACADÉMICA tambien se incluye la funcionalidad de VOLVER a tabla de seleccion principal
**/
$('#principal2').click(function(){
        
        $('#tabla3').hide().fadeIn(800);
    $('#tabla1').hide();
 });

 $('#volver2').click(function(){
        
    $('#tabla3').hide();
    $('#tabla1').hide().fadeIn(800);
});

 /* 
* Muestra sub tabla de DATOS DESAGREGADOS POR UNIDAD ACADÉMICAtambien se incluye la funcionalidad de VOLVER a tabla de seleccion principal
**/   
    $('#principal3').click(function(){
        
        $('#tabla4').hide().fadeIn(800);
    $('#tabla1').hide();
 });
 $('#volver3').click(function(){
        
    $('#tabla4').hide();
    $('#tabla1').hide().fadeIn(800);
});
};

 /* 
* FIN ;;;;;;
**/
$(document).ready(main);


