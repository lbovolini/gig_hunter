<?php

class Avaliacao 
{

	//Insere uma Avaliacao
	public function create($nota, $comentario, $id_usuario, $id_empresa, $status) {
		$query = "INSERT INTO avaliacoes VALUES('NULL', '{$nota}', '{$comentario}', '{$status}', '{$id_usuario}', '{$id_empresa}');";
		mysql_query($query);
	}
	
	//Exclui uma Avaliacao
	public static function drop()
	{
		$query = "DELETE FROM avaliacoes WHERE id = '" . $_SESSION['idAvaliacao'] . "'";
		mysql_query($query);
	}
	
	public static function publica()
	{
		$query = "UPDATE avaliacoes SET status = REPLACE(status, 'Em espera', 'Publicada') WHERE id = '" . $_SESSION['idAvaliacao'] . "'";
		mysql_query($query);
	}

}

?>