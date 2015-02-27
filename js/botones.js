/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

var main = function(){
   
    
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

};



$(document).ready(main);


