<?php

$root = $_SERVER['DOCUMENT_ROOT'];

require_once $root.'/connection.php';
require_once $root.'/validation.php';
require_once $root.'/Model/Admin.php';

class AdminController 
{
	/* Cria Área de Interesse */
	public function criarRequisito()
	{
		/* Abre a conexao com o banco de dados */
		DB::connect();

		/* Remove caracteres especias */
		$requisito = test_input($_POST['requisito']);

		/* Insere Área de Interesse no banco de dados */
		Admin::create($requisito);

		/* Fecha a conexao com o banco de dados */
		DB::close();
	}
}
?>
