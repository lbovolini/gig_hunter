<?php

$root = $_SERVER['DOCUMENT_ROOT'];

require_once $root.'/connection.php';
require_once $root.'/validation.php';
require_once $root.'/Model/Empresa.php';
require_once $root.'/Model/Endereco.php';

class EmpresaController 
{
	/* Cria Empresa */
	public function criar()
	{
		/* Abre a conexao com o banco de dados */
		DB::connect();

		/* Remove caracteres especias */
		$nome = test_input($_POST['nome']);
		$razao_social = test_input($_POST['razao_social']);
		$email = test_input($_POST['email']);
		$cnpj = test_input($_POST['cnpj']);
		$telefone = test_input($_POST['telefone']);
		$cep = test_input($_POST['cep']);
		$rua = test_input($_POST['rua']);
		$bairro = test_input($_POST['bairro']);
		$estado = test_input($_POST['estado']);
		$cidade = test_input($_POST['cidade']);

		/* Insere Endereco no banco de dados */
		$idEndereco = Endereco::create($cep, $rua, $bairro, $estado, $cidade);
		/* Insere Empresa no banco de dados */
		Empresa::create($nome, $razao_social, $email, $telefone, $cnpj, $idEndereco);

		/* Fecha a conexao com o banco de dados */
		DB::close();
	}
}
?>
