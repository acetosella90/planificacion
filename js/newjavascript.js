/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */



 /* 
     * Muestra sub tabla de DATOS POR UNIDAD ACADÉMICA tambien se incluye la funcionalidad de VOLVER a tabla de seleccion principal
     **/
    $('.principal2').click(function () {

        $('#tabla2-1').hide().fadeIn(800);
        $('#tabla2').hide();
    });

    $('#volver2').click(function () {

        $('#tabla2-1').hide();
        $('#tabla2').hide().fadeIn(800);
    });

    /* 
     * Muestra sub tabla de DATOS DESAGREGADOS POR UNIDAD ACADÉMICAtambien se incluye la funcionalidad de VOLVER a tabla de seleccion principal
     **/
    $('.principal3').click(function () {

        $('#tabla3-1').hide().fadeIn(800);
        $('#tabla3').hide();
    });
    $('#volver3').click(function () {

        $('#tabla3-1').hide();
        $('#tabla3').hide().fadeIn(800);
    });
    
    
    
     else if ($('.principal2').click(function () {
            return 1;
        })) {

            $('#tabla1-2').hide().fadeIn(800);
            $('#tabla1').hide();
            alert("tabla2");
            i = $('#tabla1-2');
        }
        else {

            $('#tabla1-3').hide().fadeIn(800);
            $('#tabla1').hide();
            alert("tabla3");
            i = $('#tabla1-3');