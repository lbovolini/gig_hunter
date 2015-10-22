<?php
require_once 'connection.php';

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

	public function __construct($nome, $email, $username, $senha, $data_nascimento, $telefone, $rg, $cpf)
	{
		$this->nome = $nome;
		$this->email = $email;
		$this->username = $username;
		$this->senha = $senha;
		$this->data_nascimento = $data_nascimento;
		$this->telefone = $telefone;
		$this->rg = $rg;
		$this->cpf = $cpf;
	}

	//Retorna dados de um Empresario
	public static function getEmpresario($cpf) {
		$query = "SELECT 1 FROM empresarios WHERE cpf = '" . $cpf . "' LIMIT 1";
		$resultado = mysql_query($query);
		return(mysql_fetch_array($resultado));
	}
	
	public static function getEmpresarioLogin($login, $senha) {
		$query = "SELECT 1 FROM empresarios WHERE `username` = '".$login."' AND `senha` = '".$senha."' LIMIT 1";
		$resultado = mysql_query($query);
		return(mysql_fetch_array($resultado));
	}
	
	//Insere um Empresario
	public static function create($nome, $email, $username, $senha, $data_nascimento, $telefone, $rg, $cpf, $idEndereco) 
	{
		$query = "INSERT INTO empresarios(nome, email, username, senha, data_nascimento, telefone, rg, cpf, status, endereco_id) VALUES ('" . $nome . "', '" . $email . "', '" . $username . "', '" . $senha . "', '" . $data_nascimento . "', '" . $telefone . "', '" . $rg . "', '" . $cpf . "', 'Ativado', '" . $idEndereco . "')";
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