<?php
    
    class NOTICIAS_NEGOC{
        public $____QUERY_SELECT_BASE = "SELECT [0] FROM noticias";
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
    
        function Deletar(NOTICIA $noticia){
            $query ="DELETE FROM noticias WHERE id_noticia = ? ";
                $internal_conn=NULL;
                $internal_query = NULL;
                $rows_affacteds = 0;
    
            if ($noticia->id_noticia <=0){
                exit(utf_decode('Código da notícia não foi informado'));
            }
    
            CLASS_CONNECTION::OpenConnection();
            $internal_conn = CLASS_CONNECTION::GetConnection();	
            $internal_query = $internal_conn->prepare($query);
            $internal_query->bind_param('i', $noticia->id_noticia);
                $internal_query->execute();
    
                $rows_affacteds = $internal_query->affected_rows;
    
                return $rows_affacteds;
        }
    
        function Atualizar(NOTICIA $noticia){}
    
        function ListarTodos(){
            $dados=array();
            $query_column ="";
            $loop=0;
    
            $CAMPOS = array("id_noticia", "titulo", "autor", "previa", "descricao_completa", "ativa", "caminho_imagem", "fonte_url", "views", "data_criacao");
            $QUERY_SELECT_BASE = "SELECT [0] FROM noticias";
    
            foreach($CAMPOS as $value){
                if(empty($query_column)==TRUE){
                    $query_column = $value;
                }else{
                    $query_column .= "," . $value;
                }
            }
    
            $query = str_replace("[0]", $query_column, $QUERY_SELECT_BASE);
    
            CLASS_CONNECTION::OpenConnection();
            $internal_conn = CLASS_CONNECTION::GetConnection();
            $internal_query = $internal_conn->prepare($query);
            $internal_query->execute();
    
            unset($dados);
    
            //$internal_query->bind_result($obj->id_noticia, $obj->titulo,$obj->autor,$obj->previa,$obj->descricao_completa,$obj->ativa,$obj->caminho_imagem,$obj->fonte_url,$obj->views,$obj->data_criacao);
    
            $internal_query->store_result();
    
            $data = array();
            $var = array();
            $meta = $internal_query->result_metadata();
    
            while($field = $meta->fetch_field()){
                $variables[] = &$data[$field->name];
            }
    
            call_user_func_array(array($internal_query, 'bind_result'), $variables);
    
            while($internal_query->fetch()){
                $dados[$loop] = array();
                foreach($data as $k=>$v){
                    $dados[$loop][$k] = utf8_decode($v);
                }
            $loop++;
            }
    
            $internal_query->close();
            $internal_conn->close();
    
            return $dados;
    
        }
    
        function BuscarPorId($id_noticia){
    
            $dados=array();
            $query_column ="";
            $obj = new NOTICIA();
            $loop=0;
    
    
            $CAMPOS = array("id_noticia", "titulo", "autor", "previa", "descricao_completa", "ativa", "caminho_imagem", "fonte_url", "views", "data_criacao");
            $QUERY_SELECT_BASE = "SELECT [0] FROM noticias WHERE id_noticia = " . intval($id_noticia);
    
            foreach($CAMPOS as $value){
                if(empty($query_column)==TRUE){
                    $query_column = $value;
                }else{
                    $query_column .= "," . $value;
                }
            }
    
            $query = str_replace("[0]", $query_column, $QUERY_SELECT_BASE);                         
    
            CLASS_CONNECTION::OpenConnection();
            $internal_conn = CLASS_CONNECTION::GetConnection();
            $internal_query = $internal_conn->prepare($query);
            $internal_query->execute();
    
            unset($dados);
    
            /*$internal_query->bind_result("i", $id_noticia);*/
    
            $internal_query->store_result();
    
            $data = array();
            $var = array();
            $meta = $internal_query->result_metadata();
    
            while($field = $meta->fetch_field()){
                $variables[] = &$data[$field->name];
            }
    
            call_user_func_array(array($internal_query, 'bind_result'), $variables);
    
            while($internal_query->fetch()){
                $dados[$loop] = array();
                foreach($data as $k=>$v){
                    $dados[$loop][$k] = utf8_decode($v);
                }
            $loop++;
            }
    
            $internal_query->close();
            $internal_conn->close();
    
            return $dados;
        }
    
        function ListarPaginado($limite=20, $pagina =1){
            $dados=array();
            $query_column ="";
            $start = 0;
            $end = $pagina * $limite;
            $obj = new NOTICIA();
            $loop=0;
    
    
            $CAMPOS = array("id_noticia", "titulo", "autor", "previa", "descricao_completa", "ativa", "caminho_imagem", "fonte_url", "views", "data_criacao");
            $QUERY_SELECT_BASE = "SELECT [0] FROM noticias";
    
            foreach($CAMPOS as $value){
                if(empty($query_column)==TRUE){
                    $query_column = $value;
                }else{
                    $query_column .= "," . $value;
                }
            }
    
            $query = str_replace("[0]", $query_column, $QUERY_SELECT_BASE);
    
            if($pagina ==1){
                $start =0;
            }else{
                $start = ($pagina * $limite) - $limite;
            }
    
            $query .= " ORDER BY id_noticia DESC";   
            $query .= " LIMIT " . $start . ", " . $end;                           
    
            CLASS_CONNECTION::OpenConnection();
            $internal_conn = CLASS_CONNECTION::GetConnection();
            $internal_query = $internal_conn->prepare($query);
            $internal_query->execute();
    
            unset($dados);
    
            //$internal_query->bind_result($obj->id_noticia, $obj->titulo,$obj->autor,$obj->previa,$obj->descricao_completa,$obj->ativa,$obj->caminho_imagem,$obj->fonte_url,$obj->views,$obj->data_criacao);
    
            $internal_query->store_result();
    
            $data = array();
            $var = array();
            $meta = $internal_query->result_metadata();
    
            while($field = $meta->fetch_field()){
                $variables[] = &$data[$field->name];
            }
    
            call_user_func_array(array($internal_query, 'bind_result'), $variables);
    
            while($internal_query->fetch()){
                $dados[$loop] = array();
                foreach($data as $k=>$v){
                    $dados[$loop][$k] = utf8_decode($v);
                }
            $loop++;
            }
    
            $internal_query->close();
            $internal_conn->close();
    
            return $dados;
        }
    
    }
    
?>
