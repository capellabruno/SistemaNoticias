<?php
    
    $label_button ="Incluir";
    $url ="add_news_release.php";
    $url_update ="update_news_release.php";
    $ehUpdate=false; 
    
    $dadospage=array();
    
    $id_noticia="";
    $titulo="";
    $autor="";
    $url_noticia="";
    $descricao="";
    $previa="";
    $fonte="";  
    $obj = NULL;
    
    unset($dadospage);
    
    if(isset($_POST['edit'])){
        $ehUpdate =true;
        $label_button="Alterar";
    
        //capturar a noticia;
        $obj = new NOTICIAS_NEGOC();
        $id_noticia = $_POST["noticiaSelecionada"];
    
        $dadospage =$obj->BuscarPorId($id_noticia);
    
        $titulo = $dadospage[0]['titulo'];
        $autor = $dadospage[0]['autor'];
        $previa = $dadospage[0]['previa'];
        $descricao = $dadospage[0]['descricao_completa'];
        $fonte = $dadospage[0]['fonte_url'];
    }
?>
<div class="container">
    <div class="row">
        <form action="<?php echo ((!$ehUpdate) ? $url : $url_update);?>"
              role="form"
              class="form-horizontal"
              method="post">
            <?php
                if(isset($_SESSION["_erro_validacao"]) && !empty($_SESSION["_erro_validacao"])){
            ?>
            <div class="alert alert-danger"><?php echo $_SESSION["_erro_validacao"]; ?></div>
            <?php
                
                }
                
                if(isset($_SESSION["insertText"]) && !empty($_SESSION["insertText"])){
            ?>
            <div class="alert alert-info"><?php echo $_SESSION["insertText"]; ?></div>
            <?php
                }
            ?>
            <input type="hidden" name="noticiaSelecionada" id="noticiaSelecionada" value="<?php echo $id_noticia?>" />
            <div class="form-group">
                <label class="col-sm-2 control-label"
                       for="txtTitulo">Título</label>
                <div class="col-sm-10">
                    <input type="text"
                           class="form-control"
                           id="txtTitutlo"
                           name="txtTitulo"
                           placeholder="Título da notícia"
                           value="<?php echo $titulo; ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"
                       for="txtPrevia">Prévia da notícia</label>
                <div class="col-sm-10">
                    <textarea class="form-control"
                              id="txtPrevia"
                              name="txtPrevia">
                        <?php echo $previa; ?>
                    </textarea>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"
                       for="txtAutor">Autor</label>
                <div class="col-sm-10">
                    <input type="text"
                           class="form-control"
                           id="txtAutor"
                           name="txtAutor"
                           placeholder="Autor da notícia"
                           value="<?php echo $autor; ?>" />
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-2 control-label"
                       for="txtFonte">Fonte da notícia</label>
                <div class="col-sm-10">
                    <input type="url"
                           class="form-control"
                           id="txtFonte"
                           name="txtFonte"
                           placeholder="Fonte da notícia"
                           value="<?php echo $fonte; ?>" />
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label"
                       for="txtDescricao">Descrição Completa</label>
                <div class="col-sm-10">
                    <textarea class="form-control"
                              id="txtDescricao"
                              name="txtDescricao"
                              rows="15"
                              placeholder="Descrição completa da notícia">
                        <?php echo trim($descricao); ?>
                    </textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button id="btn_send_noticia"
                            type="submit"
                            class="btn btn-default">
                        <span class="glyphicon glyphicon-floppy-saved"></span>
                        <?php echo $label_button; ?>
                    </button>
                    <button id="btn_reset_noticia"
                            type="reset"
                            class="btn btn-default">
                        <span class="glyphicon glyphicon-floppy-remove"></span>
                        Limpar</button>
                </div>
            </div>
        </form>
    </div>
</div>

<script src="//cdn.ckeditor.com/4.4.5.1/full/ckeditor.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('txtPrevia');   
</script>
<script type="text/javascript">
    CKEDITOR.replace('txtDescricao');   
</script>

<?php
  $_SESSION['insertText']="";
  $_SESSION["_erro_validacao"]="";    
?>