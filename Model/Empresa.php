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
		$queryO = "DELETE FROM oferecidas USING oferecidas JOIN vagas WHERE oferecidas.vaga_id = vagas.id AND vagas.empresa_id = '" . $_SESSION['idEmpresa'] . "'";
		mysql_query($queryO);
		$queryC = "DELETE FROM candidatos USING candidatos JOIN vagas WHERE candidatos.vaga_id = vagas.id AND vagas.empresa_id = '" . $_SESSION['idEmpresa'] . "'";
		mysql_query($queryC);
		$queryR = "DELETE FROM vaga_requisitos USING vaga_requisitos JOIN vagas WHERE vaga_requisitos.vaga_id = vagas.id AND vagas.empresa_id = '" . $_SESSION['idEmpresa'] . "'";
		mysql_query($queryR);
		$queryV = "DELETE FROM vagas WHERE empresa_id = '" . $_SESSION['idEmpresa'] . "'";
		mysql_query($queryV);
		$queryA = "DELETE FROM avaliacoes WHERE empresa_id = '" . $_SESSION['idEmpresa'] . "'";
		mysql_query($queryA);
		$query = "DELETE FROM empresas WHERE id = '" . $_SESSION['idEmpresa'] . "'";
		mysql_query($query);
	}
}
?>
