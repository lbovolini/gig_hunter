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

	public function __construct($nome, $email, $username, $senha, $data_nascimento, $telefone, $rg, $cpf, $instituicao, $matricula, $lattes, $linkedin)
	{
		$this->nome = $nome;
		$this->email = $email;
		$this->username = $username;
		$this->senha = $senha;
		$this->data_nascimento = $data_nascimento;
		$this->telefone = $telefone;
		$this->rg = $rg;
		$this->cpf = $cpf;
		$this->instituicao = $instituicao;
		$this->matricula = $matricula;
		$this->lattes = $lattes;
		$this->linkedin = $linkedin;
	}

	//Retorna dados de um Freelancer
	public static function getFreelancer($cpf) {
		$query = "SELECT 1 FROM usuarios WHERE cpf = '" . $cpf . "' LIMIT 1";
		$resultado = mysql_query($query);
		return(mysql_fetch_array($resultado));
	}
	
	public static function getFreelancerLogin($login, $senha) {
		$query = "SELECT 1 FROM usuarios WHERE `tipo` = 'Freelancer' AND `username` = '".$login."' AND `senha` = '".$senha."' LIMIT 1";
		$resultado = mysql_query($query);
		return(mysql_fetch_array($resultado));
	}
	
	//Insere um Freelancer
	public static function create($nome, $email, $username, $senha, $data_nascimento, $telefone, $rg, $cpf, $instituicao, $matricula, $lattes, $linkedin, $idEndereco) 
	{
		$query = "INSERT INTO usuarios(nome, email, username, senha, data_nascimento, telefone, rg, cpf, status, tempo_bloqueada, tipo, instituicao, matricula, lattes, linkedin, endereco_id) VALUES ('" . $nome . "', '" . $email . "', '" . $username . "', '" . $senha . "', '" . $data_nascimento . "', '" . $telefone . "', '" . $rg . "', '" . $cpf . "', 'Ativo', '0', 'Freelancer', '" . $instituicao . "', '" . $matricula . "', '" . $lattes . "', '" . $linkedin . "', '" . $idEndereco . "')";
		mysql_query($query);
	}

	public static function validate($data)
	{
		foreach ($data as $field) {
			  $field = trim($field);
			  $field = stripslashes($field);
			  $field = htmlspecialchars($field);

			  //echo $field . '<br>';
			  if (empty($field)) 
			  	return true;
		}
		return false;
	}
}
?>
