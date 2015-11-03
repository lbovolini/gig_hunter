<?php

$root = $_SERVER['DOCUMENT_ROOT'];

require_once $root.'/connection.php';
require_once $root.'/validation.php';
require_once $root.'/Model/Empresario.php';
<<<<<<< HEAD
require_once $root.'/Model/Academico.php';
require_once $root.'/Model/Freelancer.php';
require_once $root.'/Model/Endereco.php';
=======
>>>>>>> origin/master
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
				Login::loginEmp();
			}
			else if (Academico::getAcademicoLogin($login, $senha)) {
				Login::loginAcad();
			}
			else if (Freelancer::getFreelancerLogin($login, $senha)) {
				Login::loginFree();
			}
			else {
				echo "<script> alert('Login e Senha não conferem!'); location.href='/View/Login.php'; </script>";
			}

		/* Fecha a conexao com o banco de dados */
		DB::close();
	}
}
?>
