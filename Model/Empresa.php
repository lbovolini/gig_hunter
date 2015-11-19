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
	
	//Edita uma Empresa
	public static function edit($nome, $razao_social, $email, $telefone, $cnpj)
	{
		$query = "UPDATE empresas SET nome = '" . $nome . "', razao_social = '" . $razao_social . "', email = '" . $email . "', telefone = '" . $telefone . "', cnpj = '" . $cnpj . "' WHERE id = '" . $_SESSION['idEmpresa'] . "'";
		mysql_query($query);
	}

	//Exclui uma Empresa
	public static function drop()
	{
		$query = "DELETE FROM vagas WHERE empresa_id = '" . $_SESSION['idEmpresa'] . "'";
		mysql_query($query);
		$query = "DELETE FROM empresas WHERE id = '" . $_SESSION['idEmpresa'] . "'";
		mysql_query($query);
	}
}
?>
