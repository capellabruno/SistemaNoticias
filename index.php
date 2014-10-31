<?php
    
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    require_once("./config.php");   
    $obj  =new NOTICIAS_NEGOC();
    $retorno=array();
    
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
        <div class="container">
            <div class="panel panel-default"
                 style="width: 500px;">
                <div class="panel-heading">Ultimas Notícias</div>
                <div class="panel-body">
                    <ul class="list-group">
                        <?php
                            $retorno = $obj->ListarPaginado();
                            
                            foreach($retorno as $key => $value){
                        ?>
                        <li class="list-group-item"
                            style="margin-bottom: 15px;"><?php echo $value["previa"];?>
                            <br />
                            <div class="btn-group clear"
                                 style="clear: both; text-align: right;">
                                <form action="./view.php" method="get">
                                    <button type="submit"
                                            class="btn btn-info">
                                                ler mais+
                                    </button>
                                    <input type="hidden" name="noticiaSelecionada" value="<?php echo $value['id_noticia']?>" />
                                </form>
                            </div>
                        </li>
                        <?php
                            
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </div>
    </body>
</html>
