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