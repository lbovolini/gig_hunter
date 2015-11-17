<?php

class Empresa
{
	private $nome;
	private $razao_social;
	private $email;
	private $telefone;
	private $cnpj;

	public function __construct() {}
	
	//Insere uma Empresa
	public static function create($nome, $razao_social, $email, $telefone, $cnpj, $idEndereco)
	{
		$query = "INSERT INTO empresas(nome, razao_social, email, telefone, cnpj, endereco_id, empresario_id) 
			VALUES ('" . $nome . "', '" . $razao_social . "', '" . $email . "', '" . $telefone . "', '" . $cnpj . "', '" . $idEndereco . "', '" . $_SESSION['id'] . "')";
		mysql_query($query);
	}
}
?>
