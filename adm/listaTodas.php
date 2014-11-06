<?php
    require_once("../config.php");       
    $obj  =new NOTICIAS_NEGOC();
    $retorno=array();
    
?>
<div class="container">
    <div class="panel panel-danger">
        <div class="panel-heading">
            
            <form action=""
                  method="post">
                <button type="submit"
                        class="btn btn-default">
                    <span class="glyphicon glyphicon-plus"></span> Nova Notícia
                </button>
                <input type="hidden"
                       name="create"
                       value="true" />
            </form>
            <h4><span class="glyphicon glyphicon-list-alt"></span> Notícias Cadastradas</h4>
        </div>
        <div class="panel-body">
            <ul class="list-group">
                <?php
                    $retorno = $obj->ListarPaginado();                    
                    foreach($retorno as $key => $value){
                ?>
                <li class="list-group-item"
                    style="margin-bottom: 15px; float: left; width: 100%;">
                    <div class="contanier"
                         style="width: 75%; float: left;">
                        <h4><?php echo strip_tags($value['titulo'], '<p><h>'); ?></h4>
                        <?php echo $value["previa"];?>
                    </div>
                    <div class="btn-group"
                         style="text-align: right; width: 15%; float: right;">
                        <form action="?editar=true"
                              method="post">
                            <button type="submit"
                                    class="btn btn-warning">
                                <span class="glyphicon glyphicon-pencil"></span> editar
                            </button>
                            <input type="hidden"
                                   name="edit"
                                   value="true" />
                            <input type="hidden"
                                   name="noticiaSelecionada"
                                   value="<?php echo $value['id_noticia']?>" />
                        </form>
                        <br />
                        <form action="?remover=true"
                              method="post">
                            <button type="submit"
                                    class="btn btn-danger">
                                <span class="glyphicon glyphicon-trash"></span> remover
                            </button>
                            <input type="hidden"
                                   name="remove"
                                   value="true" />
                            <input type="hidden"
                                   name="noticiaSelecionada"
                                   value="<?php echo $value['id_noticia']?>" />
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
