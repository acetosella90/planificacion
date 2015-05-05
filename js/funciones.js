$(document).ready(function() {
    
    $('#p_base').click(function() {
        $('body').css("background-image","url()");
        $('#p_base').addClass("active");
        $('#p_mapa').removeClass("active");
        $('#p_mapaT').removeClass("active");
        $('#p_historia').removeClass("active");
        $('#p_contacto').removeClass("active");
         $('#p_mapa_sigeva').removeClass("active");
        var ajax_data = {
            "id": "p_base"
        };
        $.ajax({
            data: ajax_data,
            type: "POST",
            url: "funciones/funciones_ajax.php",
            success: function(a) {
                $('#contenido').html(a);
            }
        });
    });
  
    $('#p_mapa').click(function() {
        $('body').css("background-image","url()");
        $('#p_base').removeClass("active");
        $('#p_mapa').addClass("active");
        $('#p_historia').removeClass("active");
        $('#p_contacto').removeClass("active");
        $('#p_mapaT').removeClass("active");
         $('#p_mapa_sigeva').removeClass("active");
        var ajax_data = {
            "id": "p_mapa"
        };
        $.ajax({
            data: ajax_data,
            type: "POST",
            url: "funciones/funciones_ajax.php",
            success: function(a) {
                $('#contenido').html(a);
            }
        });
    });
    $('#p_mapaT').click(function() {
        $('body').css("background-image","url()");
        $('#p_base').removeClass("active");
        $('#p_mapaT').addClass("active");
        $('#p_historia').removeClass("active");
        $('#p_contacto').removeClass("active");
         $('#p_mapa_sigeva').removeClass("active");
        var ajax_data = {
            "id": "p_mapaT"
        };
        $.ajax({
            data: ajax_data,
            type: "POST",
            url: "funciones/funciones_ajax.php",
            success: function(a) {
                $('#contenido').html(a);
            }
        });
    });
    
    $('#mapa1').click(function() {
        var ajax_data = {
            "id": "mapa1"
        };
        $.ajax({
            data: ajax_data,
            type: "POST",
            url: "funciones/funciones_ajax.php",
            success: function(a) {
                $('#contenido').html(a);
            }
        });
    });
    
    $('#mapa2').click(function() {
        var ajax_data = {
            "id": "mapa2"
        };
        $.ajax({
            data: ajax_data,
            type: "POST",
            url: "funciones/funciones_ajax.php",
            success: function(a) {
                $('#contenido').html(a);
            }
        });
    });
   
        
    
  $('#p_historia').click(function() {
        $('body').css("background-image","url()");
        $('#p_mapaT').removeClass("active");
        $('#p_base').removeClass("active");
        $('#p_mapa').removeClass("active");
        $('#p_contacto').removeClass("active");
        $('#p_historia').addClass("active");
         $('#p_mapa_sigeva').removeClass("active");
        var ajax_data = {
            "id": "p_historia"
        };
        $.ajax({
            data: ajax_data,
            type: "POST",
            url: "funciones/funciones_ajax.php",
            success: function(a) {
                $('#contenido').html(a);
            }
        });
    });
    
    $('#p_contacto').click(function() {
        $('body').css("background-image","url()");
        $('#p_mapaT').removeClass("active");
        $('#p_base').removeClass("active");
        $('#p_mapa').removeClass("active");
        $('#p_historia').removeClass("active");
        $('#p_contacto').addClass("active");
         $('#p_mapa_sigeva').removeClass("active");
        var ajax_data = {
            "id": "p_contacto"
        };
        $.ajax({
            data: ajax_data,
            type: "POST",
            url: "funciones/funciones_ajax.php",
            success: function(a) {
                $('#contenido').html(a);
            }
        });
    });

 $('#tabla_araucano').click(function() {
         $('#p_base').removeClass("active");
        $('#tabla_araucano').addClass("active");
        var ajax_data = {
            "id": "p_tabla-araucano"
        };
        $.ajax({
            data: ajax_data,
            type: "POST",
            url: "funciones/funciones_ajax.php",
            success: function(a) {
                $('#contenido').html(a);
            }
        });
    });
    
    $("#btn-tabla1").click(function (){
        $("#tabla1").slideToggle();
    });
    
    $("#btn-tabla2").click(function (){
        $("#tabla2").slideToggle();
    });


$('#tabla_araucano2').click(function() {
         $('#p_base').removeClass("active");
        $('#tabla_araucano2').addClass("active");
        var ajax_data = {
            "id": "p_tabla-araucano2"
        };
        $.ajax({
            data: ajax_data,
            type: "POST",
            url: "funciones/funciones_ajax.php",
            success: function(a) {
                $('#contenido').html(a);
            }
        });
    });
    
$('#tabla_araucano3').click(function() {
         $('#p_base').removeClass("active");
        $('#tabla_araucano3').addClass("active");
        var ajax_data = {
            "id": "p_tabla-araucano3"
        };
        $.ajax({
            data: ajax_data,
            type: "POST",
            url: "funciones/funciones_ajax.php",
            success: function(a) {
                $('#contenido').html(a);
            }
        });
    });    

$('#tabla_pilaga').click(function() {
         $('#p_base').removeClass("active");
        $('#tabla_pilaga').addClass("active");
        var ajax_data = {
            "id": "p_tabla-pilaga"
        };
        $.ajax({
            data: ajax_data,
            type: "POST",
            url: "funciones/funciones_ajax.php",
            success: function(a) {
                $('#contenido').html(a);
            }
        });
    });    


$('#tabla_mapuche').click(function() {
         $('#p_base').removeClass("active");
        $('#tabla_mapuche').addClass("active");
        var ajax_data = {
            "id": "p_tabla-mapuche"
        };
        $.ajax({
            data: ajax_data,
            type: "POST",
            url: "funciones/funciones_ajax.php",
            success: function(a) {
                $('#contenido').html(a);
            }
        });
    }); 


$('#tabla_mapuche2').click(function() {
         $('#p_base').removeClass("active");
        $('#tabla_mapuche2').addClass("active");
        var ajax_data = {
            "id": "p_tabla-mapuche2"
        };
        $.ajax({
            data: ajax_data,
            type: "POST",
            url: "funciones/funciones_ajax.php",
            success: function(a) {
                $('#contenido').html(a);
            }
        });
    }); 

});

$(function () {
        $('#container').highcharts({
            
            data: {
                table: 'datatable'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Alumnos por Titulos'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Cantidad de Alumnos'
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                            this.point.y + ' alumnos en ' + this.point.name.toLowerCase();
                }
            }
        });
    });
    
    
  $(function () {
      
        $('#container4').highcharts({
            
            data: {
                table: 'datatable2'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Alumnos por Titulos'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Cantidad de Alumnos'
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                            this.point.y + ' alumnos en ' + this.point.name.toLowerCase();
                }
            }
        });
    });  
    
  $(function () {
      
        $('#container6').highcharts({
            
            data: {
                table: 'datatable3'
            },
            chart: {
                type: 'column'
            },
            title: {
                text: 'Personal en Cargos por Tipos de escalafon (Febrero 2015)'
            },
            yAxis: {
                allowDecimals: false,
                title: {
                    text: 'Cantidad '
                }
            },
            tooltip: {
                formatter: function () {
                    return '<b>' + this.series.name + '</b><br/>' +
                            this.point.y + ' personal en ' + this.point.name.toLowerCase();
                }
            }
        });
    });  