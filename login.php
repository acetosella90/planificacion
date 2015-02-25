<?php
//session_destroy();
session_start();

if ($_POST['usuario'] == "rutita" && $_POST['pass'] == "cadabra") {
    $_SESSION['usuario'] = $_POST['usuario'];
    $_SESSION['pass'] = $_POST['pass'];
    header('Location: index.php');
}
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

        <title>Inicio de Sesion - Pentaho Visual</title>

        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/signin.css" rel="stylesheet">

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
        <div style="float: right; margin-right: 2%; margin-top: -2%;">
            <img src="img/logo-pentaho.png" height="30">
        </div>
        <div class="container">
            <div style="width: 25%; margin: 0 auto;">
                <img src="img/logo-unsam.jpg" height="130">
            </div>
            <form class="form-signin" method="post" action="#">
                <h2 class="form-signin-heading">Inicio de Sesion </h2>
                <label for="inputEmail" class="sr-only">Usuario</label>
                <input type="text" id="inputEmail" class="form-control" placeholder="Usuario" name="usuario" required autofocus>
                <label for="inputPassword" class="sr-only">Contraseña</label>
                <input type="password" id="inputPassword" class="form-control" name="pass" placeholder="Password" required>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> Recordarme
                    </label>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
            </form>
        </div> <!-- /container -->
        <div style="text-align: center">Desarrollado por la Universidad Nacional de San Martin - Secretaria de Planificacion</div>

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <script src="js/ie10-viewport-bug-workaround.js"></script>
    </body>
</html>
