<?php

/*
  
  class conect in your database
  define var in project. 
  no depedence for this class.
  
*/

DEFINE ("DB_CONNECTION", "DATABASE_NAME");
DEFINE ("DB_HOST", "DATABASE_HOST");
DEFINE ("DB_USERNAME", "USER_NAME");
DEFINE ("DB_PASSWORD", "PASSWORD");

abstract class CLASS_CONNECTION{

  private $connection=null;

  function OpenConnection($useMysqli =false){
    if(empry(DB_CONNECTION)){
      die ("Erro: No exists database info");
    }
    
    if($useMysqli){
      $connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_CONNECTION);
    }else{
        $connection = mysql_connect(DB_HOST, DB_USERNAME, DB_PASSWORD);
    }

      if(!$connection){
        die("connect database fail. login is not possible");
      }
      
      mysql_selected_db(DB_CONNECTION, $connection);
  }


}

?>
