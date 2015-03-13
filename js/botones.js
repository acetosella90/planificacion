/* 
 *botones de visualizacion 
 **/

var main = function () {

    /* 
     * botones de la pagina principal muestra y cambia la tabla por la tabla del boton que se toco
     **/
    $('#mapuche').click(function () {
        $('#tabla1').hide().fadeIn(800);
        $('#tabla2').hide();
        $('#tabla3').hide();
        $('.internas').hide();
    });

    $('#pilaga').click(function () {
        $('#tabla2').hide().fadeIn(800);
        $('#tabla1').hide();
        $('#tabla3').hide();
        $('.internas').hide();
    });


    $('#araucano').click(function () {
        $('#tabla3').hide().fadeIn(800);
        $('#tabla1').hide();
        $('#tabla2').hide();
        $('.internas').hide();
    });

    /* 
     * Dentro de cada tabla de los distintos sistemas puedo accder a sub tablas de cada sistema(DATOS AGREGADOS, DATOS POR UNIDAD ACADEMIA , DATOS DESAGRAGADOS POR UNIDAD):
     
     
     * Muestra sub tabla del sistema MAPUCHE segun se ingrese en (DATOS AGREGADOS, DATOS POR UNIDAD ACADEMIA , DATOS DESAGRAGADOS POR UNIDAD)tambien se incluye la funcionalidad de volver a tabla de seleccion principal
     */

    $('.principal1-1').click(function () {
      
        $('#tabla1-1').hide().fadeIn(800);
            $('#tabla1').hide();

            i = $('#tabla1-1');
        
    });

      $('.principal1-2').click(function () {
      
        $('#tabla1-2').hide().fadeIn(800);
            $('#tabla1').hide();

            i = $('#tabla1-2');
        });
        $('.principal1-3').click(function () {
      
        $('#tabla1-3').hide().fadeIn(800);
            $('#tabla1').hide();

            i = $('#tabla1-3');
        });
    
    
     /*
            * Muestra sub tabla del sistema PILAGA segun se ingrese en (DATOS AGREGADOS, DATOS POR UNIDAD ACADEMIA , DATOS DESAGRAGADOS POR UNIDAD)tambien se incluye la funcionalidad de volver a tabla de seleccion principal
     */
    
    
        $('.principal2-1').click(function () {
      
        $('#tabla2-1').hide().fadeIn(800);
            $('#tabla2').hide();

            i = $('#tabla2-1');
        });

      $('.principal2-2').click(function () {
      
        $('#tabla2-2').hide().fadeIn(800);
            $('#tabla2').hide();

            i = $('#tabla2-2');
        });
        $('.principal2-3').click(function () {
      
        $('#tabla2-3').hide().fadeIn(800);
            $('#tabla2').hide();

            i = $('#tabla2-3');
        });
    
    
    /*
            * Muestra sub tabla del sistema GUARANI segun se ingrese en (DATOS AGREGADOS, DATOS POR UNIDAD ACADEMIA , DATOS DESAGRAGADOS POR UNIDAD) tambien se incluye la funcionalidad de volver a tabla de seleccion principal
     */
    
    
        $('.principal3-1').click(function () {
      
        $('#tabla3-1').hide().fadeIn(800);
            $('#tabla3').hide();

            i = $('#tabla3-1');
        });

      $('.principal3-2').click(function () {
      
        $('#tabla3-2').hide().fadeIn(800);
            $('#tabla3').hide();

            i = $('#tabla3-2');
        });
        $('.principal3-3').click(function () {
      
        $('#tabla3-3').hide().fadeIn(800);
            $('#tabla3').hide();

            i = $('#tabla3-3');
        });
    
    /*
            * La Funcionalidad del boton "VOLVER" es igual para todas los sistemas
     */
    $('.volver').click(function () {

        i.hide();
        $('#tabla1').hide().fadeIn(800);


    });


};

$(document).ready(main);

/*
 * FIN ;;;;;;
 **/




