<?php

class Conexion extends PDO {

    private $tipo_de_base = 'mysql';
    private $host = 'localhost';
    private $nombre_de_base = '';
    private $usuario = 'root';
    private $contrasena = 'root';

    public function __construct() {
        //Sobreescribo el método constructor de la clase PDO.
        try {
            parent::__construct($this->tipo_de_base . ':host=' . $this->host . ';dbname=' . $this->nombre_de_base, $this->usuario, $this->contrasena);
        } catch (PDOException $e) {
            echo 'Ha surgido un error y no se puede conectar a la base de datos. Detalle: ' . $e->getMessage();
            exit;
        }
    }

}

$conexion = new Conexion();

$sql = "select *
        from sigeva.ft_pc_articulos inner join sigeva.pais on 
        ft_pc_articulos.pais_edicion_id = pais.id
        where sigeva.pais.CODIGO_ISO2 = '$_POST[id]'
        group by 1;";

$consulta = $conexion->prepare($sql); 
$consulta->execute();
$todo = $consulta->fetchAll();

echo "<h3>Ingestigaciónes</h3>";

foreach ($todo as $t){
    echo $t[titulo]."<br>";
    echo $t[publicado]."<br>";
    echo $t[lugar_educion]."<br>";
    echo $t[editorial]."<hr>";
}


?>
