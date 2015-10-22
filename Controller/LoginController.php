<?php
set_include_path('C:/xampp/htdocs/gig_hunter/');
	require_once 'connection.php';
	require_once 'validation.php';
	require_once 'Model/Empresario.php';
	require_once 'Model/Endereco.php';
	require_once 'Model/Login.php';

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