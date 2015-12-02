<?php

class Empresario
{
	private $nome;
	private $email;
	private $username;
	private $senha;
	private $data_nascimento;
	private $telefone;
	private $rg;
	private $cpf;

	public function __construct() {}


	//Retorna dados de um Empresario
	public static function getEmpresario($cpf) {
		$query = "SELECT 1 FROM empresarios WHERE cpf = '" . $cpf . "' LIMIT 1";
		$resultado = mysql_query($query);
		return(mysql_fetch_array($resultado));
	}

	/* verifica se o email ja esta registrado */
	public static function emailRegistrado($email) {
	    $query = "SELECT 1 FROM empresarios WHERE email = '{$email}' LIMIT 1;";
	    $resultado = mysql_query($query);

	    if(mysql_fetch_array($resultado) == 0)
	    {
	        return false;  //nao registrado
	    }
        return true; //registrado
	}

	/* verifica se o nome de usuario ja esta registrado */
	public static function usernameRegistrado($username) {
	    $query = "SELECT 1 FROM empresarios WHERE username = '{$username}' LIMIT 1;";
	    $resultado = mysql_query($query);

	    if(mysql_fetch_array($resultado) == 0)
	    {
	        return false;  //nao registrado
	    }
        return true; //registrado
	}

	/* verifica se o RG ja esta registrado */
	public static function rgRegistrado($rg) {
	    $query = "SELECT 1 FROM empresarios WHERE rg = '{$rg}' LIMIT 1;";
	    $resultado = mysql_query($query);

	    if(mysql_fetch_array($resultado) == 0)
	    {
	        return false;  //nao registrado
	    }
        return true; //registrado
	}

	/* verifica se o CPF ja esta registrado */
	public static function cpfRegistrado($cpf) {
	    $query = "SELECT 1 FROM empresarios WHERE cpf = '{$cpf}' LIMIT 1;";
	    $resultado = mysql_query($query);

	    if(mysql_fetch_array($resultado) == 0)
	    {
	        return false;  //nao registrado
	    }
        return true; //registrado
	}

	// Valida senha
	public static function senhaValida($id, $senha)
	{
		$query = "SELECT id FROM empresarios WHERE id = '{$id}' AND senha = '{$senha}';";
		$resultado = mysql_query($query);

	    if(mysql_fetch_array($resultado) == 0)
	    {
	        return false; // invalida
	    }
        return true; // valida
	}
	
	//Insere um Empresario
	public static function create($nome, $email, $username, $senha, $data_nascimento, $telefone, $rg, $cpf, $idEndereco) 
	{
		$query = "INSERT INTO empresarios(nome, email, username, senha, data_nascimento, telefone, rg, cpf, status, endereco_id) 
			VALUES ('" . $nome . "', '" . $email . "', '" . $username . "', '" . $senha . "', '" . $data_nascimento . "', '" . $telefone . "', '" . $rg . "', '" . $cpf . "', 'Ativado', '" . $idEndereco . "')";
		mysql_query($query);
	}
	
	//Edita um Empresario
	public static function edit($nome, $email, $username, $senha, $data_nascimento, $telefone, $rg, $cpf) 
	{
		$query = "UPDATE empresarios SET nome = '" . $nome . "', email = '" . $email . "', username = '" . $username . "', senha = '" . $senha . "', data_nascimento = '" . $data_nascimento . "', telefone = '" . $telefone . "', rg = '" . $rg . "', cpf = '" . $cpf . "' WHERE id = '" . $_SESSION['id'] . "'";
		mysql_query($query);
	}

	// Retorna usuarios recomendados
	public static function getUsuariosRecomendados()
	{
		$query = "SELECT id, nome, email, telefone, tipo, cidade, estado 
				  FROM usuarios AS U 
				  JOIN usuario_requisitos AS UR 
				  ON (U.id = UR.usuario_id) 
				  JOIN requisitos as R
				  ON (R.id = UR.requisito_id)
				  
				  WHERE estado = '{$estado}'
				  AND usuario_alvo != '{$usuario}'
				  AND status = 'Aberta'
				  AND Vag.usuario_id = 0
				  AND Vag.id not in (
				  	SELECT vaga_id 
				  	FROM oferecidas
				  	WHERE usuario_id = '{$id_user}'
				  )
				  AND Vag.id not in (
				  	SELECT vaga_id 
				  	FROM candidatos
				  	WHERE usuario_id = '{$id_user}'
				  )
				  LIMIT 10;";

		return(mysql_query($query));
	}

}
?>
