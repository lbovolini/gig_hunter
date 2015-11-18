<?php

class Endereco
{
	private $cep;
	private $rua;
	private $bairro;
	private $estado;
	private $cidade;

	public function __construct() {}

	//Insere um Endereço
	public static function create($cep, $rua, $bairro, $estado, $cidade) 
	{
		$query = "INSERT INTO enderecos(cep, rua, bairro, estado, cidade) VALUES ('" . $cep . "', '" . $rua . "', '" . $bairro . "', '" . $estado . "', '" . $cidade . "')";

		if (mysql_query($query)) {
		    $last_id = mysql_insert_id(DB::connection());
		    //echo "New record created successfully. Last inserted ID is: " . $last_id;
		    return $last_id;
		} else {
		    echo "Error: " . $sql . "<br>" . mysql_error($conn);
		}
	}
	
	//Edita um Endereço
	public static function edit($cep, $rua, $bairro, $estado, $cidade) 
	{
		if ($_SESSION['tipo'] == 'Empresario') {
			$result = mysql_query("SELECT * FROM empresarios WHERE id = '" . $_SESSION['id'] . "'");
		}
		else {
			$result = mysql_query("SELECT * FROM usuarios WHERE id = '" . $_SESSION['id'] . "'");
		}
		$row = mysql_fetch_array($result);
		
		$query = "UPDATE enderecos SET cep = '" . $cep . "', rua = '" . $rua . "', bairro = '" . $bairro . "', estado = '" . $estado . "', cidade = '" . $cidade . "' WHERE id = '" . $row['endereco_id'] . "'";
		mysql_query($query);
	}
	
	//Edita um Endereço da Empresa
	public static function editEmp($cep, $rua, $bairro, $estado, $cidade) 
	{
		$query = "UPDATE enderecos SET cep = '" . $cep . "', rua = '" . $rua . "', bairro = '" . $bairro . "', estado = '" . $estado . "', cidade = '" . $cidade . "' WHERE id = '9'";
		mysql_query($query);
	}
}
?>
