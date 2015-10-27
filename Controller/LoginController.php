<?php
$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/connection.php';
require_once $root.'/validation.php';
require_once $root.'/Model/Empresario.php';
require_once $root.'/Model/Endereco.php';
require_once $root.'/Model/Login.php';

class LoginController 
{

	public function logar()
	{
		DB::connect();

		$login = $senha = '';

		$login = test_input($_POST['login']);
		$senha = test_input($_POST['senha']);

		$vazioLog = Login::validate([
			'login',
			'senha'
		]);

		if (!$vazioLog) {
			if (Empresario::getEmpresarioLogin($login, $senha)) {	
						Login::login();
			}
			else {
				echo "<script> alert('Login e Senha não conferem!'); location.href='/View/Login.php'; </script>";
			}
		}
		else {
			echo "<script> alert('Todos os campos são de preenchimento obrigatório!'); location.href='/View/Login.php'; </script>";
		}

		DB::close();
	}
}
?>
