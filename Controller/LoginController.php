<?php

$root = $_SERVER['DOCUMENT_ROOT'];

require_once $root.'/connection.php';
require_once $root.'/validation.php';
require_once $root.'/Model/Empresario.php';
require_once $root.'/Model/Academico.php';
require_once $root.'/Model/Freelancer.php';
require_once $root.'/Model/Login.php';

class LoginController 
{

	public function logar()
	{
		/* Abre a conexao com o banco de dados */
		DB::connect();

		/* Remove caracteres especias */
		$username = test_input($_POST['username']);
		$senha = test_input($_POST['senha']);


			if (Empresario::getEmpresarioLogin($username, $senha)) {	
				Login::loginEmp();
			}
			else if (Academico::getAcademicoLogin($username, $senha)) {
				Login::loginAcad();
			}
			else if (Freelancer::getFreelancerLogin($username, $senha)) {
				Login::loginFree();
			}
			else {
				echo "<script> alert('Login e Senha não conferem!'); </script>";
			}

		/* Fecha a conexao com o banco de dados */
		DB::close();
	}
}
?>
