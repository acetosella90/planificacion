<?php
session_start();

echo $_SESSION['usuario'];
if ($_SESSION['usuario'] == "rutita" && $_SESSION['pass'] == "cadabra") {
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>

            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">
            <link rel="icon" href="../../favicon.ico">
            <link rel="icon" href="css/Hover-master/scss/effects/icons/_icon-back.scss" media="all">
            <title>Panel Principal</title>
            <!-- Bootstrap core CSS3 -->
            <link href="css/Hover-master/scss/effects/icons/_icon-back.scss" rel="icon" media="all">
            <link href="css/Hover-master/css/hover.css" rel="stylesheet" media="all">
            <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" media="all">
            <link href="css/Hover-master/css/hover.css" rel="stylesheet">
            <link href="css/Hover-master/css/hover-min.css" rel="stylesheet">
            <!-- Bootstrap core CSS -->
            <link href="css/bootstrap.min.css" rel="stylesheet">

            <script src="js/jquery.min.js"></script>
            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
            <script src="test/js/highcharts.js"></script>
            <script src="test/js/modules/data.js"></script>
            <script src="test/js/modules/exporting.js"></script>
            <script src="test/js/highcharts-3d.js"></script>

            <!-- Custom styles for this template -->
            <link href="css/dashboard.css" rel="stylesheet">
            <link href="css/cosas.css" rel="stylesheet">
            <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
            <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
            <script src="js/ie-emulation-modes-warning.js"></script>

            <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
            <!--[if lt IE 9]>
              <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
              <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
            <![endif]-->
        </head>
        <body>
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Menu de Navegación</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                            <img style="margin-top: -15px; height: 50px;" src="img/logo-unsam.png">
                        </a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Configuración</a></li>
                            <li><a href="#">Perfil</a></li>
                            <li><a href="#">Ayuda</a></li>
                            <li><a href="logout.php">Salir</a></li>
                        </ul>
                        <form class="navbar-form navbar-right">
                            <input type="text" class="form-control" placeholder="Buscar...">
                        </form>
                    </div>
                </div>
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div  class="col-sm-3 col-md-1 sidebar">
                        <ul id="div" class="nav nav-sidebar">
                            <li id="p_mapa" class="active"><a href="#">Mapas <span class="sr-only">(current)</span></a></li>
                            <li id="p_base"><a href="#">Cubos</a></li>
                            <li><a href="#">Analisis</a></li>
                            <li><a href="#">Exportar</a></li>
                            <li><a href="#">Reportes</a></li>
                        </ul>
                        <ul class="nav nav-sidebar">
                            <li><a href="#">Historia</a></li>
                            <li><a href="#">Ir a Unsam</a></li>
                            <li><a href="#">Contactenos</a></li>
                        </ul>
                    </div>

                    <div id="contenido"><!-- CONTENIDO -->
                        <?php
                        if ($_GET[pagina] == 'araucano')
                            include './content/p_tabla-araucano.php';
                        ?>
                    </div>

                </div>

                <!-- Bootstrap core JavaScript
                ================================================== -->
                <!-- Placed at the end of the document so the pages load faster -->

                <script src="js/bootstrap.min.js"></script>
                <script src="js/doc.min.js"></script>

                <script src='js/botones.js'></script>
                <script src='js/funciones.js'></script>

        </body>
    </html>
    <?php
} else {
    header('Location: login.php');
}
?>