<?php

class NOTICIAS_NEGOC{
  	public $____QUERY_SELECT_BASE = "SELECT [0] FROM noticias";
	public $____QUERY_DELETE_BASE = "DELETE FROM noticias WHERE [1] = [2] ";
	public $____QUERY_UPDATE_BASE = "UPDATE noticias SET [1] WHERE [2]";
	
	function Inserir(NOTICIA $noticia){
	    $query ="";
        $query_values="";
        $query_column ="";
        $internal_conn=NULL;
        $internal_query = NULL;
        $rows_affacteds = 0;
       	 $____CAMPOS = array("id_noticia", "titulo", "autor", "previa", "descricao_completa", "ativa", "caminho_imagem", "fonte_url", "views", "data_criacao");


        if (empty($noticia->titulo)){
	        exit(utf8_decode("Título da notícia deve ser informado"));
	    }

        if(empty($noticia->descricao_completa)){
            exit(utf8_decode("Descrição da notícia deve ser informada"));
        }

        if(empty($noticia->autor)){
            exit(utf8_decode("Autor não foi informado"));
        }

        if(empty($noticia->previa)){
            exit(utf8_decode("Prévia da noticia não foi informada"));
        }

        $query = "INSERT INTO noticias ([1]) VALUES ([2])";
        
        foreach($____CAMPOS as $value){
            if(empty($query_column)==TRUE && $value != "id_noticia"){
                $query_column = $value;
                $query_values = "?";
            }elseif ($value != "data_criacao" && $value != "id_noticia"){
                $query_column .= "," . $value;
                $query_values .= ", ?";
            }
        }


        $query = str_replace("[1]", $query_column, $query);
        $query = str_replace("[2]", $query_values, $query);

        CLASS_CONNECTION::OpenConnection();

        $internal_conn = CLASS_CONNECTION::GetConnection();

        $internal_query = $internal_conn->prepare($query);
        
        $internal_query->bind_param('ssssissi', utf8_encode($noticia->titulo), utf8_encode($noticia->autor), utf8_encode($noticia->previa), utf8_encode($noticia->descricao_completa), $noticia->ativa, $noticia->caminho_imagem, $noticia->fonte_url, $noticia->views);
        
       // exit( $query);

        $internal_query->execute();

        $rows_affacteds = $internal_query->affected_rows;
        
        $internal_query->close();

        return $rows_affacteds;
	}

	function Deletar(NOTICIA $noticia){}
	
	function Atualizar(NOTICIA $noticia){}

	function ListarTodos(){}
	
	function ListarPaginado($limite=20, $pagina =1){
		
	}
		
}

?>
