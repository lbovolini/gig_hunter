<?php

class Freelancer
{
	private $nome;
	private $email;
	private $username;
	private $senha;
	private $data_nascimento;
	private $telefone;
	private $rg;
	private $cpf;
	private $instituicao;
	private $matricula;
	private $lattes;
	private $linkedin;

	public function __construct() {}

	//Retorna dados de um Freelancer
	public static function getFreelancer($cpf) {
		$query = "SELECT id FROM usuarios WHERE cpf = '{$cpf}' LIMIT 1";
		$resultado = mysql_query($query);
		return(mysql_fetch_array($resultado));
	}

	/* verifica se o email ja esta registrado */
	public static function emailRegistrado($email) {
	    $query = "SELECT id FROM usuarios WHERE email = '{$email}' LIMIT 1;";
	    $resultado = mysql_query($query);

	    if(mysql_fetch_array($resultado) == 0)
	    {
	        return false;  //nao registrado
	    }
        return true; //registrado
	}

	/* verifica se o nome de usuario ja esta registrado */
	public static function usernameRegistrado($username) {
	    $query = "SELECT id FROM usuarios WHERE username = '{$username}' LIMIT 1;";
	    $resultado = mysql_query($query);

	    if(mysql_fetch_array($resultado) == 0)
	    {
	        return false;  //nao registrado
	    }
        return true; //registrado
	}

	/* verifica se o RG ja esta registrado */
	public static function rgRegistrado($rg) {
	    $query = "SELECT id FROM usuarios WHERE rg = '{$rg}' LIMIT 1;";
	    $resultado = mysql_query($query);

	    if(mysql_fetch_array($resultado) == 0)
	    {
	        return false;  //nao registrado
	    }
        return true; //registrado
	}

	/* verifica se o CPF ja esta registrado */
	public static function cpfRegistrado($cpf) {
	    $query = "SELECT id FROM usuarios WHERE cpf = '{$cpf}' LIMIT 1;";
	    $resultado = mysql_query($query);

	    if(mysql_fetch_array($resultado) == 0)
	    {
	        return false;  //nao registrado
	    }
        return true; //registrado
	}


	//Insere um Freelancer
	public static function create($nome, $email, $username, $senha, $data_nascimento, $telefone, $rg, $cpf, $lattes, $linkedin, $idEndereco) 
	{
		$query = "INSERT INTO usuarios(nome, email, username, senha, data_nascimento, telefone, rg, cpf, status, tempo_bloqueada, tipo, lattes, linkedin, endereco_id) 
		   		  VALUES ('{$nome}', '{$email}', '{$username}', '{$senha}', '{$data_nascimento}', '{$telefone}', '{$rg}', '{$cpf}', 'Ativo', '0', 'Freelancer', '{$lattes}', '{$linkedin}', '{$idEndereco}')";
		mysql_query($query);
	}
	
	//Edita um Freelancer
	public static function edit($nome, $email, $username, $senha, $data_nascimento, $telefone, $rg, $cpf, $lattes, $linkedin) 
	{
		$query = "UPDATE usuarios SET nome = '" . $nome . "', email = '" . $email . "', username = '" . $username . "', senha = '" . $senha . "', data_nascimento = '" . $data_nascimento . "', telefone = '" . $telefone . "', rg = '" . $rg . "', cpf = '" . $cpf . "', lattes = '" . $lattes . "', linkedin = '" . $linkedin . "' WHERE id = '" . $_SESSION['id'] . "'";
		mysql_query($query);
	}
}
?>
