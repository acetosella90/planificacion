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
       $('#tabla4').hide();
        $('.internas').hide();
    });

    $('#pilaga').click(function () {
        $('#tabla2').hide().fadeIn(800);
        $('#tabla1').hide();
        $('#tabla3').hide();
        $('#tabla4').hide();
        $('.internas').hide();
    });


    $('#araucano').click(function () {
        $('#tabla3').hide().fadeIn(800);
        $('#tabla1').hide();
        $('#tabla2').hide();
        $('#tabla4').hide();
        $('.internas').hide();
    });

     $('#sigeva').click(function () {
        $('#tabla4').hide().fadeIn(800);
        $('#tabla1').hide();
        $('#tabla2').hide();
        $('#tabla3').hide();
         $('.internas').hide();
    });
    
    /* 
     * Dentro de cada tabla de los distintos sistemas puedo accder a sub tablas de cada sistema(DATOS AGREGADOS, DATOS POR UNIDAD ACADEMIA , DATOS DESAGRAGADOS POR UNIDAD):
     
     
     * Muestra sub tabla del sistema MAPUCHE segun se ingrese en (DATOS AGREGADOS, DATOS POR UNIDAD ACADEMIA , DATOS DESAGRAGADOS POR UNIDAD)tambien se incluye la funcionalidad de volver a tabla de seleccion principal
     */

    $('.principal1-1').click(function () {
      
        $('#tabla1-1').hide().fadeIn(800);
            $('#tabla1').hide();
 /*
       * guardo valores en las tablas i y j para despues usarlo "volver"
       */
            i = $('#tabla1-1');
            j=$('#tabla1');
    });

      $('.principal1-2').click(function () {
      
        $('#tabla1-2').hide().fadeIn(800);
            $('#tabla1').hide();
      
            i = $('#tabla1-2');
             j=$('#tabla1');
      });
        $('.principal1-3').click(function () {
      
        $('#tabla1-3').hide().fadeIn(800);
            $('#tabla1').hide();

       
            i = $('#tabla1-3');
            j=$('#tabla1');
        });
    
    
     /*
            * Muestra sub tabla del sistema PILAGA segun se ingrese en (DATOS AGREGADOS, DATOS POR UNIDAD ACADEMIA , DATOS DESAGRAGADOS POR UNIDAD)tambien se incluye la funcionalidad de volver a tabla de seleccion principal
     */
    
    
        $('.principal2-1').click(function () {
      
        $('#tabla2-1').hide().fadeIn(800);
            $('#tabla2').hide();

            i = $('#tabla2-1');
            j=$('#tabla2');
        });

      $('.principal2-2').click(function () {
      
        $('#tabla2-2').hide().fadeIn(800);
            $('#tabla2').hide();

            i = $('#tabla2-2');
             j=$('#tabla2');
      });
        $('.principal2-3').click(function () {
      
        $('#tabla2-3').hide().fadeIn(800);
            $('#tabla2').hide();

            i = $('#tabla2-3');
            j=$('#tabla2');
        });
    
    
    /*
            * Muestra sub tabla del sistema GUARANI segun se ingrese en (DATOS AGREGADOS, DATOS POR UNIDAD ACADEMIA , DATOS DESAGRAGADOS POR UNIDAD) tambien se incluye la funcionalidad de volver a tabla de seleccion principal
     */
    
    
        $('.principal3-1').click(function () {
      
        $('#tabla3-1').hide().fadeIn(800);
            $('#tabla3').hide();

            i = $('#tabla3-1');
             j=$('#tabla3');
        });

      $('.principal3-2').click(function () {
      
        $('#tabla3-2').hide().fadeIn(800);
            $('#tabla3').hide();

            i = $('#tabla3-2');
             j=$('#tabla3');
      });
        $('.principal3-3').click(function () {
      
        $('#tabla3-3').hide().fadeIn(800);
            $('#tabla3').hide();

            i = $('#tabla3-3');
             j=$('#tabla3');
        });
    
      /*
            * Muestra sub tabla del sistema Sigeva segun se ingrese en (DATOS AGREGADOS, DATOS POR UNIDAD ACADEMIA , DATOS DESAGRAGADOS POR UNIDAD) tambien se incluye la funcionalidad de volver a tabla de seleccion principal
     */
   
     $('.principal4-1').click(function () {
      
        $('#tabla4-1').hide().fadeIn(800);
            $('#tabla4').hide();

            i = $('#tabla4-1');
             j=$('#tabla4');
        });

      $('.principal4-2').click(function () {
      
        $('#tabla4-2').hide().fadeIn(800);
            $('#tabla4').hide();

            i = $('#tabla4-2');
             j=$('#tabla4');
      });
        $('.principal4-3').click(function () {
      
        $('#tabla4-3').hide().fadeIn(800);
            $('#tabla4').hide();

            i = $('#tabla4-3');
             j=$('#tabla4');
        });
    
    
    
    /*
            * La Funcionalidad del boton "VOLVER" es igual para todas los sistemas
     */
    $('.volver').click(function () {
        alert("asdas");
        i.hide();
        j.hide().fadeIn(800);


    });


};

$(document).ready(main);

/*
 * FIN ;;;;;;
 **/




