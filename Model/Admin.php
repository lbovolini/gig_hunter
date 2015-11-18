<?php

class Admin
{
	private $requisito;

	public function __construct() {}

	//Insere uma Área de Interesse
	public static function create($requisito) 
	{
		$query = "INSERT INTO requisitos(nome) VALUES ('" . $requisito . "')";
		mysql_query($query);
	}
}
?>
