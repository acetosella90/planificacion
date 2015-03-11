$(document).ready(function() {
    $('#p_base').click(function() {
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
});