<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-1 main" >
    <h1 class="page-header" style="text-shadow: -5px -5px 5px #aaa;">Mapa Interactivo de la Universidad Nacional San Martin</h1>
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
        $("#Tornavias").click(function () {
            $("#cont").show();
            $("#edif_nombre").html('Tornavias');
            $("#edif_contenido").html('Tornavias 1 <br> Tormavoas2 <br> Tormavias3');
        });

        $("#_x33_IA").click(function () {
            $("#cont").show();
            $("#edif_nombre").html('3IA');
            $("#edif_contenido").html('3IA 1 <br> 3IA 2 <br> 3IA 3');
        });

        $("#circulo_tornavias1").css("cursor", "pointer");
        $("#circulo_tornavias1").mouseover(function () {
            $("#rectangulo_tornavias1").show();
            $("#texto_tornavias1").show();
        });
        $("#circulo_tornavias1").mouseout(function () {
            $("#rectangulo_tornavias1").hide();
            $("#texto_tornavias1").hide();
        });
        $("#circulo_tornavias1").click(function () {
            $("#cont").show();
            $("#edif_nombre").html('Tornavias - Sexta Etapa');
            $("#edif_contenido").html('<strong>Subsuelo:</strong> Escuela de Arte/Alulas 6.2/6.3/6.12/6.13/Sistemas y Soporte Técnico<br><strong>1° Piso:</strong> Aulas 6.6/6.7/6.8/6.9/6.10/6.11/6.14 <br> <strong>2° Piso:</strong> Mantenimiento/ITF/Oficina de Planificación/Investigadores/Sala de Reuniones/Obra social Unsam/SEPTESA<br> ');
        });

    });
</script>


