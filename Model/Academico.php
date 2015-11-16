<?php

class Academico
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

	//Retorna dados de um Academico
	public static function getAcademico($cpf) {
		$query = "SELECT id FROM usuarios WHERE cpf = '{$cpf}' LIMIT 1";
		$resultado = mysql_query($query);
		return(mysql_fetch_array($resultado));
	}
	
	//Insere um Academico
	public static function create($nome, $email, $username, $senha, $data_nascimento, $telefone, $rg, $cpf, $instituicao, $matricula, $lattes, $linkedin, $idEndereco) 
	{
		$query = "INSERT INTO usuarios(nome, email, username, senha, data_nascimento, telefone, rg, cpf, status, tempo_bloqueada, tipo, instituicao, matricula, lattes, linkedin, endereco_id) VALUES ('" . $nome . "', '" . $email . "', '" . $username . "', '" . $senha . "', '" . $data_nascimento . "', '" . $telefone . "', '" . $rg . "', '" . $cpf . "', 'Ativo', '0', 'Academico', '" . $instituicao . "', '" . $matricula . "', '" . $lattes . "', '" . $linkedin . "', '" . $idEndereco . "')";
		mysql_query($query);
	}

	//Edita um Academico
	public static function edit($nome, $email, $username, $senha, $data_nascimento, $telefone, $rg, $cpf, $instituicao, $matricula, $lattes, $linkedin) 
	{
		$query = "UPDATE usuarios SET nome = '" . $nome . "', email = '" . $email . "', username = '" . $username . "', senha = '" . $senha . "', data_nascimento = '" . $data_nascimento . "', telefone = '" . $telefone . "', rg = '" . $rg . "', cpf = '" . $cpf . "', instituicao = '" . $instituicao . "', matricula = '" . $matricula . "', lattes = '" . $lattes . "', linkedin = '" . $linkedin . "' WHERE id = '" . $_SESSION['id'] . "'";
		mysql_query($query);
	}
}
?>
