<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/connection.php';
require_once $root.'/validation.php';
require_once $root.'/Model/Freelancer.php';
require_once $root.'/Model/Endereco.php';

class FreelancerController 
{
	/* Cria Freelancer */
	public function criar()
	{
		/* Abre a conexao com o banco de dados */
		DB::connect();

		/* Remove caracteres especias */
		$nome = test_input($_POST['nome']);
		$email = test_input($_POST['email']);
		$confirmacao_email = test_input($_POST['confirmacao_email']);
		$username = test_input($_POST['username']);
		$senha = test_input($_POST['senha']);
		$confirmacao_senha = test_input($_POST['confirmacao_senha']);
		$data_nascimento = test_input($_POST['data_nascimento']);
		/* Converte data para o formato YYYY/DD/MM */
		$data_nascimento = implode("-",array_reverse(explode("/",$data_nascimento)));
		$telefone = test_input($_POST['telefone']);
		$rg = test_input($_POST['rg']);
		$cpf = test_input($_POST['cpf']);
		$cep = test_input($_POST['cep']);
		$rua = test_input($_POST['rua']);
		$bairro = test_input($_POST['bairro']);
		$estado = test_input($_POST['estado']);
		$cidade = test_input($_POST['cidade']);
		$instituicao = test_input($_POST['instituicao']);
		$matricula = test_input($_POST['matricula']);
		$lattes = test_input($_POST['lattes']);
		$linkedin = test_input($_POST['linkedin']);

		/* Insere Endereco no banco de dados */
		$idEndereco = Endereco::create($cep, $rua, $bairro, $estado, $cidade);
		/* Insere Freelancer no banco de dados */
		Freelancer::create($nome, $email, $username, $senha, $data_nascimento, $telefone, $rg, $cpf, $instituicao, $matricula, $lattes, $linkedin, $idEndereco);

		/* Fecha a conexao com o banco de dados */
		DB::close();
	}
}
?>
