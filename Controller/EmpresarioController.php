<?php
set_include_path('/home/lucas/GigHunter/');
	require_once 'connection.php';
	require_once 'validation.php';
	require_once 'Model/Empresario.php';
	require_once 'Model/Endereco.php';

class EmpresarioController 
{

	public function criar()
	{
		DB::connect();

		$nome = $email = $username = $senha = $data_nascimento = $telefone = $rg = $cpf = $cep = $rua = $bairro = $estado = $cidade = '';

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


		$vazioEmp = Empresario::validate([
			'nome',
			'email',
			'confirmacao_email',
			'username',
			'senha',
			'confirmacao_senha',
			'data_nascimento',
			'telefone',
			'rg',
			'cpf'
		]);

		$vazioEnd = Endereco::validate([
			'cep',
			'rua',
			'bairro',
			'estado',
			'cidade'
		]);



		if (!$vazioEmp && !$vazioEnd) {
			if (!Empresario::getEmpresario($cpf)) {	
				if ($email == $confirmacao_email) {
					if ($senha == $confirmacao_senha) {
						$idEndereco = Endereco::create($cep, $rua, $bairro, $estado, $cidade);
						
						Empresario::create($nome, $email, $username, $senha, $data_nascimento, $telefone, $rg, $cpf, $idEndereco);
					}
					else {
						echo "<script> alert('Senhas não conferem!'); location.href='cadastro.php'; </script>";
					}
				}
				else {
					echo "<script> alert('Emails não conferem!'); location.href='cadastro.php'; </script>";
				}
			}
			else {
				echo "<script> alert('Empresário já cadastrado!'); location.href='cadastro.php'; </script>";
			}
		}
		else {
			echo "<script> alert('Todos os campos são de preenchimento obrigatório!'); location.href='cadastro.php'; </script>";
		}

		DB::close();
	}
}
?>