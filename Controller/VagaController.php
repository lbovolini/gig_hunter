<?php

$root = $_SERVER['DOCUMENT_ROOT'];

require_once $root.'/connection.php';
require_once $root.'/validation.php';
require_once $root.'/Model/Vaga.php';

class VagaController 
{
	/* Cria Vaga */
	public function criar()
	{
		/* Abre a conexao com o banco de dados */
		DB::connect();

		/* Remove caracteres especias */
		$descricao = test_input($_POST['descricao']);
		$cargo = test_input($_POST['cargo']);
		$usuario_alvo = test_input($_POST['usuario_alvo']);
		
		/* Insere Vaga no banco de dados */
		Vaga::create($descricao, $cargo, $usuario_alvo);
		
		/* Insere Requisitos da Vaga no banco de dados */
		$query = mysql_query("SELECT * FROM vagas");
		while ($row2 = mysql_fetch_array($query))
			$idVaga = $row2['id'];

		$result = mysql_query("SELECT * FROM requisitos");
		$count=0;
		while ($row = mysql_fetch_array($result)) {
			$ocorrencia = (isset($_POST["selectArray"])) ? $_POST["selectArray"] : '';
			if ($ocorrencia[$count] == 'Sim') {
				$req = $count;
				$req++;
				$query = "INSERT INTO vaga_requisitos(vaga_id, requisito_id) VALUES ('" . $idVaga . "', '" . $req . "')";
				mysql_query($query);
			}
			$count++;
		}

		/* Fecha a conexao com o banco de dados */
		DB::close();
	}
	
	/* Edita Vaga */
	public function editar()
	{
		/* Abre a conexao com o banco de dados */
		DB::connect();

		/* Remove caracteres especias */
		$descricao = test_input($_POST['descricao']);
		$cargo = test_input($_POST['cargo']);
		$usuario_alvo = test_input($_POST['usuario_alvo']);

		/* Edita Empresa no banco de dados */
		Vaga::edit($descricao, $cargo, $usuario_alvo);
		
		/* Edita Requisitos da Vaga no banco de dados */
		$query1 = "DELETE FROM vaga_requisitos WHERE vaga_id = '" . $_SESSION['idVaga'] . "'";
		mysql_query($query1);
		$result = mysql_query("SELECT * FROM requisitos");
		$count=0;
		while ($row = mysql_fetch_array($result)) {
			$ocorrencia = (isset($_POST["selectArray"])) ? $_POST["selectArray"] : '';
			if ($ocorrencia[$count] == 'Sim') {
				$req = $count;
				$req++;
				$query2 = "INSERT INTO vaga_requisitos(vaga_id, requisito_id) VALUES ('" . $_SESSION['idVaga'] . "', '" . $req . "')";
				mysql_query($query2);
			}
			$count++;
		}

		/* Fecha a conexao com o banco de dados */
		DB::close();
	}

	/* Exclui Empresa */
	public function excluir()
	{
		/* Abre a conexao com o banco de dados */
		DB::connect();

		/* Exclui Empresa no banco de dados */
		Vaga::drop();

		/* Fecha a conexao com o banco de dados */
		DB::close();
	}
}
?>
