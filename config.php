<?php
  /*
    Config application 
    defines the physical and web sites
    include files
  */
  
  DEFINE("LOCALPHYSICAL",$_SERVER["DOCUMENT_ROOT"]);
  DEFINE("MYHOST", $_SERVER["HTTP_HOST"]);
  DEFINE("MYHOSTACTUAL", $_SERVER["REQUEST_URI"]);
  DEFINE("URLREFER", $_SERVER["HTTP_REFERER"]);
  DEFINE("REQUESTHTTPS", $_SERVER["HTTPS"]);
  DEFINE("MYSELF", $_SERVER["PHP_SELF"]);
  
  require_once("./class_connection.php");
  
  /*
    settings to use the SMART
  */  
  
  
  /*
    end
  */
  
  
?>
