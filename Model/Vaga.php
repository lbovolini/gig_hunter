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
		$queryO = "DELETE FROM oferecidas WHERE vaga_id = '" . $_SESSION['idVaga'] . "'";
		mysql_query($queryO);
		$queryC = "DELETE FROM candidatos WHERE vaga_id = '" . $_SESSION['idVaga'] . "'";
		mysql_query($queryC);
		$queryR = "DELETE FROM vaga_requisitos WHERE vaga_id = '" . $_SESSION['idVaga'] . "'";
		mysql_query($queryR);
		$query = "DELETE FROM vagas WHERE id = '" . $_SESSION['idVaga'] . "'";
		mysql_query($query);
	}

	// Retorna vagas de empresas do estado
	public static function getVagasRecomendadas($estado, $usuario, $id_user)
	{
		$query = "SELECT Vag.id, descricao, cargo, Emp.id, nome, cidade, estado 
				  FROM empresas AS Emp 
				  JOIN enderecos AS End 
				  ON (Emp.endereco_id = End.id) 
				  JOIN vagas as Vag 
				  ON (Emp.id = Vag.empresa_id)
				  WHERE estado = '{$estado}'
				  AND usuario_alvo != '{$usuario}'
				  AND status = 'Aberta'
				  AND Vag.usuario_id = 0
				  AND Vag.id not in (
				  	SELECT vaga_id 
				  	FROM oferecidas
				  	WHERE usuario_id = '{$id_user}'
				  )
				  AND Vag.id not in (
				  	SELECT vaga_id 
				  	FROM candidatos
				  	WHERE usuario_id = '{$id_user}'
				  )
				  LIMIT 10;";

		return(mysql_query($query));
	}

	// candidatar se a uma vaga
	public static function candidatar($id_vaga, $id_user) 
	{
		$query = "INSERT INTO candidatos(vaga_id, usuario_id) 
			VALUES ('{$id_vaga}' , '{$id_user}')";

		mysql_query($query);
		$query2 = "DELETE FROM oferecidas 
			WHERE vaga_id = '{$id_vaga}' 
			AND usuario_id = '{$id_user}'";

		mysql_query($query2);
	}
}
?>
