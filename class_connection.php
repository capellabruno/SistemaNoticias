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
  
  function CloseConnection($useMysqli=false){
    if($connection){
      if($useMysqli){
        mysqli_close($connection);
      }else{
        
        mysql_close($connection);
      }
    }
    
  }
  
  function ExecSelect($sqlQuery, $useMysqli=false){
    
    CLASS_CONNECTION::OpenConnection($useMysqli);
    
    $dados =null;
    $exec = null;
    
    unset($dados);
    
    if ($useMysqli){
      $exec = mysqli_query($connection, $sqlQuery);
      for($i=0;$i<mysqli_num_rows($exec);$i++){
          $row = mysqli_fetch_array($exec);
          foreach($row as $key =>$value)
            $dados[$i][$key] =$value;
      }
    }else{
      $exec = mysql_query($sqlQuery, $connection);
    }
    
    CLASS_CONNECTION::CloseConnection($useMysqli);
    
    return $dados;
    
  }


}

?>
