<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main" >
    <h1 class="page-header" style="text-shadow: -5px -5px 5px #aaa;">Mapa Interactivo de la Universidad Nacional San Martin</h1>
    <div class="row" style="margin-left: 0px;" >
        <h4><span class="glyphicon glyphicon-circle-arrow-down"> <strong>Filtros</strong></span></h4>
        <div class="col-xs-6 col-md-1" style="text-align: right">
            Araucano <input name="check_base1" value="araucano" id="araucano_chk" type="checkbox"><br>
            Pilaga <input name="check_base2" value="pilaga" id="pilaga_chk"type="checkbox"><br>
            Mapuche <input name="check_base3" value="mapuche" id="mapuche_chk" type="checkbox"><br>
            Sigeva <input name="check_base4" value="sigeva" id="sigeva_chk"type="checkbox">
        </div>
    </div><br>
    <div style="position: absolute; z-index: 9999999999" >
        <h4><span class="glyphicon glyphicon-circle-arrow-down"> <strong>Edificios fuera del campus</strong></span></h4>
        <ul style="list-style:none;">
            <li style="cursor: pointer;" ><div class="glyphicon glyphicon-home" style="color:#3D89BB;"></div> ESCUELA DE ECONOMÍA Y NEGOCIOS</li>
            <li style="cursor: pointer;" ><div class="glyphicon glyphicon-home" style="color:#3D89BB;"></div> INSTITUTO DE CALIDAD INDUSTRIAL (INCALIN)</li>
            <li style="cursor: pointer;" ><div class="glyphicon glyphicon-home" style="color:#3D89BB;"></div> INSTITUTO DE TECNOLOGÍA "PROF. JORGE A. SABATO"</li>
            <li style="cursor: pointer;" ><div class="glyphicon glyphicon-home" style="color:#3D89BB;"></div> INSTITUTO DE TECNOLOGÍA NUCLEAR DAN BENINSON</li>
        </ul>
    </div>

    <div class="row" >
        <div class="col-xs-18 col-md-12" >  
            <div style="margin-left: -60px;"><?php include_once '../files/MapaUnsam.svg'; ?></div>
        </div>
    </div>
    <div class="row" id="cont" style="display: none;">
        <div class="col-xs-18 col-md-10" >
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title" id="edif_nombre"></h3>
                </div>
                <div class="panel-body">
                    <div id="edif_contenido"></div>
                </div>

            </div>

        </div>
    </div>
</div>

<script>
    $(document).ready(function () {



        $("#Institulo_del_transporte").css("cursor", "pointer");
        $("#Institulo_del_transporte").mouseover(function () {
            $("#rectangulo_Institulo_del_transporte").show();
            $("#texto_Institulo_del_transporte").show();
        });
        $("#Institulo_del_transporte").mouseout(function () {
            $("#rectangulo_Institulo_del_transporte").hide();
            $("#texto_Institulo_del_transporte").hide();
        });
        $("#Institulo_del_transporte").click(function () {
            var check = new Array();
            var i = 0;
            $("input:checkbox:checked").each(function () {
                check[i] = $(this).val();
                i++;
            });
            $("#cont").show();
            $("#edif_nombre").html('Instituto del Transporte');

            var ajax_data = {
                "id": check,
                "escuela": "Instituto Tecnológico Ferroviario Scalabrini Ortiz"
            };
            $('#edif_contenido').html('<div class="col-xs-6 col-md-6"></div><div><img src="img/ajax-loader.gif"/></div>');
            $.ajax({
                data: ajax_data,
                type: "POST",
                url: "funciones/funciones_ajax_mapa.php",
                success: function (a) {
                    $('#edif_contenido').html(a);
                }
            });
        });

//********************************************************************************
        $("#Ciencia_tecnologia").css("cursor", "pointer");
        $("#Ciencia_tecnologia").mouseover(function () {
            $("#rectangulo_Ciencia_tecnologia").show();
            $("#texto_Ciencia_tecnologia").show();
        });
        $("#Ciencia_tecnologia").mouseout(function () {
            $("#rectangulo_Ciencia_tecnologia").hide();
            $("#texto_Ciencia_tecnologia").hide();
        });
        $("#Ciencia_tecnologia").click(function () {
            var check = new Array();
            var i = 0;
            $("input:checkbox:checked").each(function () {
                check[i] = $(this).val();
                i++;
            });
            $("#cont").show();
            $("#edif_nombre").html('Escuela de Ciencia y Tecnología');

            var ajax_data = {
                "id": check,
                "escuela": "Escuela de Ciencia y Tecnología"
            };
            $('#edif_contenido').html('<div class="col-xs-6 col-md-6"></div><div><img src="img/ajax-loader.gif"/></div>');
            $.ajax({
                data: ajax_data,
                type: "POST",
                url: "funciones/funciones_ajax_mapa.php",
                success: function (a) {
                    $('#edif_contenido').html(a);
                }
            });

            //$("#edif_contenido").html('<strong>Subsuelo:</strong> Escuela de Arte/Alulas 6.2/6.3/6.12/6.13/Sistemas y Soporte Técnico<br><strong>1° Piso:</strong> Aulas 6.6/6.7/6.8/6.9/6.10/6.11/6.14 <br> <strong>2° Piso:</strong> Mantenimiento/ITF/Oficina de Planificación/Investigadores/Sala de Reuniones/Obra social Unsam/SEPTESA<br> ');
        });
//********************************************************************************
        $("#Ciencia_tecnologia2").css("cursor", "pointer");
        $("#Ciencia_tecnologia2").mouseover(function () {
            $("#rectangulo_Ciencia_tecnologia2").show();
            $("#texto_Ciencia_tecnologia2").show();
        });
        $("#Ciencia_tecnologia2").mouseout(function () {
            $("#rectangulo_Ciencia_tecnologia2").hide();
            $("#texto_Ciencia_tecnologia2").hide();
        });
        $("#Ciencia_tecnologia2").click(function () {
            var check = new Array();
            var i = 0;
            $("input:checkbox:checked").each(function () {
                check[i] = $(this).val();
                i++;
            });
            $("#cont").show();
            $("#edif_nombre").html('Escuela de Humanidades');

            var ajax_data = {
                "id": check,
                "escuela": "Escuela de Humanidades%"
            };
            $('#edif_contenido').html('<div class="col-xs-6 col-md-6"></div><div><img src="img/ajax-loader.gif"/></div>');
            $.ajax({
                data: ajax_data,
                type: "POST",
                url: "funciones/funciones_ajax_mapa.php",
                success: function (a) {
                    $('#edif_contenido').html(a);
                }
            });

            //$("#edif_contenido").html('<strong>Subsuelo:</strong> Escuela de Arte/Alulas 6.2/6.3/6.12/6.13/Sistemas y Soporte Técnico<br><strong>1° Piso:</strong> Aulas 6.6/6.7/6.8/6.9/6.10/6.11/6.14 <br> <strong>2° Piso:</strong> Mantenimiento/ITF/Oficina de Planificación/Investigadores/Sala de Reuniones/Obra social Unsam/SEPTESA<br> ');
        });
//********************************************************************************
        $("#3IA").css("cursor", "pointer");
        $("#3IA").mouseover(function () {
            $("#rectangulo_3IA").show();
            $("#texto_3IA").show();
        });
        $("#3IA").mouseout(function () {
            $("#rectangulo_3IA").hide();
            $("#texto_3IA").hide();
        });
        $("#3IA").click(function () {
            var check = new Array();
            var i = 0;
            $("input:checkbox:checked").each(function () {
                check[i] = $(this).val();
                i++;
            });
            $("#cont").show();
            $("#edif_nombre").html('Instituto de Investigación e Ingeniería Ambiental');

            var ajax_data = {
                "id": check,
                "escuela": "Instituto de Investigación e Ingeniería Ambiental"
            };
            $('#edif_contenido').html('<div class="col-xs-6 col-md-6"></div><div><img src="img/ajax-loader.gif"/></div>');
            $.ajax({
                data: ajax_data,
                type: "POST",
                url: "funciones/funciones_ajax_mapa.php",
                success: function (a) {
                    $('#edif_contenido').html(a);
                }
            });

            //$("#edif_contenido").html('<strong>Subsuelo:</strong> Escuela de Arte/Alulas 6.2/6.3/6.12/6.13/Sistemas y Soporte Técnico<br><strong>1° Piso:</strong> Aulas 6.6/6.7/6.8/6.9/6.10/6.11/6.14 <br> <strong>2° Piso:</strong> Mantenimiento/ITF/Oficina de Planificación/Investigadores/Sala de Reuniones/Obra social Unsam/SEPTESA<br> ');
        });

    });
</script>


