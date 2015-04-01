$(document).ready(function() {
    $('#p_base').click(function() {
        $('body').css("background-image","url()");
        $('#p_base').addClass("active");
        $('#p_mapa').removeClass("active");
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
    
    
    
    
