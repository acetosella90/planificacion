<?php

require '../class/Conexion.php';

$conexion = new Conexion();

$sql = "
       select date (ft.fecha_creacion_id) as Fecha,
        ft.revista,ft.editorial,ft.lugar_edicion,ft.publicado,
        ft.titulo,ft.resumen,
        case when ft.volumen is null then 'N/C'
        else ft.volumen end as volumen,

        pe.apellido_nombre, 
        pe.email, 
        pa.PAIS, i.idioma,
        au.autores,
        dim_campo_disciplinar_2.campo_disciplinar sub_disc,
        dim_campo_disciplinar_1.campo_disciplinar



        from sigeva.ft_pc_articulos ft inner join sigeva.dim_persona pe on
        ft.persona_id = pe.id

        inner join sigeva.pais pa on 
        ft.pais_edicion_id = pa.id

        inner join sigeva.dim_idioma i on
        ft.idioma_id = i.idioma_id

        left join sigeva.dim_orga_autores_art au on
        ft.autores_orga_id = au.id

        inner join sigeva.dim_campo_disciplinar dim_campo_disciplinar_1 on
        ft.campo_disciplinar_id = dim_campo_disciplinar_1.id
        inner join sigeva.dim_campo_disciplinar dim_campo_disciplinar_2 on
        dim_campo_disciplinar_1.padre_id = dim_campo_disciplinar_2.id



        where pa.CODIGO_ISO2 = '$_POST[id]'
        group by 1,2,3,4,5,6,7,8,9,10,11,12";


$consulta = $conexion->prepare($sql);
$consulta->execute();
$todo = $consulta->fetchAll();

foreach ($todo as $t) {
    echo "<br><div class='row' style='border: 1px solid #CCCCCC; background-color: #F5F5F5; width:80%; padding: 12px; margin-left:1px;'>";
    echo "<div class='col-md-8' >";
    echo "<h4><strong>" . utf8_encode($t[apellido_nombre]) . "</strong></h4>";
    echo utf8_encode($t[titulo]) . "<br><br>";
    echo "</div>";
    echo "<div class='col-md-12' style='border-bottom: 2px solid #428BCA'></div>";
    echo "<div class='col-md-8' style='margin-top: 2%;'>";
    echo utf8_encode($t[resumen]) . "<br>";
    echo "</div>";
    echo "<div class='col-md-4' style='margin-top: 1.3%;'>";
    echo "<h4><strong><span style='color: #428BCA'>Información</span></strong></h4>";
    echo "<h5><strong>Pais de publicación: </strong>". utf8_encode($t[PAIS])."</h5>";
    echo "<h5><strong>Disciplina: </strong>". utf8_encode($t[sub_disc])."</h5>";
    echo "<h5><strong>Subdisciplina: </strong>". utf8_encode($t[campo_disciplinar])."</h5>";
    echo "<h5><strong>Revista: </strong>". utf8_encode($t[revista])."</h5>";
    echo "<h5><strong>Editorial: </strong>". utf8_encode($t[editorial])."</h5>";
    echo "<h5><strong>Contacto: </strong><a href='mailto:" . utf8_encode($t[email]) . "?Subject=Unsam' target='_top'>". utf8_encode($t[email]) ."</a></h5>";
    echo "</div>";
    echo "</div>";
}
?>
