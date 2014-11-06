<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
    
    header("Cache-Control: no-cache, must-revalidate");
    header ('Content-type: text/html; charset=UTF-8');
    
    define("LOCALPHYSICAL",$_SERVER["DOCUMENT_ROOT"]);
    define("MYHOST", $_SERVER["HTTP_HOST"]);
    define("MYHOSTACTUAL", $_SERVER["REQUEST_URI"]);
    define("REQUESTHTTPS", $_SERVER["HTTPS"]);
    define("MYSELF", $_SERVER["PHP_SELF"]);
    
    require_once("config/class_connection.php");
    
    require_once("domain/Noticia.php");
    require_once("lib/Class_Noticias.php");
    
    $explode = explode("/", MYHOSTACTUAL);
    $myURLActual = $explode[count($explode)-1];
    
?>
