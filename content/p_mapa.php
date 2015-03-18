<div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main" style="margin-left: 185px; margin-top: -180px;">
    <?php include_once '../files/MapaUnsam.svg'; ?>
    <div style="margin-left: 5px;" id="contenido_"></div>
</div>

<script>
$(document).ready(function (){
   $("#Tornavias").click(function (){
       $("#contenido_").html("ESTE ES EL TORNAVIAS");
   }); 
   $("#Auditorio_x5F_Carpa").click(function (){
       $("#contenido_").html("ESTE ES LA CARPA");
   }); 
});
</script>