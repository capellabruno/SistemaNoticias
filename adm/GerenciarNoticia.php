<?php
    require_once('../config.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport"
              content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">

        <title>Sistema de Notícias</title>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet"
              href="https://cdn.jsdelivr.net/bootstrap/3.3.0/css/bootstrap.min.css" />

        <!-- Optional theme -->
        <link rel="stylesheet"
              href="https://cdn.jsdelivr.net/bootstrap/3.3.0/css/bootstrap-theme.min.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://cdn.jsdelivr.net/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </head>
    <body>
        <?php
            
            require_once('header.php');
        ?>
        <?php
            if(isset($_POST['edit'])){
                require_once("editar.php");
            }elseif(isset($_POST['remove'])){
                require_once('remover.php');
            }elseif(isset($_POST['create'])){
                require_once("editar.php");
            }else{
                require_once('listaTodas.php');
            }
        ?>
    </body>
</html>
