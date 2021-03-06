<?php

session_start();

$root = $_SERVER['DOCUMENT_ROOT'];
require_once $root.'/connection.php';
require_once $root.'/validation.php';
require_once $root.'/Model/Autentica.php';


class LoginController 
{

	public function logar()
	{
		/* Abre a conexao com o banco de dados */
		DB::connect();

		/* Remove caracteres especias */
		$username = test_input($_POST['username']);
		$senha = test_input($_POST['senha']);

        # Uso do singleton para instanciar
        # apenas um objeto de autenticação
        # e esconder a classe real de autenticação
        $aut = Autenticador::instanciar();

        # efetua o processo de autenticação
        if ($aut->entrar($username, $senha)) {
            if($_SESSION['tipo'] == 'Empresario') {
                # redireciona o usuário para dentro do sistema
                header('location: View/Empresario/Home.php');
            }
            elseif ($_SESSION['tipo'] == 'Academico') {
                # redireciona o usuário para dentro do sistema
                header('location: View/Academico/Home.php');
            }
            elseif ($_SESSION['tipo'] == 'Freelancer') {
                # redireciona o usuário para dentro do sistema
                header('location: View/Freelancer/Home.php');
            }
            elseif ($_SESSION['tipo'] == 'Admin') {
                # redireciona o usuário para dentro do sistema
                header('location: View/Admin/Home.php');                
            }

        }
        else {
            # envia o usuário de volta para 
            # o form de login
			echo "<script> alert('Login e Senha não conferem!'); location.href='index.php'; </script>";
            //header('location: index.php');
        }

		/* Fecha a conexao com o banco de dados */
		DB::close();
	}

	public function sair()
	{
        // remove todas as variaveis de sessao
        session_unset();

        // destroi a sessao
        session_destroy();

        header('location: /index.php');
	}
}
?>
