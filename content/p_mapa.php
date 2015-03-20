<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" >
    <div class="row">
        <div class="col-xs-18 col-md-12" >
            <h1 class="page-header">Mapa Interactivo de la Universidad Nacional San Martin</h1>
            <div style="margin-left: -200px;"><?php include_once '../files/MapaUnsam.svg'; ?></div>
        </div>
    </div>
    <div class="row" id="cont" style="display: none;">
        <div class="col-xs-18 col-md-6" >
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

    });
</script>


