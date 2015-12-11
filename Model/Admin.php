<?php

class Admin
{
	private $requisito;

	public function __construct() {}

	//Insere uma Área de Interesse
	public static function create($requisito) 
	{
		$result = mysql_query("SELECT * FROM requisitos");
		if ($result) {
			$aux = 0;
			while ($row = mysql_fetch_array($result)) {
				if ($row['nome'] == $requisito) {
					$aux = 1;
				}
			}
			if ($requisito == NULL) {
				echo "<script> alert('Requisito não preenchido!'); location.href='Requisito.php'; </script>";
			}
			else if ($aux == 1) {
				echo "<script> alert('Requisito já cadastrado!'); location.href='Requisito.php'; </script>";
			}
			else {
				$query = "INSERT INTO requisitos(nome) VALUES ('" . $requisito . "')";
				mysql_query($query);
				echo "<script> alert('Requisito cadastrado com sucesso!'); location.href='Requisito.php'; </script>";
			}
		}
	}
}
?>
