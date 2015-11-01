<?php

$root = $_SERVER['DOCUMENT_ROOT'];

require_once $root.'/connection.php';
require_once $root.'/validation.php';
require_once $root.'/Model/Empresario.php';
require_once $root.'/Model/Login.php';

class LoginController 
{

	public function logar()
	{
		/* Abre a conexao com o banco de dados */
		DB::connect();

		/* Remove caracteres especias */
		$login = test_input($_POST['email']);
		$senha = test_input($_POST['password']);


		if (Empresario::getEmpresarioLogin($login, $senha)) {	
					Login::login();
		}

		/* Fecha a conexao com o banco de dados */
		DB::close();
	}
}
?>