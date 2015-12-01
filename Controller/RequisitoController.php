<?php

$root = $_SERVER['DOCUMENT_ROOT'];

require_once $root.'/connection.php';
require_once $root.'/validation.php';

class RequisitoController 
{
	
	/* Edita Requisito */
	public function editar()
	{
		/* Abre a conexao com o banco de dados */
		DB::connect();
		
		/* Edita Requisitos do Usuário no banco de dados */
		$query1 = "DELETE FROM usuario_requisitos WHERE usuario_id = '" . $_SESSION['id'] . "'";
		mysql_query($query1);
		$result = mysql_query("SELECT * FROM requisitos");
		$count=0;
		while ($row = mysql_fetch_array($result)) {
			$ocorrencia = (isset($_POST["selectArray"])) ? $_POST["selectArray"] : '';
			if ($ocorrencia[$count] == 'Sim') {
				$req = $count;
				$req++;
				$query2 = "INSERT INTO usuario_requisitos(usuario_id, requisito_id) VALUES ('" . $_SESSION['id'] . "', '" . $req . "')";
				mysql_query($query2);
			}
			$count++;
		}

		/* Fecha a conexao com o banco de dados */
		DB::close();
	}
}
?>
