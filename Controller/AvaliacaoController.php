<?php

$root = $_SERVER['DOCUMENT_ROOT'];

require_once $root.'/connection.php';
require_once $root.'/validation.php';
require_once $root.'/Model/Avaliacao.php';

class AvaliacaoController 
{
	/* Cria Avaliacao */
	public function criar()
	{
		/* Abre a conexao com o banco de dados */
		DB::connect();

		/* Remove caracteres especias */
		$nota = test_input($_POST['nota']);
		$comentario = test_input($_POST['comentario']);

		if($_SESSION['tipo'] == 'Empresario') {
			$status = 'Por Empresario, Em espera';
			$id_empresa = $_POST['empresa'];
			$id_usuario = $_GET['id_usuario'];
		}
		else {
			$status = 'Por Usuario, Em espera';
			$id_empresa = $_GET['id_empresa'];
			$id_usuario = $_SESSION['id'];
		}

		/* Insere Avalicao no banco de dados */
		Avaliacao::create($nota, $comentario, $id_usuario, $id_empresa, $status);

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

	/* Candidatar se a uma vaga */
	public function candidatar()
	{
		/* Abre a conexao com o banco de dados */
		DB::connect();		

		$idVaga = $_GET['idVaga'];

		Vaga::candidatar($idVaga, $_SESSION['id']);

		/* Fecha a conexao com o banco de dados */
		DB::close();
	}
}
?>
