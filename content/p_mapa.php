<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main" >
     <h1 class="page-header" style="border-bottom: 2px solid #428BCA;">Mapa Interactivo de la Universidad Nacional San Martin</h1>
    <div class="row" style="margin-left: 0px;" >
        <h4><span class="glyphicon glyphicon-circle-arrow-down"> <strong>Filtros</strong></span></h4>

        <div  style="text-align: right;float: left; margin-left: 45px;">
            <div id="p1"> Alumnos <input name="check_base1" value="araucano" id="araucano_chk" type="checkbox"></div>
            <div  id="p2">  Presupuesto <input name="check_base2" value="pilaga" id="pilaga_chk"type="checkbox"></div>
            <div  id="p3">  Personal <input name="check_base3" value="mapuche" id="mapuche_chk" type="checkbox"></div>
            <div id="p4"> Investigación <input name="check_base4" value="sigeva" id="sigeva_chk"type="checkbox"></div>

        </div>
    </div><br>
    <div style="position: absolute; z-index: 999" >
        <h4><span class="glyphicon glyphicon-circle-arrow-down"> <strong>Edificios fuera del campus</strong></span></h4>
        <ul style="list-style:none;">
            <li id="economia" style="cursor: pointer;" ><div class="glyphicon glyphicon-home" style="color:#3D89BB;"></div> ESCUELA DE ECONOMÍA Y NEGOCIOS</li>
            <li id="industrial" style="cursor: pointer;" ><div class="glyphicon glyphicon-home" style="color:#3D89BB;"></div> INSTITUTO DE CALIDAD INDUSTRIAL (INCALIN)</li>
            <li id="tecnologia" style="cursor: pointer;" ><div class="glyphicon glyphicon-home" style="color:#3D89BB;"></div> INSTITUTO DE TECNOLOGÍA "PROF. JORGE A. SABATO"</li>
            <li id="nuclear" style="cursor: pointer;" ><div class="glyphicon glyphicon-home" style="color:#3D89BB;"></div> INSTITUTO DE TECNOLOGÍA NUCLEAR DAN BENINSON</li>
        </ul>
    </div>

    <div class="row" >
        <div class="col-xs-18 col-md-12" >  


            <div  style="margin-left: -30px; margin-top: 35px;" ><?php include_once '../files/MapaUnsam.svg'; ?></div>
        </div>
    </div>
    <div class="row" id="cont" style="display: none;">
        <div class="col-xs-18 col-md-12" >
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
                "escuela": 1
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
                "escuela": 2
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
                "escuela": 3
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
                "escuela": 4
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
        $("#IIB_B").css("cursor", "pointer");
        $("#IIB_B").mouseover(function () {
            $("#rectangulo_IIB").show();
            $("#texto_IIB").show();
        });
        $("#IIB_B").mouseout(function () {
            $("#rectangulo_IIB").hide();
            $("#texto_IIB").hide();
        });
        $("#IIB_B").click(function () {
            var check = new Array();
            var i = 0;
            $("input:checkbox:checked").each(function () {
                check[i] = $(this).val();
                i++;
            });
            $("#cont").show();
            $("#edif_nombre").html('Instituto de Investigaciones Biotecnológicas');

            var ajax_data = {
                "id": check,
                "escuela": 5
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
        $("#Actividades_Centrales").css("cursor", "pointer");
        $("#Actividades_Centrales").mouseover(function () {
            $("#rectangulo_Actividades_Centrales").show();
            $("#texto_Actividades_Centrales").show();
        });
        $("#Actividades_Centrales").mouseout(function () {
            $("#rectangulo_Actividades_Centrales").hide();
            $("#texto_Actividades_Centrales").hide();
        });
        $("#Actividades_Centrales").click(function () {
            var check = new Array();
            var i = 0;
            $("input:checkbox:checked").each(function () {
                check[i] = $(this).val();
                i++;
            });
            $("#cont").show();
            $("#edif_nombre").html('Actividades Centrales');

            var ajax_data = {
                "id": check,
                "escuela": 6
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
        $("#Arte").css("cursor", "pointer");
        $("#Arte").mouseover(function () {
            $("#rectangulo_Arte").show();
            $("#texto_Arte").show();
        });
        $("#Arte").mouseout(function () {
            $("#rectangulo_Arte").hide();
            $("#texto_Arte").hide();
        });
        $("#Arte").click(function () {
            var check = new Array();
            var i = 0;
            $("input:checkbox:checked").each(function () {
                check[i] = $(this).val();
                i++;
            });
            $("#cont").show();
            $("#edif_nombre").html('Instituto de las Artes Mauricio Kagel');

            var ajax_data = {
                "id": check,
                "escuela": 7
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
        $("#Rehabilitacion").css("cursor", "pointer");
        $("#Rehabilitacion").mouseover(function () {
            $("#rectangulo_Rehabilitacion").show();
            $("#texto_Rehabilitacion").show();
        });
        $("#Rehabilitacion").mouseout(function () {
            $("#rectangulo_Rehabilitacion").hide();
            $("#texto_Rehabilitacion").hide();
        });
        $("#Rehabilitacion").click(function () {
            var check = new Array();
            var i = 0;
            $("input:checkbox:checked").each(function () {
                check[i] = $(this).val();
                i++;
            });
            $("#cont").show();
            $("#edif_nombre").html('Instituto de Ciencias de la Rehabilitación y el Movimiento');

            var ajax_data = {
                "id": check,
                "escuela": 8
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
        $("#Politica").css("cursor", "pointer");
        $("#Politica").mouseover(function () {
            $("#rectangulo_Politica").show();
            $("#texto_Politica").show();
        });
        $("#Politica").mouseout(function () {
            $("#rectangulo_Politica").hide();
            $("#texto_Politica").hide();
        });
        $("#Politica").click(function () {
            var check = new Array();
            var i = 0;
            $("input:checkbox:checked").each(function () {
                check[i] = $(this).val();
                i++;
            });
            $("#cont").show();
            $("#edif_nombre").html('Escuela de Política y Gobierno');

            var ajax_data = {
                "id": check,
                "escuela": 9
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
        $("#Sociales").css("cursor", "pointer");
        $("#Sociales").mouseover(function () {
            $("#rectangulo_Sociales").show();
            $("#texto_Sociales").show();
        });
        $("#Sociales").mouseout(function () {
            $("#rectangulo_Sociales").hide();
            $("#texto_Sociales").hide();
        });
        $("#Sociales").click(function () {
            var check = new Array();
            var i = 0;
            $("input:checkbox:checked").each(function () {
                check[i] = $(this).val();
                i++;
            });
            $("#cont").show();
            $("#edif_nombre").html('Instituto de Altos Estudios Sociales');

            var ajax_data = {
                "id": check,
                "escuela": 10
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
        $("#Investigacion").css("cursor", "pointer");
        $("#Investigacion").mouseover(function () {
            $("#rectangulo_Investigacion").show();
            $("#texto_Investigacion").show();
        });
        $("#Investigacion").mouseout(function () {
            $("#rectangulo_Investigacion").hide();
            $("#texto_Investigacion").hide();
        });
        $("#Investigacion").click(function () {
            var check = new Array();
            var i = 0;
            $("input:checkbox:checked").each(function () {
                check[i] = $(this).val();
                i++;
            });
            $("#cont").show();
            $("#edif_nombre").html('Instituto de Investigaciones Sobre el Patrimonio Cultural');

            var ajax_data = {
                "id": check,
                "escuela": 11
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
        $("#economia").click(function () {
            var check = new Array();
            var i = 0;
            $("input:checkbox:checked").each(function () {
                check[i] = $(this).val();
                i++;
            });
            $("#cont").show();
            $("#edif_nombre").html('Escuela de Economía y Negocios');

            var ajax_data = {
                "id": check,
                "escuela": 12
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
        $("#industrial").click(function () {
            var check = new Array();
            var i = 0;
            $("input:checkbox:checked").each(function () {
                check[i] = $(this).val();
                i++;
            });
            $("#cont").show();
            $("#edif_nombre").html('Instituto de Calidad Industrial');

            var ajax_data = {
                "id": check,
                "escuela": 13
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
        $("#tecnologia").click(function () {
            var check = new Array();
            var i = 0;
            $("input:checkbox:checked").each(function () {
                check[i] = $(this).val();
                i++;
            });
            $("#cont").show();
            $("#edif_nombre").html('Instituto de Tecnología "PROF. JORGE A. SABATO"');

            var ajax_data = {
                "id": check,
                "escuela": 14
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
        $("#nuclear").click(function () {
            var check = new Array();
            var i = 0;
            $("input:checkbox:checked").each(function () {
                check[i] = $(this).val();
                i++;
            });
            $("#cont").show();
            $("#edif_nombre").html('Instituto de Tecnología Nuclear Dan Beninson');

            var ajax_data = {
                "id": check,
                "escuela": 15
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


