<?php

    define ("DB_CONNECTION", "sistemaNoticias");
    define ("DB_HOST", "localhost");
    define ("DB_USERNAME", "root");
    define ("DB_PASSWORD", "maboula1305");
   
    abstract class CLASS_CONNECTION{
    
      public $connection;

      function GetConnection(){
          return $this->connection;
      }

      function OpenConnection(){   
          $this->connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_CONNECTION);
          if(!$this->connection){
            die("connect database fail. login is not possible");
          }
          return $this->connection;
       }   
    
      function ExecSelect($sqlQuery){
    
        CLASS_CONNECTION::OpenConnection();
    
        $dados =null;
        $exec = null;
    
        unset($dados);
    
         $exec = mysqli_query($connection, $sqlQuery);
          for($i=0;$i<mysqli_num_rows($exec);$i++){
              $row = mysqli_fetch_array($exec);
              foreach($row as $key =>$value)
                $dados[$i][$key] =$value;
          }
    
    
        CLASS_CONNECTION::CloseConnection();
    
        return $dados;
    
      }
    
    
    }
    
?>
