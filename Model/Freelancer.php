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
	
	public static function edit_bloq($data_bloqueio) 
	{
		$query = "UPDATE usuarios SET tempo_bloqueada = '" . $data_bloqueio . "' WHERE id = '" . $_SESSION['id'] . "'";;
		mysql_query($query);
	}

	// Retorna Estado
	public static function getEstado($id)
	{
		$query = "SELECT estado FROM usuarios AS User JOIN enderecos AS End ON (User.endereco_id = End.id) WHERE User.id = '{$id}' LIMIT 1;";
		$resultado = mysql_query($query);
		$resultado = mysql_fetch_array($resultado);

		return($resultado['estado']);
	}

	// Valida senha
	public static function senhaValida($id, $senha)
	{
		$query = "SELECT id FROM usuarios WHERE id = '{$id}' AND senha = '{$senha}';";
		$resultado = mysql_query($query);

	    if(mysql_fetch_array($resultado) == 0)
	    {
	        return false; // invalida
	    }
        return true; // valida
	}


	// Retorna avaliacoes
	public static function getAvaliacaoRecebidas($id_usuario)
	{
		$query = "SELECT U.id as id_usuario, U.nome as nome_usuario, U.email as email_usuario, U.telefone as telefone_usuario, 
				  A.id as id_avalicao, A.nota as nota, A.comentario as comentario, A.status as status, 
				  E.id as id_empresa, E.nome as nome_empresa, E.email email_empresa, E.telefone telefone_empresa
				  FROM usuarios AS U JOIN avaliacoes AS A ON (U.id = A.usuario_id)
				  JOIN empresas AS E ON (E.id = A.empresa_id)
				  WHERE A.usuario_id = '{$id_usuario}'
				  AND A.status = 'Por Empresario, Publicada';";
		$resultado = mysql_query($query);
		return($resultado);		
	}
}
?>
