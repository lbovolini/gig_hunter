<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/connection.php';
require_once $root.'/validation.php';
require_once $root.'/Model/Freelancer.php';
require_once $root.'/Model/Endereco.php';

class FreelancerController 
{

	public function criar()
	{
		DB::connect();

		$nome = $email = $username = $senha = $data_nascimento = $telefone = $rg = $cpf = $cep = $rua = $bairro = $estado = $cidade = $instituicao = $matricula = $lattes = $linkedin = '';

		$nome = test_input($_POST['nome']);
		$email = test_input($_POST['email']);
		$confirmacao_email = test_input($_POST['confirmacao_email']);
		$username = test_input($_POST['username']);
		$senha = test_input($_POST['senha']);
		$confirmacao_senha = test_input($_POST['confirmacao_senha']);
		$data_nascimento = test_input($_POST['data_nascimento']);
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

		$vazioAcad = Freelancer::validate([
			'nome',
			'email',
			'confirmacao_email',
			'username',
			'senha',
			'confirmacao_senha',
			'data_nascimento',
			'telefone',
			'rg',
			'cpf',
			'instituicao',
			'matricula',
			'lattes',
			'linkedin'
		]);

		$vazioEnd = Endereco::validate([
			'cep',
			'rua',
			'bairro',
			'estado',
			'cidade'
		]);
		
		if (!$vazioAcad && !$vazioEnd) {
			if (!Freelancer::getFreelancer($cpf)) {	
				if ($email == $confirmacao_email) {
					if ($senha == $confirmacao_senha) {
						$idEndereco = Endereco::create($cep, $rua, $bairro, $estado, $cidade);
						
						Freelancer::create($nome, $email, $username, $senha, $data_nascimento, $telefone, $rg, $cpf, $instituicao, $matricula, $lattes, $linkedin, $idEndereco);
					}
					else {
						echo "<script> alert('Senhas não conferem!'); location.href='/View/Freelancer/Create.php'; </script>";
					}
				}
				else {
					echo "<script> alert('Emails não conferem!'); location.href='/View/Freelancer/Create.php'; </script>";
				}
			}
			else {
				echo "<script> alert('Freelancer já cadastrado!'); location.href='/View/Freelancer/Create.php'; </script>";
			}
		}
		else {
			echo "<script> alert('Todos os campos são de preenchimento obrigatório!'); location.href='/View/Freelancer/Create.php'; </script>";
		}

		DB::close();
	}
}
?>
