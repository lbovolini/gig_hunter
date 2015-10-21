<?php
require_once 'connection.php';

class Endereco
{

	private $cep;
	private $rua;
	private $bairro;
	private $estado;
	private $cidade;

	public function __construct($cep, $rua, $bairro, $estado, $cidade)
	{
		$this->$cep = $cep;
		$this->$rua = $rua;
		$this->$bairro = $bairro;
		$this->$estado = $estado;
		$this->$cidade = $cidade;
	}

	//Insere um Endereço
	public static function create($cep, $rua, $bairro, $estado, $cidade) 
	{
		$query = "INSERT INTO enderecos(cep, rua, bairro, estado, cidade) VALUES ('" . $cep . "', '" . $rua . "', '" . $bairro . "', '" . $estado . "', '" . $cidade . "')";

		if (mysql_query($query)) {
		    $last_id = mysql_insert_id(DB::connection());
		    //echo "New record created successfully. Last inserted ID is: " . $last_id;
		    return $last_id;
		} else {
		    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		}
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