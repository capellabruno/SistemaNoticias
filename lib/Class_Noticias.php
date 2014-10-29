<?php

class NOTICIAS_NEGOC{
  
    private ____TABELA = "noticias";
	private ____CAMPOS = "id_noticia, titulo, autor, previa, descricao_completa, ativa, caminho_imagem, fonte_url, views";
	private ____QUERY_SELECT_BASE = "SELECT [0] FROM [1]";
	private ____QUERY_INSERT_BASE = "INSERT INTO [0] ([1]) VALUES ([2])";
	private ____QUERY_DELETE_BASE = "DELETE FROM [0] WHERE [1] = [2] ";
	private ____QUERY_UPDATE_BASE = "UPDATE [0] SET [1] WHERE [2]";
	
	function Inserir(){}

	function Deletar(){}
	
	function Atualizar(){}

	function ListarTodos(){}
	
	function ListarPaginado($limite=20, $pagina =1){
		
	}
		
}

?>
