<?php

class Avaliacao 
{

	public function create($nota, $comentario, $id_usuario, $id_empresa) {
		$query = "INSERT INTO avaliacoes VALUES('NULL', '{$nota}', '{$comentario}', 'Em espera', '{$id_usuario}', '{$id_empresa}');";
		mysql_query($query);
	}

}

?>