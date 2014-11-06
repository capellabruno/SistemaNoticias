<?php
  include_once '../config.php';
  
  $objDomain = new NOTICIA();
  $obj = new NOTICIAS_NEGOC();
  
  $titulo="";
  $previa ="";
  $autor="";
  $url_fonte="";
  $descricao_completa="";
  
  
  $titulo = url_encode($_POST['txtTitulo']);
  $previa = url_encode($_POST['txtPrevia']);
  $autor = url_encode($_POST['txtAutor']);
  $url_fonte =url_encode($_POST['txtFonte']);
  $descricao_completa = $_POST['txtDescricao'];

 $objDomain->titulo=$titulo;
 $objDomain->previa=$previa;
 $objDomain->Autor= $autor;
 $objDomain->Fonte_url = $url_fonte;
 $objDomain->Descricao =$descricao_completa;
 $objDomain->Views=0;
 
 if($obj->Incluir($objDomain)>0){
     
 }
?>

