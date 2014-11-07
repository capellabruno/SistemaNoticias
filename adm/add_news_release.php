<?php
     require_once ('../config.php');
    
     $objDomain = new NOTICIA();
     $obj = new NOTICIAS_NEGOC();
    
     echo "<pre>";
     print_r($_POST);
     echo "</pre>";

     $error="";

     $titulo="";
     $previa ="";
     $autor="";
     $url_fonte="";
     $descricao_completa="";
    
     $titulo = $_POST['txtTitulo'];
     $previa = $_POST['txtPrevia'];
     $autor = $_POST['txtAutor'];
     $url_fonte =$_POST['txtFonte'];
     $descricao_completa = $_POST['txtDescricao'];
    
    $objDomain->titulo=$titulo;
    $objDomain->previa=$previa;
    $objDomain->autor= $autor;
    $objDomain->fonte_url = $url_fonte;
    $objDomain->descricao_completa =$descricao_completa;
    $objDomain->views=0;
    
    if (empty($objDomain->titulo)){
        $error .= "<li>Título da notícia deve ser informado</li>";
    }
    
    if(empty($objDomain->descricao_completa)){
        $error .= "<li>Descrição da notícia deve ser informada</li>";
    }
    
    if(empty($objDomain->autor)){
        $error .= "<li>Autor não foi informado</li>";
    }
    
    if(empty($objDomain->previa)){
        $error .= "<li>Prévia da noticia não foi informada</li>";
    }
    
    if (!empty($error)){
        $_SESSION["_erro_validacao"] = "<ul>" . $error . "</ul>";
    }elseif($obj->Inserir($objDomain)>0){   
        $_SESSION['insertText']  ="Notícia incluída com sucesso";
?>

<?php
    }else{
        $_SESSION['insertText']  ="Não foi possivel inserir a notícia";
    }
?>
<script>
    window.onload = function ()
    {
        document.forms[0].submit();
    }
</script>
<form action="GerenciarNoticia.php" target="_self" method="post">
     <input type="hidden" name="create" value="true" />
</form>
