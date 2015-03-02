<?php
session_start();

echo $_SESSION['usuario'];
if ($_SESSION['usuario'] == "rutita" && $_SESSION['pass'] == "cadabra") {
    ?>
    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="description" content="">
            <meta name="author" content="">
            <link rel="icon" href="../../favicon.ico">

            <title>Panel Principal</title>

            <!-- Bootstrap core CSS -->
            <link href="css/bootstrap.min.css" rel="stylesheet">

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
                    <div  class="col-sm-3 col-md-2 sidebar">
                        <ul class="nav nav-sidebar">
                            <li class="active"><a href="#">Overview <span class="sr-only">(current)</span></a></li>
                            <li><a href="#">Reports</a></li>
                            <li><a href="#">Analytics</a></li>
                            <li><a href="#">Export</a></li>
                        </ul>
                        <ul class="nav nav-sidebar">
                            <li><a href="">Nav item</a></li>
                            <li><a href="">Nav item again</a></li>
                            <li><a href="">One more nav</a></li>
                            <li><a href="">Another nav item</a></li>
                            <li><a href="">More navigation</a></li>
                        </ul>
                    </div>
                    <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
                        <h1 class="page-header">Unidades de analisis</h1>
                        <div class="row ">
                            <div id='mapuche' class="col-xs-6 col-sm-4  " >
                                <img  src= "img/siu-mapuche.gif" class="img-responsive" style="width: 200px; margin-bottom: 35px;">
                                <h4>Mapuche y Rhun</h4> 
                                <span class="text-muted">Personal Planta</span>
                            </div>
                            <div id="pilaga" class="col-xs-6 col-sm-4 " >
                                <img src="img/siu-pilaga.jpg"  class="img-responsive" style="width: 240px; margin-bottom: 30px;">
                                <h4>Pilaga</h4>
                                <span class="text-muted">Presupuestaria</span>
                            </div>
                            <div  id="araucano" class="col-xs-6 col-sm-4 ">
                                <img src="img/siu-guarani.jpg" class="img-responsive" style="width: 140px;"> 
                                <img src="img/siu-araucano.png" class="img-responsive" style="width: 1500px;"> 
                                <h4>Araucano y Guarani</h4>
                                <span class="text-muted">Academica alumnos</span>
                            </div>




                            <h2 class="sub-header">Section title</h2>
                            <div  id="tabla1" class="table-responsive tabla" style="display:none;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Reportes</th>
                                            <th>Descripcion</th>
                                            <th>Tipo de grafico</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>mapuche</td>
                                            <td>ipsum</td>
                                            <td>dolor</td>

                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>amet</td>
                                            <td>consectetur</td>
                                            <td>adipiscing</td>

                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Integer</td>
                                            <td>nec</td>
                                            <td>odio</td>

                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div id="tabla2" class="table-responsive" style="display:none;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Reportes</th>
                                            <th>Descripcion</th>
                                            <th>Tipo de grafico</th>
                                            <th>Header</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>pilaga</td>
                                            <td>ipsum</td>
                                            <td>dolor</td>
                                            <td>sit</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>amet</td>
                                            <td>consectetur</td>
                                            <td>adipiscing</td>
                                            <td>elit</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Integer</td>
                                            <td>nec</td>
                                            <td>odio</td>
                                            <td>Praesent</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div  id="tabla3" class="table-responsive" style="display:none;">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Reportes</th>
                                            <th>Descripcion</th>
                                            <th>Tipo de grafico</th>
                                            <th>Header</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>araucano y guarani</td>
                                            <td>ipsum</td>
                                            <td>dolor</td>
                                            <td>sit</td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>amet</td>
                                            <td>consectetur</td>
                                            <td>adipiscing</td>
                                            <td>elit</td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Integer</td>
                                            <td>nec</td>
                                            <td>odio</td>
                                            <td>Praesent</td>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Bootstrap core JavaScript
                ================================================== -->
                <!-- Placed at the end of the document so the pages load faster -->
                <script src="js/jquery.min.js"></script>
                <script src="js/bootstrap.min.js"></script>
                <script src="js/doc.min.js"></script>
                <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
                <script src='js/botones.js'></script>
        </body>
    </html>
    <?php
} else {
    header('Location: login.php');
}
?>