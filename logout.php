<?php 
session_start();
$_SESSION['usuario'] = NULL;
$_SESSION['pass']= NULL;
session_destroy();
 header('Location: login.php');
?>