<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" >
    <h1 class="page-header">Mapa Interactivo de la Universidad Nacional San Martin</h1>
    <?php include_once '../files/MapaUnsam.svg'; ?>
    <div  id="contenido_"></div>
   <div  id='torna' class="popover-example" style='display: none;'> <!-- NEW -->
        <div class="popover top">
            <div class="arrow"></div>
            <h3 class="popover-title">Cuadro</h3>
            <div class="popover-content">
                <p>Este es el famoso Tornavias.</p>
            </div>
        </div>
    </div>
</div>
<style>
    .popover-example .popover {
  position: relative;
  display: block;
  margin: 20px;
  margin-top: -350px;
  
 
}
</style>
<script>
    $(document).ready(function () {
        $("#Tornavias").hover(function () {
            $("#torna").toggle();
        });
 
        $("#Auditorio_x5F_Carpa").click(function () {
            $("#contenido_").html("ESTE ES LA CARPA");
        });
    });
</script>


