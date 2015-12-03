<?php

class Avaliacao 
{

	public function create($nota, $comentario, $id_usuario, $id_empresa, $status) {
		$query = "INSERT INTO avaliacoes VALUES('NULL', '{$nota}', '{$comentario}', '{$status}', '{$id_usuario}', '{$id_empresa}');";
		mysql_query($query);
	}

}

?>