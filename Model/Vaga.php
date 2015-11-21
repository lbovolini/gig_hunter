<?php

class Vaga
{
	private $descricao;
	private $cargo;
	private $usuario_alvo;
	private $status;

	public function __construct() {}
	
	//Insere uma Vaga
	public static function create($descricao, $cargo, $usuario_alvo)
	{
		$q = "SET FOREIGN_KEY_CHECKS=0";
		mysql_query($q);
		$query = "INSERT INTO vagas(descricao, cargo, usuario_alvo, status, empresa_id, usuario_id)
			VALUES ('" . $descricao . "', '" . $cargo . "', '" . $usuario_alvo . "', 'Aberta', '" . $_SESSION['idEmpresa'] . "', 'NULL')";
		mysql_query($query);
	}
	
	//Edita uma Vaga
	public static function edit($descricao, $cargo, $usuario_alvo)
	{
		$query = "UPDATE vagas SET descricao = '" . $descricao . "', cargo = '" . $cargo . "', usuario_alvo = '" . $usuario_alvo . "' WHERE id = '" . $_SESSION['idVaga'] . "'";
		mysql_query($query);
	}

	//Exclui uma Empresa
	public static function drop()
	{
		$query = "DELETE FROM vagas WHERE id = '" . $_SESSION['idVaga'] . "'";
		mysql_query($query);
	}
}
?>
