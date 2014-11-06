<?php
   $classActive ="class='active'";
        
?>
<nav class="navbar navbar-inverse"
     role="navigation">
    <div class="container-fluid">
        <div class="collapse navbar-collapse"
             id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?php echo ((empty($myURLActual) || $myURLActual=="index.php") ? $classActive : ""); ?>><a href="../adm"><span class="glyphicon glyphicon-home"></span> Inicial</a></li>
                <li <?php echo ((stristr($myURLActual,"GerenciarNoticia")!= "") ? $classActive : ""); ?>><a href="../adm/GerenciarNoticia.php"><span class="glyphicon glyphicon-book"></span> Gerenciar Notícia</a></li>
                <li><a href="../index.php" target="_blank"><span class="glyphicon glyphicon-globe"></span> Ver Index</a></li>
                <li><a href="../adm/logout.php"><span class="glyphicon glyphicon-off"></span> Sair</a></li>
            </ul>
        </div>
    </div>
</nav>